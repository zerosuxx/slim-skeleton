<?php declare(strict_types = 1);

namespace App\Action;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\App;
use Zend\Diactoros\Response\JsonResponse;

class IndexAction implements RequestHandlerInterface
{

    // phpcs:disable SlevomatCodingStandard.Functions.UnusedParameter.UnusedParameter
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return new JsonResponse(['Slim' => App::VERSION]);
    }
    // phpcs:enable

}
