<?php

namespace WebforceHQ\Midigator\Requests;

use WebforceHQ\Midigator\MidigatorRequest;
use WebforceHQ\Midigator\Models\Order;

class OrderRequest extends MidigatorRequest
{

    private const ENDPOINT = "orders/v2/order";
    
    public function __construct($username, $password, $secret, $env)
    {
        $this->username = $username;
        $this->password = $password;
        $this->secret   = $secret;
        $this->env      = $env;
        $this->setUpHttpClient();
    }

    public function addNew(Order $order){
        return $this->post(self::ENDPOINT,$order->toArray())->sendRequest();
    }

    public function update(Order $order){
        return $this->post(self::ENDPOINT,$order->toArray())->sendRequest();
    }

    public function fetch(string $orderGuid){
        $endpoint = self::ENDPOINT."/".$orderGuid;
        return $this->get($endpoint)->sendRequest();
    }

}
