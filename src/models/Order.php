<?php

namespace WebforceHQ\Midigator\Models;

use WebforceHQ\Midigator\Exceptions\CardBrandException;

class Order extends MidigatorModel
{

    /**
     * Get the value of order_id
     */ 
    public function getOrderId()
    {
        return $this->order_id;
    }

    /**
     * Set the value of order_id
     *
     * @return  self
     */ 
    public function setOrderId($order_id)
    {
        $this->order_id = $order_id;

        return $this;
    }

    /**
     * Get the value of order_date
     */ 
    public function getOrderDate()
    {
        return $this->order_date;
    }

    /**
     * Set the value of order_date
     *
     * @return  self
     */ 
    public function setOrderDate($order_date)
    {
        $this->order_date = $order_date;

        return $this;
    }

    /**
     * Get the value of mid
     */ 
    public function getMid()
    {
        return $this->mid;
    }

    /**
     * Set the value of mid
     *
     * @return  self
     */ 
    public function setMid($mid)
    {
        $this->mid = $mid;

        return $this;
    }

    /**
     * Get the value of card_brand
     */ 
    public function getCardBrand()
    {
        return $this->card_brand;
    }

    /**
     * Set the value of card_brand
     *
     * @return  self
     */ 
    public function setCardBrand($card_brand)
    {
        $validBrands = [ "visa" , "mastercard" , "american_express" , "discover" , "diners" , "elo" , "paypal" , "jcb" ];
        if( ! in_array($card_brand,$validBrands) ){
            throw new CardBrandException("${card_brand} is not a valid parameter for a card brand");
        }
        $this->card_brand = $card_brand;

        return $this;
    }

    /**
     * Get the value of card_last_4
     */ 
    public function getCardLast4()
    {
        return $this->card_last_4;
    }

    /**
     * Set the value of card_last_4
     *
     * @return  self
     */ 
    public function setCardLast4($card_last_4)
    {
        $this->card_last_4 = $card_last_4;

        return $this;
    }

    /**
     * Get the value of card_first_6
     */ 
    public function getCardFirst6()
    {
        return $this->card_first_6;
    }

    /**
     * Set the value of card_first_6
     *
     * @return  self
     */ 
    public function setCardFirst6($card_first_6)
    {
        $this->card_first_6 = $card_first_6;

        return $this;
    }

    /**
     * Get the value of card_exp_month
     */ 
    public function getCardExpMonth()
    {
        return $this->card_exp_month;
    }

    /**
     * Set the value of card_exp_month
     *
     * @return  self
     */ 
    public function setCardExpMonth($card_exp_month)
    {
        $this->card_exp_month = $card_exp_month;

        return $this;
    }

    /**
     * Get the value of card_exp_year
     */ 
    public function getCardExpYear()
    {
        return $this->card_exp_year;
    }

    /**
     * Set the value of card_exp_year
     *
     * @return  self
     */ 
    public function setCardExpYear($card_exp_year)
    {
        $this->card_exp_year = $card_exp_year;

        return $this;
    }

    /**
     * Get the value of order_amount
     */ 
    public function getOrderAmount()
    {
        return $this->order_amount;
    }

    /**
     * Set the value of order_amount
     *
     * @return  self
     */ 
    public function setOrderAmount($order_amount)
    {
        $this->order_amount = $order_amount;

        return $this;
    }

    /**
     * Get the value of avs
     */ 
    public function getAvs()
    {
        return $this->avs;
    }

    /**
     * Set the value of avs
     *
     * @return  self
     */ 
    public function setAvs($avs)
    {
        $this->avs = $avs;

        return $this;
    }

    /**
     * Get the value of cvv
     */ 
    public function getCvv()
    {
        return $this->cvv;
    }

    /**
     * Set the value of cvv
     *
     * @return  self
     */ 
    public function setCvv($cvv)
    {
        $this->cvv = $cvv;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of phone
     */ 
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */ 
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of refunded
     */ 
    public function getRefunded()
    {
        return $this->refunded;
    }

    /**
     * Set the value of refunded
     *
     * @return  self
     */ 
    public function setRefunded($refunded)
    {
        $this->refunded = $refunded;

        return $this;
    }

    /**
     * Get the value of refunded_amount
     */ 
    public function getRefundedAmount()
    {
        return $this->refunded_amount;
    }

    /**
     * Set the value of refunded_amount
     *
     * @return  self
     */ 
    public function setRefundedAmount($refunded_amount)
    {
        $this->refunded_amount = $refunded_amount;

        return $this;
    }

    /**
     * Get the value of subscription_cycle
     */ 
    public function getSubscriptionCycle()
    {
        return $this->subscription_cycle;
    }

    /**
     * Set the value of subscription_cycle
     *
     * @return  self
     */ 
    public function setSubscriptionCycle($subscription_cycle)
    {
        $this->subscription_cycle = $subscription_cycle;

        return $this;
    }

    /**
     * Get the value of subscription_parent_id
     */ 
    public function getSubscriptionParentId()
    {
        return $this->subscription_parent_id;
    }

    /**
     * Set the value of subscription_parent_id
     *
     * @return  self
     */ 
    public function setSubscriptionParentId($subscription_parent_id)
    {
        $this->subscription_parent_id = $subscription_parent_id;

        return $this;
    }

    /**
     * Get the value of ip_address
     */ 
    public function getIpAddress()
    {
        return $this->ip_address;
    }

    /**
     * Set the value of ip_address
     *
     * @return  self
     */ 
    public function setIpAddress($ip_address)
    {
        $this->ip_address = $ip_address;

        return $this;
    }

    /**
     * Get the value of currency
     */ 
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set the value of currency
     *
     * @return  self
     */ 
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get the value of processor_auth_code
     */ 
    public function getProcessorAuthCode()
    {
        return $this->processor_auth_code;
    }

    /**
     * Set the value of processor_auth_code
     *
     * @return  self
     */ 
    public function setProcessorAuthCode($processor_auth_code)
    {
        $this->processor_auth_code = $processor_auth_code;

        return $this;
    }

    /**
     * Get the value of processor_transaction_id
     */ 
    public function getProcessorTransactionId()
    {
        return $this->processor_transaction_id;
    }

    /**
     * Set the value of processor_transaction_id
     *
     * @return  self
     */ 
    public function setProcessorTransactionId($processor_transaction_id)
    {
        $this->processor_transaction_id = $processor_transaction_id;

        return $this;
    }

    /**
     * Get the value of billing_first_name
     */ 
    public function getBillingFirstName()
    {
        return $this->billing_first_name;
    }

    /**
     * Set the value of billing_first_name
     *
     * @return  self
     */ 
    public function setBillingFirstName($billing_first_name)
    {
        $this->billing_first_name = $billing_first_name;

        return $this;
    }

    /**
     * Get the value of billing_last_name
     */ 
    public function getBillingLastName()
    {
        return $this->billing_last_name;
    }

    /**
     * Set the value of billing_last_name
     *
     * @return  self
     */ 
    public function setBillingLastName($billing_last_name)
    {
        $this->billing_last_name = $billing_last_name;

        return $this;
    }

    /**
     * Get the value of billing_street_address_1
     */ 
    public function getBillingStreetAddress1()
    {
        return $this->billing_street_address_1;
    }

    /**
     * Set the value of billing_street_address_1
     *
     * @return  self
     */ 
    public function setBillingStreetAddress1($billing_street_address_1)
    {
        $this->billing_street_address_1 = $billing_street_address_1;

        return $this;
    }

    /**
     * Get the value of billing_street_address_2
     */ 
    public function getBillingStreetAddress2()
    {
        return $this->billing_street_address_2;
    }

    /**
     * Set the value of billing_street_address_2
     *
     * @return  self
     */ 
    public function setBillingStreetAddress2($billing_street_address_2)
    {
        $this->billing_street_address_2 = $billing_street_address_2;

        return $this;
    }

    /**
     * Get the value of billing_city
     */ 
    public function getBillingCity()
    {
        return $this->billing_city;
    }

    /**
     * Set the value of billing_city
     *
     * @return  self
     */ 
    public function setBillingCity($billing_city)
    {
        $this->billing_city = $billing_city;

        return $this;
    }

    /**
     * Get the value of billing_state
     */ 
    public function getBillingState()
    {
        return $this->billing_state;
    }

    /**
     * Set the value of billing_state
     *
     * @return  self
     */ 
    public function setBillingState($billing_state)
    {
        $this->billing_state = $billing_state;

        return $this;
    }

    /**
     * Get the value of billing_postcode
     */ 
    public function getBillingPostCode()
    {
        return $this->billing_postcode;
    }

    /**
     * Set the value of billing_postcode
     *
     * @return  self
     */ 
    public function setBillingPostCode($billing_postcode)
    {
        $this->billing_postcode = $billing_postcode;

        return $this;
    }

    /**
     * Get the value of billing_country
     */ 
    public function getBillingCountry()
    {
        return $this->billing_country;
    }

    /**
     * Set the value of billing_country
     *
     * @return  self
     */ 
    public function setBillingCountry($billing_country)
    {
        $this->billing_country = $billing_country;

        return $this;
    }

    /**
     * Get the value of marketing_source
     */ 
    public function getMarketingSource()
    {
        return $this->marketing_source;
    }

    /**
     * Set the value of marketing_source
     *
     * @return  self
     */ 
    public function setMarketingSource($marketing_source)
    {
        $this->marketing_source = $marketing_source;

        return $this;
    }

    /**
     * Get the value of sub_marketing_sources
     */ 
    public function getSubMarketingSources()
    {
        return $this->sub_marketing_sources;
    }

    /**
     * Set the value of sub_marketing_sources
     *
     * @return  self
     */ 
    public function setSubMarketingSources($sub_marketing_sources)
    {
        $this->sub_marketing_sources = $sub_marketing_sources;

        return $this;
    }

    /**
     * Get the value of items
     */ 
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Set the value of items
     *
     * @return  self
     */ 
    public function setItems(array $items)
    {
        $this->allObjectsAreValidClass([Item::class],$items);
        $this->items = $items;
        return $this;
    }

    /**
     * Get the value of evidence
     */ 
    public function getEvidence()
    {
        return $this->evidence;
    }

    /**
     * Set the value of evidence
     *
     * @return  self
     */ 
    public function setEvidence($evidences)
    {
        $this->allObjectsAreValidClass([Evidence::class],[$evidences]);
        $this->evidence = $evidences;

        return $this;
    }

    /**
     * Get the value of notes
     */ 
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set the value of notes
     *
     * @return  self
     */ 
    public function addNote($note)
    {
        $this->allObjectsAreValidClass([Note::class],[$note]);
        $this->notes[] = $note;

        return $this;
    }
}
