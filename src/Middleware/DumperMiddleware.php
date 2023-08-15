<?php

declare(strict_types=1);

namespace Spiral\Debug\Middleware;

use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Spiral\Debug\Exception\DumpException;

/**
 * To use this middleware, application must have implementations of psr/http-server-middleware and psr/http-factory.
 */
final class DumperMiddleware implements MiddlewareInterface
{
    public function __construct(
        private readonly ResponseFactoryInterface $responseFactory
    ) {
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        try {
            return $handler->handle($request);
        } catch (DumpException $e) {
            $response = $this->responseFactory->createResponse($e->getCode());
            $response->getBody()->write((string)$e);

            return $response->withHeader('Content-Type', 'text/html; charset=utf-8');
        }
    }
}
