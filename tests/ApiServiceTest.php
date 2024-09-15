<?php declare(strict_types=1);

namespace BestdefenseIo\BdSdkPhp\Tests;

use PHPUnit\Framework\TestCase;
use BestdefenseIo\BdSdkPhp\ApiService;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

class ApiServiceTest extends TestCase
{
    protected $apiToken = 'test-api-token';
    protected $accountId = 'test-account-id';

    protected $host = 'api.bestdefense.io';

    protected $yourService;

    protected function setUp(): void
    {
        // Create a mock and queue responses.
        $mock = new MockHandler([
            new Response(200, [], json_encode(['data' => '{"test":"dasta"}'])),
            // Add more responses as needed
        ]);

        $handlerStack = HandlerStack::create($mock);

        $client = new Client(['handler' => $handlerStack]);

        // Inject the mocked client into YourService
        $this->yourService = new ApiService($this->apiToken, $this->accountId, $this->host, $client);
    }

    public function testGetData()
    {
        $response = $this->yourService->getData();
        $this->assertIsArray($response);
        $this->assertArrayHasKey('data', $response);
        $this->assertEquals('{"test":"data"}', $response['data']);
    }

    // Add more test methods for other functionalities
}
