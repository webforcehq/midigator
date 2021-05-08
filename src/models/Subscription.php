<?php

namespace WebforceHQ\Midigator\Models;

use phpDocumentor\Reflection\Types\Boolean;
use WebforceHQ\Midigator\Models\MidigatorModel;

class Subscription extends MidigatorModel
{


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
     * Get the value of url
     */ 
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set the value of url
     *
     * @return  self
     */ 
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get the value of type
     */ 
    public function getType()
    {
        return $this->event_type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */ 
    public function setType($type)
    {
        $this->event_type = $type;

        return $this;
    }
    
    /**
     * Get the value of active
     */ 
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set the value of active
     *
     * @return  self
     */ 
    public function setActive(bool $active)
    {
        $this->active = $active;

        return $this;
    }
}
