<?php

namespace Test\Integration\Action;

use Test\Integration\IntegrationTestCase;

class HealthCheckActionTest extends IntegrationTestCase
{
    /**
     * @test
     */
    public function handle_ReturnsSuccessTrue(): void
    {
        $response = $this->request('GET', '/healthcheck');

        $expectedResult = json_encode(['success' => true]);

        $this->assertEquals($expectedResult, $response->getBody()->getContents());
    }
}
