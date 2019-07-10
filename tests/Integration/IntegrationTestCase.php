<?php

namespace Test\Integration;

use App\AppBuilder;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;
use Slim\Factory\ServerRequestCreatorFactory;
use Zend\Diactoros\ServerRequestFactory;

/**
 * Class IntegrationTestCase
 *
 * @author Mohos Tamás <tomi@mohos.name>
 * @package Test\Integration
 */
class IntegrationTestCase extends TestCase
{

    protected function getApplication(): App
    {
        return (new AppBuilder(\dirname(__DIR__, 2) . '/config'))
            ->withContainer()
            ->withRoutes()
            ->build();
    }

    protected function request(string $method, string $url): ResponseInterface
    {
        $server = [
            'REQUEST_METHOD' => $method,
            'REQUEST_URI' => $url,
        ];
        $request = ServerRequestFactory::fromGlobals($server);

        return $this->getApplication()->handle($request);
    }

}
