<?php

#Revision History
# Developer                                    Date                          comments
#Urum bone aso(1831133)           April. 26, 2021          Created the object purchase
#Urum bone aso(1831133)           April. 29, 2021          create folder object abd moved all object into folder objects


class Purchase
{
     # attributes to the object  purchase
    private $purchase_Id = ""; 
    private $customer_Id = ""; 
    private $product_Id = "";
    private $purchaseQuantitySold ="";
    private $purchaseProdPrice = "";
    private $purchaseComments ="";
    private $purchaseSubtotal = "";
    private $purchaseTaxes ="";
    private $purchaseGrandtotal = "";
    private $purchaseDateCreated = "";
    private $purchaseDateModified = "";
    
    
     # contructor for class purchase
    
     function __construct($purchase_Id = "", 
                          $customer_Id ="", 
                          $product_Id ="",
                          $purchaseQuantitySold ="",
                          $purchaseProdPrice ="",
                          $purchaseComments ="",
                          $purchaseSubtotal = "",
                          $purchaseTaxes ="",
                          $purchaseGrandtotal = "") {
         $this->purchase_Id =$product_Id;
         $this->customer_Id=$customer_Id;
         $this->product_Id =$product_Id;
         $this->purchaseQuantitySold = $purchaseQuantitySold;
         $this->purchaseProdPrice=$purchaseProdPrice;
         $this->purchaseComments = $purchaseComments;
         $this->purchaseSubtotal = $purchaseSubtotal;
         $this->purchaseTaxes = $purchaseTaxes;
         $this->purchaseGrandtotal = $purchaseGrandtotal;
     }
    
    #getters and setters for purchase id
    public function getPurchase_Id() {
        return $this->purchase_Id;
    }
    
    #getters and setters for customer id
     public function getCustomer_Id() {
        return $this->customer_Id;  
    }
    
    public function setCustomer_Id($cus_id) { 
        $this->customer_Id =$cus_id; 
    }
    #getters and setters for product  id
     public function getProduct_Id() {
       return $this->product_Id;
   }
   public function setProduct_Id($prodId) {
       $this->product_Id = $prodId;
   }
    #getters and setters for purchase  quantity sold
    public function getPurchaseQuantitySold() {
        return $this->purchaseQuantitySold;
    }
    public function setPurchaseQuantitySold($pqsold) {
        $this->purchaseQuantitySold = $pqsold;
    }
    #getters and setters for purchase product price
    public function getPurchaseProdPrice() {
        return $this->purchaseProdPrice;
    }
    public function setPurchaseProdPrice($prodPrice) {
        return $this->purchaseProdPrice = $prodPrice;
    }
    #getters and setters for purchase  comments
    Public function getPurchaseComments() {
        return $this->purchaseComments;
    }
    public function setPurchaseComments($pComment) {
        $this->purchaseComments = $pComment;
    }
    #getters and setters for purchase  date create
    public function getPurchaseDateCreated() {
       return $this->purchaseDateCreatedDate;
    }
    public function setPurchaseDateCreated($dcreate) {
       $this->purchaseDateCreated = $dcreate;
    }
    
    #getters and setters for purchase  subtotal
    public function getPurchaseSubTotal() {
        return $this->purchaseSubtotal;    
    }
    public function setPurchaseSubTotal($subT) {
        $this->purchaseSubtotal = $subT;
        
    }
    #getters and setters for purchase  taxes
    public function getPurchaseTaxes() {
        return $this->purchaseTaxes;
    }
    public function setPurchaseTaxes($tax) {
        $this->purchaseTaxes= $tax;
    }
    #getters and setters for purchase  grand total
    public function getPurchaseGrandTotal() {
        return $this->purchaseGrandtotal;       
    }
    
    public function setPurchaseGrandTotal($GrandT) {
        $this->purchaseGrandtotal=$GrandT;  
    }
    
   #getters and setters for purchase date modified
     public function getPurchaseDateModified() {
       return $this->PurchaseDateModified;
   }
   public function setPurchaseDateModified($dmodii) {
       $this->purchaseDateModifiedurchaseDateModified = $dmodii;
   }
    
    
    
   public function load($purchase_Id)
       {
           global $connection;
           $SQLQuery = "CALL purchases_select_one(:purchase_Id)";
           $PDOStatement = $connection->prepare($SQLQuery);
           $PDOStatement -> bindParam(":purchase_Id",$purchase_Id);
           $PDOStatement->execute();
           
           if($row =$PDOStatement->fetch())
           {
               
               $this->purchase_Id =$row["purchase_Id"];
               $this->customer_Id =$row["customer_Id"];
               $this->product_Id =$row["product_Id"];
               $this->purchaseQuantitySold =$row["purchaseQuantitySold"];
               $this->purchaseProdPrice =$row["purchaseProdPrice"];
               $this->purchaseComments =$row["purchaseComments"];
               $this->purchaseSubtotal =$row["purchaseSubtotal"];
               $this->purchaseTaxes =$row["purchaseTaxes"];
               $this->purchaseGrandtotal =$row["purchaseGrandtotal"];
               $this->purchaseDateCreated =$row["purchaseDateCreated"];
               $this->purchaseDateModified =$row["purchaseDateModified"];
              
               return true;
               
               
           }
           
          $PDOStatement->closeCursor();
          $PDOStatement= null;
          
       }   
    
     public function save() {
           global $connection;
           
           
            if($this->purchase_Id == "")
            {
               
           $SQLQuery = "CALL purchases_insert(:customer_Id, :product_Id,:purchaseQuantitySold,:purchaseProdPrice,:purchaseComments,:purchaseSubtotal,:purchaseTaxes,:purchaseGrandtotal)";
           
           $PDOStatement = $connection->prepare($SQLQuery);
           
           $PDOStatement -> bindParam(":customer_Id", $this->customer_Id);
           $PDOStatement -> bindParam(":product_Id", $this->product_Id);
           $PDOStatement -> bindParam(":purchaseQuantitySold", $this->purchaseQuantitySold);
           $PDOStatement -> bindParam(":purchaseProdPrice", $this->purchaseProdPrice);
           $PDOStatement -> bindParam(":purchaseComments", $this->purchaseComments);
           $PDOStatement -> bindParam(":purchaseSubtotal", $this->purchaseSubtotal);
           $PDOStatement -> bindParam(":purchaseTaxes", $this->purchaseTaxes);
           $PDOStatement -> bindParam(":purchaseGrandtotal", $this->purchaseGrandtotal);
           $PDOStatement->execute();
           echo "this is the sport";
            }
                
           
           $PDOStatement->closeCursor();
           $PDOStatement= null;
           
       }
       
       public function update() {
        
        global $connection;
        
        
        
        $SQLQuery = "CALL purchases_update(:customer_Id,:product_Id,:purchaseQuantitySold,:purchaseProdPrice,:purchaseComments,:purchaseSubtotal,:purchaseTaxes,:purchaseGrandtotal, :purchase_Id)";

            $PDOStatement = $connection->prepare($SQLQuery);
           $PDOStatement -> bindParam(":customer_Id", $this->customer_Id);
           $PDOStatement -> bindParam(":product_Id", $this->product_Id);
           $PDOStatement -> bindParam(":purchaseQuantitySold", $this->purchaseQuantitySold);
           $PDOStatement -> bindParam(":purchaseProdPrice", $this->purchaseProdPrice);
           $PDOStatement -> bindParam(":purchaseComments", $this->purchaseComments);
           $PDOStatement -> bindParam(":purchaseSubtotal", $this->purchaseSubtotal);
           $PDOStatement -> bindParam(":purchaseTaxes", $this->purchaseTaxes);
           $PDOStatement -> bindParam(":purchaseGrandtotal", $this->purchaseGrandtotal);
           $PDOStatement -> bindParam(":purchase_Id",$this->purchase_Id);
         
           $PDOStatement->execute();
           
           $PDOStatement->closeCursor();
           $PDOStatement= null;         
    }   
}