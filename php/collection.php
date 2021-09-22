<?php

#Revision History
# Developer                                    Date                          comments
#Urum bone aso(1831133)           April. 29, 2021          created collection file to extend to my objects


class Collection
{
    # decaration for the container for  the collection of objects
    public $allObjects = array();
    
    # funtion to add an object to the collection of objects;
    
    public function add($primary_Key,$object) {
        
        $this->allObjects[$primary_Key]= $object;
        
    }
    
    # function to remove an object to the collection of all the objects
     public function remove($primary_Key)
     {    
         if(isset($this->allObjects[$primary_Key]))
         {
             unset($this->allObjects[$primary_Key]);   
         }      
    }
        
    # function to get one object from the collection of objects
     public function get($primary_Key)
     {
         
         if(isset($this->allObjects[$primary_Key]))
         {
             return $this->allObjects[$primary_Key];             
         }                
    }
    
    #function to count the number of objection in the collection  off all the objects
    public function count() {
        
        return count($this->allObjects);
        
    }
    
    
    
    
    
}
