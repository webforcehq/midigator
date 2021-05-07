<?php

namespace WebforceHQ\Midigator\Models;

use Exception;
use JsonSerializable;

abstract class MidigatorModel implements JsonSerializable
{
    
    public function jsonSerialize(){
        return get_object_vars($this);
    }
    
    public function toArray(){
        return array_filter(json_decode(json_encode($this), true));
    }

    protected function allObjectsAreValidClass(array $validClasses, array $objects){
        foreach($objects as $object){
            $currClazz = get_class($object);
            if( ! in_array($currClazz, $validClasses) ){
                $allowedClasses = join(",",$validClasses);
                throw new Exception("Object of class {$currClazz} not allowed, expecting objects of classes: {$allowedClasses}");
            }
        }
    }

    public function addAuth(array $credentials){
        $this->auth = $credentials;
        return $this;
    }
    

}
