<?php

namespace WebforceHQ\Midigator\Models;

class ShippingDetails extends MidigatorModel{

    /**
     * Get the value of carrier
     */ 
    public function getCarrier()
    {
        return $this->carrier;
    }

    /**
     * Set the value of carrier
     *
     * @return  self
     */ 
    public function setCarrier($carrier)
    {
        $this->carrier = $carrier;

        return $this;
    }

    /**
     * Get the value of tracking_number
     */ 
    public function getTrackingNumber()
    {
        return $this->tracking_number;
    }

    /**
     * Set the value of tracking_number
     *
     * @return  self
     */ 
    public function setTrackingNumber($tracking_number)
    {
        $this->tracking_number = $tracking_number;

        return $this;
    }

    /**
     * Get the value of first_name
     */ 
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Set the value of first_name
     *
     * @return  self
     */ 
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;

        return $this;
    }

    /**
     * Get the value of last_name
     */ 
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Set the value of last_name
     *
     * @return  self
     */ 
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;

        return $this;
    }

    /**
     * Get the value of street_address_1
     */ 
    public function getStreetAddress1()
    {
        return $this->street_address_1;
    }

    /**
     * Set the value of street_address_1
     *
     * @return  self
     */ 
    public function setStreetAddress1($street_address_1)
    {
        $this->street_address_1 = $street_address_1;

        return $this;
    }

    /**
     * Get the value of street_address_2
     */ 
    public function getStreetAddress2()
    {
        return $this->street_address_2;
    }

    /**
     * Set the value of street_address_2
     *
     * @return  self
     */ 
    public function setStreetAddress2($street_address_2)
    {
        $this->street_address_2 = $street_address_2;

        return $this;
    }

    /**
     * Get the value of city
     */ 
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set the value of city
     *
     * @return  self
     */ 
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get the value of state
     */ 
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set the value of state
     *
     * @return  self
     */ 
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get the value of postcode
     */ 
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * Set the value of postcode
     *
     * @return  self
     */ 
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;

        return $this;
    }

    /**
     * Get the value of country
     */ 
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set the value of country
     *
     * @return  self
     */ 
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }
}