<?php


use PHPUnit\Framework\TestCase;
use WebforceHQ\Midigator\Client;
use WebforceHQ\Midigator\Models\Evidence;
use WebforceHQ\Midigator\Models\Order;
use WebforceHQ\Midigator\Models\Proof;
use WebforceHQ\Midigator\Models\ShippingDetails;

use function GuzzleHttp\json_encode;

class MidigatorOrderTests extends TestCase{
    
    protected function setUp(): void
    {
        $this->username = "";
        $this->password = "";
        $this->secret   = "";
        $this->orderId = uniqid();
    }

    public function testAddNew(){
        $order = new Order();
        $order->setOrderId(strval($this->orderId)); //REQUIRED
        $order->setOrderDate("2019-09-30T09:20:11Z"); //REQUIRED
        $order->setMid("189250002");//REQUIRED
        $order->setCurrency("USD");//REQUIRED
        $order->setCardBrand("visa");//REQUIRED
        $order->setCardLast4("1883");//REQUIRED
        $order->setCardFirst6("401288");//HIGHLY RECOMMENDED
        $order->setCardExpMonth("04");//HIGHLY RECOMMENDED
        $order->setCardExpYear("2022");//HIGHLY RECOMMENDED
        $order->setOrderAmount(1030);//HIGHLY RECOMMENDED
        $order->setAvs("y");//HIGHLY RECOMMENDED
        $order->setCvv("m");//HIGHLY RECOMMENDED
        
        $order->setEmail("jane@example.com");
        $order->setPhone("555-254-4925");//HIGHLY RECOMMENDED
        $order->setRefunded(true);//HIGHLY RECOMMENDED
        $order->setRefundedAmount(1030);//HIGHLY RECOMMENDED
        $order->setSubscriptionCycle(3);//HIGHLY RECOMMENDED
        $order->setSubscriptionParentId("56");
        $order->setIpAddress("192.168.133.7");
        $order->setProcessorAuthCode("741256");
        $order->setProcessorTransactionId("NMI0983");
        $order->setBillingFirstName("Jane");
        $order->setBillingLastName("Doe");
        $order->setBillingStreetAddress1("123 Sample Address");
        $order->setBillingStreetAddress2("Apt. B");
        $order->setBillingCity("Detroit");
        $order->setBillingState("MI");
        $order->setBillingPostcode("48201");
        $order->setBillingCountry("US");
        $order->setMarketingSource("Facebook 234");//SOURCE

       
        $client = new Client($this->username, $this->password, $this->secret);
        $orders = $client->ordersApi();
        $response = $orders->addNew($order);
        echo json_encode($response);
        $this->assertTrue($response->success);
    }

    public function testUpdateOrder(){

        $order = new Order();
        $order->setOrderId(strval($this->orderId)); //REQUIRED
        $order->setOrderDate("2019-09-30T09:20:11Z"); //REQUIRED
        $order->setMid("189250002");//REQUIRED
        $order->setCurrency("USD");//REQUIRED
        $order->setCardBrand("visa");//REQUIRED
        $order->setCardLast4("1883");//REQUIRED
        $order->setOrderAmount(1030);//HIGHLY RECOMMENDED

        $shippingAddress = new ShippingDetails();

        //ADDING EVIDENCE
        $shippingAddress->setCarrier("UPS");
        $shippingAddress->setTrackingNumber("8798791823723987");
        $shippingAddress->setFirstName("Jhon");
        $shippingAddress->setLastName("Doe");
        $shippingAddress->setStreetAddress1("1 Main St");
        $shippingAddress->setStreetAddress2("");
        $shippingAddress->setCity("San Jose");
        $shippingAddress->setState("CA");
        $shippingAddress->setPostcode("95131");
        $shippingAddress->setCountry("US");
        
        $evidence = new Evidence();

        $evidence->addShippingDetails($shippingAddress);
        $order->setEvidence($evidence);

        $proof = new Proof();
        $proof->setType("login");
        $proof->setValue("2021-05-10 13:45:56");
        $evidence->addProof($proof);
        $order->setEvidence($evidence);

        $proof = new Proof();
        $proof->setType("login_2");
        $proof->setValue("2021-05-10 14:45:56");
        $evidence->addProof($proof);
        $order->setEvidence($evidence);

        $proof = new Proof();
        $proof->setType("login_3");
        $proof->setValue("2021-05-10 15:45:56");
        $evidence->addProof($proof);
        $order->setEvidence($evidence);

        //SENDING ORDER
        $client = new Client($this->username, $this->password, $this->secret);
        $orders = $client->ordersApi();
        $response = $orders->update($order);

        $this->assertTrue($response->success);
    }

}