<?php

#Revision History
# Developer                                    Date                          comments
#Urum bone aso(1831133)           April. 26, 2021          Created the object cutomer
#Urum bone aso(1831133)           April. 29, 2021          create folder object abd moved all object into folder objects



class Customer
{
    # attributes to the object cutomers
    private $customer_Id = "";
    private $customerFirstName = "";
    private $customerLastName = "";
    private $customerAddress  = "";
    private $customerCity = ""; 
    private $customerProvince = "";
    private $customerPostalCode ="";
    private $customerUserName = "";
    private $customerPassword = "";
    private $customerDateCreated = "";
    private $customerDateModified ="";
    
    # contructor for class customer
    
    
    function __construct($customer_id = "", $customerFirstName = "", $customerLastName = "",$customerAddress  = "", $customerCity = "", $customerProvince = "", $customerPostalCode ="", $customerUserName = "" , $customerPassword = "") {
        if($customerFirstName = "")
        {
            $this->setCustomerFirstName($customerFirstName);
            $this->setCustomerLastName($customerLastName);
            $this->setCustomerAddress($customerAddress);
            $this->setCustomerCity($city);
            $this->setCustomerPrivince($customerProvince);
            $this->setCustomerPostalCode($customerPostalCode);
            $this->setCustomerUserName($customerUserName);
            $this->setCustomerPassword($customerPassword); 
        }
    }
    
    
    #getters and setters for customet id
    public function getCustomer_Id() {
        return $this->customer_Id;  
    }
    
    public function setCustomer_Id($cus_id) { 
        $this->customer_Id =$cus_id; 
    }
    
     #getters and setters for customer first name
    public function getCustomerFirstName() {
        return $this->customerFirstName;  
    }
    
    public function setCustomerFirstName($cusfname) { 
        $this->customerFirstName=$cusfname; 
    }
    
    
      #getters and setters for customer first name
    public function getCustomerLastName() {
        return $this->customerLastName;  
    }
    
    public function setCustomerLastName($cuslname) { 
        $this->customerLastName=$cuslname; 
    }
    
    # getter and setter for cutomer addresss
    public function getCustomerAddress() {
        return $this->customerAddress;  
    }
    
    public function setCustomerAddress($cusAdd) { 
        $this->customerAddress =$cusAdd;
    }
            
    # getter and setter for cutomer city
    
    public function getCustomerCity() {
        return $this->customerCity;   
    }
    
    public function setCustomerCity($city) {
        $this->customerCity = $city; 
    }
    
    # getter and setter for cutomer province
    public function getProvince() {
        return $this->customerProvince;    
    }
    
    public function setCustomerProvince($province) {
        $this->customerProvince = $province;
    }
    
    # getter and setter for cutomer postal code
    public function getCustomerPostalCode() {
        return $this->customerPostalCode;
    }
    public function setCustomerPostalCode($pCode) {
        $this->customerPostalCode = $pCode;
    }
    
    # getter and setter for cutomer userName
    public function getCustometUserName() {
        return $this->customerUserName;     
    }
    
    public function setCustomerUserName($uName) {
        $this->customerUserName =$uName;
        
    }
    
    # getter and setter for cutomer password 
    public function getCustomerPassword() {
        return $this->customerPassword;  
    }
    
    public function setCustomerPassword($pword) {
        $this->customerPassword = $pword;   
    }
    
    # getter and setter for cutomer  date Created    
    public function getCustomerDateCreated() {
        return $this->customerDateCreated;   
    }
    public function setCustomerDateCreated($dCreate) {
        $this->customerDateCreated =$dCreate;
    }
    
    # getter and setter for cutomer  date modified
    public function getCustomerDateModified() {
        return $this->customerDateModified;
    }
    
    public function setCustomerDateModified($dModi) {
        $this->customerDateModified = $dModi;
    }
    
 
    public function load($customer_Id)
       {
         
           global $connection;
           $SQLQuery = "CALL customers_select_one(:customer_Id)";
           
           $PDOStatement = $connection->prepare($SQLQuery);
           
           $PDOStatement -> bindParam(':customer_Id',$customer_Id);
         
           $PDOStatement->execute();
            
           if($row =$PDOStatement->fetch())
           {
               
               $this->customer_Id =$row["customer_Id"];
               $this->customerFirstName =$row["customerFirstName"];
               $this->customerLastName =$row["customerLastName"];
               $this->customerAddress =$row["customerAddress"];
               $this->customerCity =$row["customerCity"];
               $this->customerProvince =$row["customerProvince"];
               $this->customerPostalCode =$row["customerPostalCode"];
               $this->customerUserName =$row["customerUserName"];
               $this->customerPassword=$row["customerPassword"];
               $this->customerDateCreated =$row["customerDateCreated"];
               $this->customerDateModified =$row["customerDateModified"];
              
               return true;
           }
           $PDOStatement->closeCursor();
           $PDOStatement= null;
           
       }   
       
       
       //// stock  here
        public function save() {
           global $connection;
           
           
            if($this->customer_Id == "")
            {
           $SQLQuery = "CALL customers_insert(:customerFirstName, "
                   . ":customerLastName, "
                   . ":customerAddress,"
                   . ":customerCity,"
                   . ":customerProvince,"
                   . ":customerPostalCode,"
                   . ":customerUserName,:"
                   . "customerPassword)";
           $PDOStatement = $connection->prepare($SQLQuery);
           $PDOStatement -> bindParam(":customerFirstName", $this->customerFirstName);
           $PDOStatement -> bindParam(":customerLastName", $this->customerLastName);
           $PDOStatement -> bindParam(":customerAddress", $this->customerAddress);
           $PDOStatement -> bindParam(":customerCity", $this->customerCity);
           $PDOStatement -> bindParam(":customerProvince", $this->customerProvince);
           $PDOStatement -> bindParam(":customerPostalCode", $this->customerPostalCode);
           $PDOStatement -> bindParam(":customerUserName", $this->customerUserName);
           $PDOStatement -> bindParam(":customerPassword", $this->customerPassword);
           $PDOStatement->execute();
          
            }
            
            $PDOStatement->execute();
            $PDOStatement->closeCursor();
           $PDOStatement= null;
           
           
       }
       
       public function update() {
           global $connection;
            
                $SQLQuery = "CALL customers_update(:customerFirstName, "
                   . ":customerLastName, "
                   . ":customerAddress,"
                   . ":customerCity,"
                   . ":customerProvince,"
                   . ":customerPostalCode,"
                   . ":customerUserName,"
                   . ":customerPassword,"
                   . ":customer_Id);";
       
           $PDOStatement = $connection->prepare($SQLQuery);
           $PDOStatement -> bindParam(":customerFirstName", $this->customerFirstName);
           $PDOStatement -> bindParam(":customerLastName", $this->customerLastName);
           $PDOStatement -> bindParam(":customerAddress", $this->customerAddress);
           $PDOStatement -> bindParam(":customerCity", $this->customerCity);
           $PDOStatement -> bindParam(":customerProvince", $this->customerProvince);
           $PDOStatement -> bindParam(":customerPostalCode", $this->customerPostalCode);
           $PDOStatement -> bindParam(":customerUserName", $this->customerUserName);
           $PDOStatement -> bindParam(":customerPassword", $this->customerPassword);
           $PDOStatement -> bindParam(":customer_Id",$this->customer_Id);
           
           $PDOStatement->execute();
            $PDOStatement->closeCursor();
           $PDOStatement= null;
           
            }
                
}


