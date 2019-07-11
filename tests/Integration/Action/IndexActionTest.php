<?php

namespace Test\Integration\Action;

use Slim\App;
use Test\Integration\IntegrationTestCase;

class IndexActionTest extends IntegrationTestCase
{
    /**
     * @test
     */
    public function handle_ReturnsSuccessTrue(): void
    {
        $response = $this->request('GET', '/');

        $expectedResult = json_encode(['Slim' => App::VERSION]);

        $this->assertEquals($expectedResult, $response->getBody()->getContents());
    }
}
