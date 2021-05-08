<?php

namespace WebforceHQ\Midigator\Models;

class Note extends MidigatorModel{

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
        $this->allObjectsAreValidClass(['Proof'],$proofs);
        $this->proof = $proof;

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
        $this->allObjectsAreValidClass(['ShippingDetails'],$shipping_details);
        $this->shipping_details = $shipping_details;

        return $this;
    }
}