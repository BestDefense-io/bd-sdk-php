<?php declare(strict_types=1);

namespace BestdefenseIo\BdSdkPhp;

use GuzzleHttp\Client;

/**
 * @author Daniel P. Baddeley JR <dan.baddeley@bestdefense.io>
 * @date 09/15/2024
 * @time 3:08 PM
 * @note The purpose of this class is to provide a base class for all API services to extend from.
 *
 * @link
 */
class ApiService
{
    protected $apiToken;
    protected $accountId;
    protected $host;
    protected $client;

    public function __construct(string $apiToken, string $accountId, string $host = 'api.bestdefense.io', Client $client = null)
    {
        $this->apiToken = $apiToken;
        $this->accountId = $accountId;
        $this->client = $client ?: new Client([
            'base_uri' => $host,
            'headers' => [
                'Authorization' => "Bearer {$this->apiToken}",
                'Accept' => 'application/json',
            ],
        ]);
    }

    public function getData(): array
    {
        $response = $this->client->get('/data');
        return json_decode($response->getBody()->getContents(), true);
    }
}