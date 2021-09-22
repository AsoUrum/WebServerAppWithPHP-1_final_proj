<?php

#Revision History
# Developer                                    Date                          comments
#Urum bone aso(1831133)           April. 26, 2021          Created the object product
#Urum bone aso(1831133)           April. 29, 2021          create folder object abd moved all object into folder objects

class Product
{
    # attributes to the object  products
   private $product_Id = "";
   private $productCode = "";
   private $productDescription = "";
   private $productPrice = ""; 
   private $productCostPrice = "";
   private $productDateCreated ="";
   private $productDateModified = "";
   
   
    # contructor for class product
   
   function __construct($product_Id = "",$productCode = "",$productDescription ="", $productPrice ="", $productCostPrice ="") {
       
       if($productCode!="")
       {
          
           $this->setProduct_Id($product_Id);
           $this->setProductCode($productCode);
           $this->setProductDescription($productDescription);
           $this->setProductPrice($productPrice);
           $this->setProductCostPrice($productCostPrice);
       }
   }
    
   
   #getters and setters for product id
   
   public function getProduct_Id() {
       return $this->product_Id;
   }
   public function setProduct_Id($prodId) {
       $this->product_Id = $prodId;
   }
    
   #getters and setters for product code
   public function getProductCode() {
       return $this->productCode;
   }
   public function setProductCode($pCode) {
       $this->productCode =$pCode;
   }
   #getters and setters for product description
   public function getProductDescription() {
       return $this->productDescription;
   }
   public function setProductDescription($pDres) {
       $this->productDescription = $pDres;
   }
   #getters and setters for product price
   public function getProductPrice() {
       return $this->productCostPrice;
   }
   public function setProductPrice($price) {
       $this->productPrice = $price;
   }
   #getters and setters for product cost price
   public function getProductCostPrice() {
       return $this->productCostPrice;
   }
   public function setProductCostPrice($pCost) {
       $this->productCostPrice =$pCost;
   }
   #getters and setters for product date created
   public function getProductDateCreated() {
       return $this->productDateCreated;
   }
   public function setProductDateCreated($dcreate) {
       $this->productDateCreated = $dcreate;
   }
   #getters and setters for product date modified
   public function getProductDateModified() {
       return $this->productDateModified;
   }
   public function setProductDateModified($dmodii) {
       $this->productDateModified = $dmodii;
   }
   
   
   public function load($product_Id)
       {
           
           global $connection;
           $SQLQuery = "CALL products_select_one(:product_Id)";
           $PDOStatement = $connection->prepare($SQLQuery);
           $PDOStatement -> bindParam(":product_Id", $product_Id);
           $PDOStatement->execute();
           
           if($row =$PDOStatement->fetch())
           {
              
               $this->product_Id =$row["product_Id"];
               $this->productCode =$row["productCode"];
               $this->productDescription =$row["productDescription"];
               $this->productPrice =$row["productPrice"];
               $this->productCostPrice =$row["productCostPrice"];
               $this->productDateCreated =$row["productDateCreated"];
               $this->productDateModified =$row["productDateModified"];
              
               return true;
           } 
           
           $PDOStatement->closeCursor();
           $PDOStatement= null;
           
       }   
   
    public function save() {
           global $connection;
           
           
            if($this->product_Id == "")
            {
                
           $SQLQuery = "CALL products_insert(:productCode,:productDescription,:productPrice,:productCostPrice)";
                   
           $PDOStatement = $connection->prepare($SQLQuery);
           $PDOStatement -> bindParam(":productCode", $this->productCode);
           $PDOStatement -> bindParam(":productDescription", $this->productDescription);
           $PDOStatement -> bindParam(":productPrice", $this->productPrice);
           $PDOStatement -> bindParam(":productCostPrice", $this->productCostPrice);
           
           $PDOStatement->execute();
          
            }
            
            
           $PDOStatement->closeCursor();
           $PDOStatement= null;
         
           
       }
   
   
   

   
    public function update() {
        
        global $connection;
        
        
        
        $SQLQuery = "CALL products-update(:productCode,:productDescription,:productPrice,:productCostPrice,:product_Id)";

           $PDOStatement = $connection->prepare($SQLQuery);
           $PDOStatement -> bindParam(":productCode", $this->productCode);
           $PDOStatement -> bindParam(":productDescription", $this->productDescription);
           $PDOStatement -> bindParam(":productPrice", $this->productPrice);
           $PDOStatement -> bindParam(":productCostPrice", $this->productCostPrice);
           
           $PDOStatement -> bindParam(":product_Id",$this->product_Id);
           echo "before";
           $PDOStatement->execute();
           echo "done update";
            

          
           
           $PDOStatement->closeCursor();
           $PDOStatement= null;

    }
      
  
                 
   
   
}