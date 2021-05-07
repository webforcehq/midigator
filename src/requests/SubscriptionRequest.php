<?php

namespace WebforceHQ\Midigator\Requests;

use WebforceHQ\Midigator\Models\Subscription;
use WebforceHQ\Midigator\MidigatorRequest;

class SubscriptionRequest extends MidigatorRequest
{

    private const ENDPOINT = "events/v1/subscribe";
    private const PING_ENDPOINT = "events/v1/ping";

    public function __construct($username, $password, $secret, $env)
    {
        $this->username = $username;
        $this->password = $password;
        $this->secret   = $secret;
        $this->env      = $env;
        $this->setUpHttpClient();
    }

    public function addNew(Subscription $subscription){
        $subscription->addAuth($this->getAuth());
        return $this->post(self::ENDPOINT,$subscription->toArray())->sendRequest();
        
    }

    public function listAll(){
        return $this->get(self::ENDPOINT)->sendRequest();
    }

    public function confirmation(string $eventGuid){
        $endpoint = self::ENDPOINT."/".$eventGuid;
        return $this->get($endpoint)->sendRequest();
    }

    public function update(string $eventGuid, Subscription $subscription){
        $subscription->addAuth($this->getAuth());
        $endpoint = self::ENDPOINT."/".$eventGuid;
        return $this->put($endpoint,$subscription->toArray())->sendRequest();
    }

    public function destroy(string $eventGuid){
        $endpoint = self::ENDPOINT."/".$eventGuid;
        return $this->delete($endpoint)->sendRequest();
    }

    public function test(string $eventType){
        $endpoint = self::PING_ENDPOINT."/".$eventType;
        return $this->get($endpoint)->sendRequest();
    }



}
