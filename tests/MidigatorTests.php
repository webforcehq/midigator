<?php

use WebforceHQ\Midigator\Models\Subscription;
use PHPUnit\Framework\TestCase;
use WebforceHQ\Midigator\Client;


class MidigatorTests extends TestCase
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


    public function testAddNewSubscriptionSuccessfully(){
        echo "new \n";
        $client = new Client($this->username, $this->password, $this->secret);
        $subscriptions = $client->subscriptionsApi();
        $subscription = new Subscription();
        $subscription->setEmail("demo@webforcehq.com");
        $subscription->setUrl("https://demo/webhooks/midigator");
        $subscription->setType("chargeback.new");
        $response = $subscriptions->addNew($subscription);
        $this->assertTrue($response->success);  
    }

    public function testEventsSuccessfully(){
        echo "event \n";
        $client = new Client($this->username, $this->password, $this->secret);
        $subscriptions = $client->subscriptionsApi();
        foreach(self::EVENTS as $event){
            $response = $subscriptions->test($event);
            $this->assertTrue($response->success); 
        }
    }

    public function testListAllSubscriptionsSuccessfully(){
        echo "list \n";
        $client = new Client($this->username, $this->password, $this->secret);
        $subscriptions = $client->subscriptionsApi();
        $response = $subscriptions->listAll();
        var_dump($response);
        $this->assertTrue($response->success);  
    }

    public function testSubscribeConfirmationSuccessfully(){
        echo "confirmation \n";
        $client = new Client($this->username, $this->password, $this->secret);
        $subscriptions = $client->subscriptionsApi();
        $listsResponse = $subscriptions->listAll();
        if(!$listsResponse->success){
            throw new Exception($listsResponse->body->error);
        }
        $subscriontionsList = $listsResponse->body;
        $eventToConfirm = $subscriontionsList[rand(0, count($subscriontionsList) - 1)];
        $eventGuid = $eventToConfirm->guid;
        $response = $subscriptions->confirmation($eventGuid);
        $this->assertTrue($response->success); 
    }

    public function testUpdateConfirmationSuccessfully(){
        echo "update \n";
        $client = new Client($this->username, $this->password, $this->secret);
        $subscriptions = $client->subscriptionsApi();
        $listsResponse = $subscriptions->listAll();
        if(!$listsResponse->success){
            throw new Exception($listsResponse->body->error);
        }
        $subscriontionsList = $listsResponse->body;
        $event = $subscriontionsList[rand(0, count($subscriontionsList) - 1)];
        $eventGuid = $event->guid;
        $subscription = new Subscription();
        // $subscription->setEmail("jdoe@mail.com");
        // $subscription->setUrl("https://demo/webhooks/midigator");
        $subscription->setActive(false);
        $response = $subscriptions->update($eventGuid, $subscription);
        $this->assertTrue($response->success); 
    }

    public function testDeleteSubscriptionSuccessfullyClear(){
        echo "delete \n";
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



}
