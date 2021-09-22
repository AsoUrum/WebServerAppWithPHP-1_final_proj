<?php


#Revision History
# Developer                                    Date                          comments
#Urum bone aso(1831133)           April. 30, 2021          Created the object purchases

require_once FILE_OBJECT_PURCHASE;
require_once FILE_COLLECTION;
require_once FILE_CONNECT;

class Purchases extends Collection
{
    
    
     function __construct() 
    {
        global $connection;
        
        $SQLQuery = "CALL purchases_select_all()";
        $PDOStatement = $connection->prepare($SQLQuery);
        $PDOStatement->execute();
        while($row =$PDOStatement->fetch())
        {
   
            $purchase = new Purchase(
                    
                    $row["purchase_Id"],
                    $row["customer_Id"],
                    $row["product_Id"],
                    $row["purchaseQuantitySold"],
                    $row["purchaseProdPrice"],                
                    $row["purchaseComments"],                   
                    $row["purchaseSubtotal"],
                    $row["purchaseTaxes"],
                    $row["purchaseGrandtotal"],
                    $row["purchaseDateCreated"],
                    $row["PurchaseDateModified"]);                                    
      
            $this->add($row["purchase_Id"],$purchase);
                          
        } 
     $PDOStatement->closeCursor();
      $PDOStatement= null;
    } 
    
    
    function search($customerId,$year){
        
        global $connection;
        
        $SQLQuery = "CALL purchasesSearchByDate(:customerId,:year)";
        $PDOStatement = $connection->prepare($SQLQuery);
        $PDOStatement -> bindParam(':customerId',$customerId);
        $PDOStatement -> bindParam(':year',$year);
        $PDOStatement->execute();
        while($row =$PDOStatement->fetch())
        {
   
            $purchase = new Purchase(
                    
                    $row["purchase_Id"],
                    $row["customer_Id"],
                    $row["product_Id"],
                    $row["purchaseQuantitySold"],
                    $row["purchaseProdPrice"],                
                    $row["purchaseComments"],                   
                    $row["purchaseSubtotal"],
                    $row["purchaseTaxes"],
                    $row["purchaseGrandtotal"],
                    $row["purchaseDateCreated"],
                    $row["PurchaseDateModified"]);                                    
      
            $this->add($row["purchase_Id"],$purchase);
                          
        } 
     $PDOStatement->closeCursor();
      $PDOStatement= null;
    } 
    

    
    
    
    
    
    
}