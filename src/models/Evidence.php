<?php

namespace WebforceHQ\Midigator\Models;

class Evidence extends MidigatorModel{

    protected $shipping_details = [];
    protected $proof = [];

    /**
     * Get the value of proof
     */ 
    public function getProof()
    {
        return $this->proof;
    }

    /**
     * Set the value of proof
     *
     * @return  self
     */ 
    public function setProof(array $proofs)
    {
        $this->allObjectsAreValidClass([Proof::class],$proofs);
        $this->proof = $proofs;

        return $this;
    }

    /**
     * Get the value of shipping_details
     */ 
    public function getShippingDetails()
    {
        return $this->shipping_details;
    }

    /**
     * Set the value of shipping_details
     *
     * @return  self
     */ 
    public function setShippingDetails(array $shipping_details)
    {
        $this->allObjectsAreValidClass([ShippingDetails::class],$shipping_details);
        $this->shipping_details = $shipping_details;

        return $this;
    }
}