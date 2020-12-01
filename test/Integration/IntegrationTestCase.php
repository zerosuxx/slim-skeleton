<?php

namespace Test\Integration;

use App\AppBuilder;
use Laminas\Diactoros\ServerRequestFactory;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Slim\App;

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
        return (new AppBuilder(dirname(dirname(__DIR__)) . '/config'))
            ->withConfigs()
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
