<?php

namespace WebforceHQ\Midigator;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\ClientException;
use WebforceHQ\Midigator\Exceptions\FetchTokenException;
use WebforceHQ\Midigator\Exceptions\UnsetRequestException;


class MidigatorRequest
{
    protected $username;
    protected $password;
    protected $secret;
    protected $env;


    protected $token;
    protected $headers;
    
    const AUTH_ENDPOINT = "auth/v1/auth";
    const LIVE_URL    = "https://api.midigator.com/";
    const SANDBOX_URL = "https://api-sandbox.midigator.com/";

    protected function setUpHttpClient(){
        $this->setDefaultHeaders();
        $this->getClient();
    }

    protected function getAuth(){
        return [
            "username" => $this->username,
            "password" => $this->password,
        ];
    }

    private function setDefaultHeaders(){
        $this->headers = [
            'Authorization' => "Bearer {$this->secret}",
            'content-type'  => 'application/json',
        ];
        return $this;
    }

    private function resolveUrl(){
        return $this->env === "PRODUCTION" ? self::LIVE_URL : self::SANDBOX_URL;
    }

    private function getClient($params = null)
    {
        $this->client = new Client([
            'base_uri'  => $this->resolveUrl(),
        ]);
        return $this;
    }
    
    protected function fetchToken(){
        $this->setUpHttpClient();
        $payload              = $this->getAuth();
        $payload              = json_encode($payload);
        $endpoint             = self::AUTH_ENDPOINT;
        $this->currentRequest = new Request('POST', $this->resolveUrl().$endpoint, $this->headers, $payload);
        $tokenResponse        = $this->sendRequest();
        if( ! $tokenResponse->success ){
            throw new FetchTokenException("Code: {$tokenResponse->code} - {$tokenResponse->body}");
        }
        $this->currentRequest = null;
        $token = $tokenResponse->body->token;
        $this->headers["Authorization"] = "Bearer {$token}";
        return $this;
    }

    public function post($endpoint, $payload)
    {
        $this->fetchToken();
        $payload = json_encode($payload);
        $this->currentRequest = new Request('POST', $this->resolveUrl().$endpoint, $this->headers, $payload);
        return $this;
    }

    public function get($endpoint)
    {
        $this->fetchToken();
        $this->currentRequest = new Request('GET', $this->resolveUrl().$endpoint, $this->headers);
        return $this;
    }

    public function delete($endpoint)
    {
        $this->fetchToken();
        $this->currentRequest   = new Request("DELETE", $this->resolveUrl().$endpoint, $this->headers);
        return $this;
    }

    public function put($endpoint, $payload)
    {
        $this->fetchToken();
        $payload = json_encode($payload);
        $this->currentRequest   = new Request('PUT', $this->resolveUrl().$endpoint, $this->headers, $payload);
        return $this;
    }

    protected function sendRequest(){
        if ( ! $this->currentRequest ) {
            throw new UnsetRequestException();
        }
        $responseObj = new \stdClass();
        try {
            $response             = $this->client->send($this->currentRequest);
            $responseObj->success = true;
            $responseObj->code    = $response->getStatusCode();
            $responseObj->body    = json_decode($response->getBody());
        } catch (ClientException $e) {
            $response             = $e->getResponse();
            $responseObj->code    = $response->getStatusCode();
            $responseObj->body    = json_decode($response->getBody()->getContents());
            $responseObj->success = false;
        } finally {
            return $responseObj;
        }
    }

    protected function setQuery($parameters){
        $queryParams = "";
        if(empty($parameters)){
            return $queryParams;
        }
        $paramsLength = count($parameters);
        $counter = 0;
        foreach($parameters as $key => $value){
            $queryParams .= $counter === 0 ? "?{$key}={$value}" : "{$key}={$value}";
            if( $counter < $paramsLength - 1 ){
              $queryParams .= "&";
            }
            $counter++;
        }
        return $queryParams;
    }
    
}
