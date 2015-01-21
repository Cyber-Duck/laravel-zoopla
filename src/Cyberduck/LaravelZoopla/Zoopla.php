<?php namespace Cyberduck\LaravelZoopla;

use GuzzleHttp\Client;

class Zoopla
{

    protected $api_key;
    protected $client;  

    public function __construct($api_key, $endpoint, Client $client)
    {
        $this->api_key  = $api_key;
        $this->endpoint = $endpoint;
        $this->client   = $client;
    }

    /**
     * Magic method to call api methods
     * http://stackoverflow.com/a/19533226/908257
     * @param  string $method
     * @param  array  $parameters
     * @return array
     */
    public function __call($method, $parameters = array())
    {
        return $this->_get(ltrim(strtolower(preg_replace('/[A-Z]/', '_$0', $method)), '_'), $parameters);
    }

    public function _get($method, array $query)
    {

        $query['api_key'] = $this->api_key;

        $client = new Client();

        try {

            $response = $client->get($this->endpoint . $method . '.json', ['query' => $query])->json();

        } catch (\GuzzleHttp\Exception\TransferException $e) {
            
            $response = [
                'error' => [
                    'code' => $e->getResponse()->getStatusCode(),
                    'message' => $e->getMessage()
                ]
            ];

        }

        return $response;

    }

}