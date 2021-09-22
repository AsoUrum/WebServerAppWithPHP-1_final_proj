<?php


#Revision History
# Developer                                    Date                          comments
#Urum bone aso(1831133)           April. 30, 2021          Created the object products

require_once FILE_OBJECT_PRODUCT;
require_once FILE_COLLECTION;
require_once FILE_CONNECT;

class Products extends Collection
{
    
    
     function __construct() 
    {
        global $connection;
        
        $SQLQuery = "CALL products_select_all()";
        $PDOStatement = $connection->prepare($SQLQuery);
        $PDOStatement->execute();
        while($row =$PDOStatement->fetch())
        {
           
            
            $product = new Product($row["product_Id"], $row["productCode"], $row["productDescription"], $row["productPrice"], $row["productCostPrice"]);
                   
            
            $this->add($row["product_Id"], $product);
                             
        }  
        $PDOStatement->closeCursor();
        $PDOStatement= null;
           
    } 
}
