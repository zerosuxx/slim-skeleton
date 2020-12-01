<?php

declare(strict_types = 1);

namespace App\Action;

use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class HealthCheckAction implements RequestHandlerInterface
{

    // phpcs:disable SlevomatCodingStandard.Functions.UnusedParameter.UnusedParameter
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return new JsonResponse(['success' => true]);
    }
    // phpcs:enable

}
