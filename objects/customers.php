<?php

#Revision History
# Developer                                    Date                          comments
#Urum bone aso(1831133)           April. 29, 2021          Created the object cutomers


require_once FILE_OBJECT_CUSTOMER;
require_once FILE_COLLECTION;
require_once FILE_CONNECT;

class Customers extends Collection
{
    
//     function __construct( $years) 
    function __construct() 
    {
        global $connection;
        
        $SQLQuery = "CALL customers_select_all()";
        $PDOStatement = $connection->prepare($SQLQuery);
        $PDOStatement->execute();
        while($row =$PDOStatement->fetch())
        {
           
            
            $customer = new Customer(
                    $row["customer_Id"],
                    $row["customerFirstName"],
                    $row["customerLastName"],                
                    $row["customerAddress"],
                    $row["customerCity"],
                    $row["customerProvince"],                                    
                    $row["customerPostalCode"],
                    $row["customerUserName"],
                    $row["customerPassword"],
                    $row["customerDateCreated"], 
                    $row["customerDateModified"]);
              
            $this->add($row["customer_Id"], $customer);
            
                   
        }  
        $PDOStatement->closeCursor();
        $PDOStatement= null;
    }
}

