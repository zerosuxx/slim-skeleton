<?php declare(strict_types = 1);

namespace App\Action;

use Zend\Diactoros\Response\JsonResponse;

class HealthCheckAction
{

    public function __invoke(): JsonResponse
    {
        return new JsonResponse(['success' => true]);
    }

}
