<?php

use WebforceHQ\Midigator\Models\Subscription;
use PHPUnit\Framework\TestCase;
use WebforceHQ\Midigator\Client;


class MidigatorPingTests extends TestCase
{

    private $username;
    private $password;
    private $secret;

    const EVENTS = ["chargeback.new","prevention.new","chargeback.match","prevention.match"];

    protected function setUp(): void
    {
        $this->username = "";
        $this->password = "";
        $this->secret   = "";
    }

    public function testDeleteSubscriptionSuccessfully(){
        echo "deleting all \n";
        $client = new Client($this->username, $this->password, $this->secret);
        $subscriptions = $client->subscriptionsApi();
        $listsResponse = $subscriptions->listAll();
        if( ! $listsResponse->success ){
            throw new Exception($listsResponse->body->error);
        }
        if( empty($listsResponse->body) ){
            $this->assertTrue($listsResponse->success);  
            return;
        }
        foreach($listsResponse->body  as $subscription){
            $response = $subscriptions->destroy($subscription->guid);
            $this->assertTrue($response->success);  
        }
    }

    public function testSubscribeToAllEvents(){
        echo "new \n";
        $client = new Client($this->username, $this->password, $this->secret);
        $subscriptions = $client->subscriptionsApi();
        foreach(self::EVENTS as $event){
            $subscription = new Subscription();
            $subscription->setEmail("demo@webforcehq.com");
            $subscription->setUrl("https://demo/webhooks/midigator");
            $subscription->setType($event);
            $response = $subscriptions->addNew($subscription);
            var_dump($response);
            $this->assertTrue($response->success);  
        }
    }

    public function testChargebackNew() : void{
        $client = new Client($this->username, $this->password, $this->secret);
        $subscriptions = $client->subscriptionsApi();
        $response = $subscriptions->test(self::EVENTS[0]);
        var_dump($response);
        $this->assertTrue($response->success);
    }

    public function testPreventionNew() : void{
        $client = new Client($this->username, $this->password, $this->secret);
        $subscriptions = $client->subscriptionsApi();
        $response = $subscriptions->test(self::EVENTS[1]);
        var_dump($response);
        $this->assertTrue($response->success);
    }

    public function testChargebackMatch() : void{
        $client = new Client($this->username, $this->password, $this->secret);
        $subscriptions = $client->subscriptionsApi();
        $response = $subscriptions->test(self::EVENTS[2]);
        var_dump($response);
        $this->assertTrue($response->success);
    }

    public function testPreventionMatch() : void{
        $client = new Client($this->username, $this->password, $this->secret);
        $subscriptions = $client->subscriptionsApi();
        $response = $subscriptions->test(self::EVENTS[3]);
        var_dump($response);
        $this->assertTrue($response->success);
    }

}
