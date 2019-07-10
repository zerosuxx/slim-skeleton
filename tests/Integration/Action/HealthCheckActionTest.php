<?php

namespace Test\Integration\Action;

use Test\Integration\IntegrationTestCase;

class HealthCheckActionTest extends IntegrationTestCase
{
    /**
     * @test
     */
    public function healthCheck_ReturnsSuccessTrue(): void
    {
        $response = $this->request('GET', '/healthcheck');

        $this->assertEquals(json_encode(['success' => true]), $response->getBody()->getContents());
    }
}
