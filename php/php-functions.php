<?php
#Revision History
# Developer                       Date                 comments
#Urum bone aso(1831133)           Feb. 20, 2021          Created function page and created some functions
#Urum bone aso(1831133)           Feb. 21, 2021           modified footer function and created and also created form funtion
#Urum bone aso(1831133)           Feb. 26,2021        update my review his  to match what is request by the teacher                                                      add comments to identify my functions.
#URUM BONE ASO(1831133)           FEB 28,2021           STARTED TO CREATE VALIDATION RECIEVE FUNCTION
#URUM BONE ASO(1831133)           march 9,2021           created function to generate table
#URUM BONE ASO(1831133)           march 9,2021           modified header
##URUM BONE ASO(1831133)           march 9,2021         created function to add and  multiply,  created array to add infor, convert to jason and add to file purcchases.txt

#URUM BONE ASO(1831133)           march 10,2021      fix functiond to diplay tabel and validation
#URUM BONE ASO(1831133)           march 11/12/13,2021      did all the final miss parts of the project
$debug = false;
#funtion errors 
function manageError($errorNumber,$errormessage,$errorFile,$errorLine)
{
    global $debug;
   
    if($debug)
    {
//         echo"An error has occured, we are notied and working on it ";
    echo " An error occured in the file $errorFile at line $errorLine:".
            "Error number $errorNumber:$errormessage";
    }
   
        $logInfor= " An error occured in the file $errorFile at line $errorLine:".
        "Error number $errorNumber:$errormessage";
        file_put_contents(FILE_ERRORLOG,$logInfor."\r\n", FILE_APPEND) or die("cannot open the file");
    die();
    
}

function manageException($errorObject)
{
    
   $logInfor = "An error occured in the file " .$errorObject->getFile(). "at line ".
            $errorObject->Getline()." ". $errorObject->getMessage();
    file_put_contents(FILE_ERRORLOG_EXCEPTION,$logInfor."\r\n", FILE_APPEND) or die("cannot open the file");
    

}


        set_error_handler("manageError");
        set_exception_handler("manageException");


require_once FILES_CONSTANTS_FUNCTIONS;
require_once FILE_COLLECTION;
require_once FILE_CONNECT;
require_once FILES_CONSTANTS;
require_once FILES_PHP_FUNCTIONS;
require_once FILE_OBJECT_CUSTOMER;
require_once FILE_OBJECT_CUSTOMERS;
require_once FILE_OBJECT_PRODUCTS;
require_once FILE_OBJECT_PRODUCT;
require_once FILE_OBJECT_PURCHASE;
require_once FILE_OBJECT_PURCHASES;
session_start();
//$customer = new Customer();
//$customer->load("0ed90faf-aaf5-11eb-a8c8-5065f3bab94e");
//echo $customer->getCustomerFirstName();
createSendHeader();
header('Expires: Thu, 01 Dec 1994 14:00:00 GMT');
header('Cache-Control: no-cache');
header('Pragma: no-cache');

# funtion to generate the header
function createPageHeader($pagetitle){
  ?><!DOCTYPE html>
            <html>
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device.width,initial.scale=1.0">
                    <link rel="stylesheet" type="text/css" href="<?php echo(FILES_CSS_STYLES); ?>">
                   <title><?php echo $pagetitle; ?></title>                  
                </head>
                <body class="<?php getprintFromUrl() ?>">                  
    <?php      
}

#fiunction to generate the footer
function createPageFooter(){ 
  ?>
         <footer>          
            <?php
             copyRightInfo();
            ?>      
            </body>
          </footer>            
            </html>
    <?php
}


#function to generate copyright on footer
function copyRightInfo(){    
     $mydate = new DateTime("now");
     echo "Copyright &copy; Urum Bone Aso ".$mydate->format("Y");   
}

# function to generate the navigation menu
function creatNav(){
//    createLog();
    ?>
         <nav class="topNav">
             <?php createLog() ?>         
              
             <a href=" <?php echo FILE_HOME_PAGE?>">Home</a>
             <a href="<?php echo FILE_BUY_PAGE ?> " >Buy</a>
             <a href="<?php echo FILE_PURCHASES_PAGE ?> " >Purchases</a>
             <a href="<?php echo FILE_ACCOUNT_PAGE?> " >Account</a>
            
             <?php 
               if(isset($_SESSION["customerId"]) && isset($_SESSION["Name"] )) {
                   ?> <a href="<?php echo FILE_ORDER_PAGE?> " >Orders</a> <?php                   
               }             
              ?>
                 
                   
             <a href="<?php echo FILES_DATA_CHEATSHEET?> " >My Cheat Sheet</a>
            </nav>        
     <?php
     session();
    
}

#function to send the network hearder
function createSendHeader(){    
    header(HEADER_INFOR);
}

#function to create the logo
function createLog(){   
    echo"<img src= '".FILE_LOGO. "'>";   
}

function  createForm(){ 
global $errorProdCode;
global $errorCusFname;
global $errorCusLname;
global $errorCusCity;
global $errorComments;
global $errorPrice;
global $errorQuantity;  

global $prodCode;
global $cusFname;
global $cusLname;
global $cusCity;
global $comments;
global $price;
global $quantity; 
    ?>
            <form class = "myForm"   action="<?php echo FILE_BUYING_PAGE ?>" method="POST">
                <p>
                    <label><h1>Place Your Order</h1></label><br>
                    
                    <label class="stared"><b>Product Code: </label><br>
                    <input type="text" name="prodCode"  value="<?php echo $prodCode?>" ><span class="spanColor"><?php echo $errorProdCode?></span><br>
                    
                    <label class="stared" >Customer First Name: </label><br>
                    <input type="text" name="firstName" value="<?php echo $cusFname?>" ><span class="spanColor"><?php echo $errorCusFname?></span><br>
                    
                    <label class="stared" >Customer Last Name: </label><br>
                    <input type="text" name="lastName" value="<?php echo $cusLname?>" ><span class="spanColor"><?php echo $errorCusLname?></span><br>
                    
                    <label class="stared">Customer City: </label><br>
                    <input type="text" name="city"  value="<?php echo $cusCity?>" ><span class="spanColor"><?php echo $errorCusCity?></span><br>
                    
                    <label>Comments: </label><br>
                    <textarea name="comments"value="<?php echo $comments?>" ></textarea><br><span class="spanColor"><?php echo $errorComments?></span><br>
                    
                    <label class="stared">Price : </label><br>
                    <input type="" name="price" value="<?php echo $price?>" ><span class="spanColor"><?php echo $errorPrice?></span><br>
                    
                    <label class="stared">Quantity: </label><br>
                    <input type="" name="quantity" value="<?php echo $quantity?>"><span class="spanColor"><?php echo $errorQuantity?></span><br>
                </p>
                
                <input type = "submit" value = "Save" name = "save">      
            </form> 
            
            
    <?php   
}


function creatRegisterForm(){
global $firstname;
global $lastname;
global $address;
global $city;
global $province;
global $postalcode;
global $username;
global $password;

global $errorfirstname;
global $errorlastname;
global $erroraddress;
global $errorcity;
global $errorprovince;
global $errorpostalcode;
global $errorusername;
global $errorpassword;
    
    
    
    
    ?>
            
            <form class = "m"   action="<?php echo FILE_REGISTER_PAGE ?>" method="POST">
                
                First name:  <input type ="text" name ="firstname" value="<?php echo $firstname?>"   ><span class="spanColor"><?php echo $errorfirstname?></span><br>
                Last  name:  <input type ="text" name ="lastname"  value="<?php echo $lastname?>"   ><span class="spanColor"><?php echo $errorlastname?></span><br>
                Address:     <input type ="text" name ="address" value="<?php echo $address?>"  ><span class="spanColor"><?php echo $erroraddress?></span><br>
                City:        <input type ="text" name ="city" value="<?php echo $city?>"  ><span class="spanColor"><?php echo $errorcity?></span><br>
                Province:    <input type ="text" name ="province"  value="<?php echo $province?>"  ><span class="spanColor"><?php echo $errorprovince?></span><br>
                Postal Code: <input type ="text" name ="postalcode"  value="<?php echo $username?>" ><span class="spanColor"><?php echo $errorpostalcode?></span><br>
                Username:    <input type ="text" name ="username" value="<?php echo $password?>"  ><span class="spanColor"><?php echo $errorusername?></span><br>
                Password:    <input type ="password" name ="password"  ><span class="spanColor"><?php echo $errorpassword?></span><br>
                <input type ="submit" name ="register" value="Register"  >
                  
            </form>  
              
    <?php
            
}
#function to register customer
function registerCustomer(){
    
global $firstname;
global $lastname;
global $address;
global $city;
global $province;
global $postalcode;
global $username;
global $password;

global $errorfirstname;
global $errorlastname;
global $erroraddress;
global $errorcity;
global $errorprovince;
global $errorpostalcode;
global $errorusername;
global $errorpassword;
    


    # declaring a customer to register
    $customer = new Customer();
    
 if(isset($_POST["register"]))
    {
            $firstname = htmlspecialchars($_POST["firstname"]);
            $lastname =htmlspecialchars($_POST["lastname"]);
            $address = htmlspecialchars($_POST["address"]);
            $city= htmlspecialchars($_POST["city"]);
            $province = htmlspecialchars($_POST["province"]);
            $postalcode = htmlspecialchars($_POST["postalcode"]);
            $username= htmlspecialchars($_POST["username"]);
            $password= htmlspecialchars($_POST["password"]);
            
           $validated = true;
                #first name validation
            if($firstname=="")
            {
                $errorfirstname = "Please enter a firstname";
                $validated = false;
            }
             else if(mb_strlen($firstname)> NAME_MAX_LENGTH)
            {
                    $errorfirstname = "The fisrtname  cannot contain more than".PRODCODE_MAX_LENGTH." characters"; 
                    $validated = false;
            }
            
                #last name validation
            if($lastname=="")
            {
                $errorlastname = "Please enter a last name";
                $validated = false;
            }
             else if(mb_strlen($lastname)> NAME_MAX_LENGTH)
            {
                    $errorlastname = "The last name  cannot contain more than".PRODCODE_MAX_LENGTH." characters"; 
                    $validated = false;
            }
            
               #address  validation
            if($address=="")
            {
                $erroraddress = "Please enter a  address";
                $validated = false;
            }
             else if(mb_strlen($address)> ADDRESS_MAX_LENGTH)
            {
                    $erroraddress = "The  address cannot contain more than".PRODCODE_MAX_LENGTH." characters"; 
                    $validated = false;
            }
            
            
            
             #city  validation
            if($city=="")
            {
                $errorcity = "Please enter a  city";
                $validated = false;
            }
             else if(mb_strlen($city)> CITY_MAX_LENGTH)
            {
                    $errorcity = "The  city cannot contain more than".PRODCODE_MAX_LENGTH." characters"; 
                    $validated = false;
            }
            
               #province validation 
            if($province=="")
            {
                $errorprovince = "Please enter the province";
                $validated = false;
            }
             else if(mb_strlen($province)> PROVINCE_MAX_LENGTH)
            {
                    $errorprovince = "The  province cannot contain more than".PRODCODE_MAX_LENGTH." characters"; 
                    $validated = false;
            }
            
            
             #postal code  validation
            if($postalcode=="")
            {
                $errorpostalcode = "Please enter a  postal code";
                $validated = false;
            }
             else if(mb_strlen($postalcode)> POSTALCODE_MAX_LENGTH)
            {
                    $errorpostalcode = "The   postal code cannot contain more than".PRODCODE_MAX_LENGTH." characters"; 
                    $validated = false;
            }
    
             #username  validation
            if($username=="")
            {
                $errorusername = "Please enter a  username";
                $validated = false;
            }
             else if(mb_strlen($username)> USERNAME_MAX_LENGTH)
            {
                    $errorusername = "The user name cannot contain more than".PRODCODE_MAX_LENGTH." characters"; 
                    $validated = false;
            }
            
             #password   validation
            if($password=="")
            {
                $errorpassword= "Please enter a  password";
                $validated = false;
            }
             else if(mb_strlen($password)> PASSWORD_MAX_LENGTH)
            {
                    $errorpassword = "The   password cannot contain more than".PRODCODE_MAX_LENGTH." characters"; 
                    $validated = false;
            }
            
            
            
                
                 #saving valided  customer  information
            if($validated == true){
               

                #set the customer infor in the objects .
                $customer->setCustomerFirstName($firstname);
                $customer->setCustomerLastName($lastname);
                $customer->setCustomerAddress($address);
                $customer->setCustomerCity($city);
                $customer->setCustomerProvince($province);
                $customer->setCustomerPostalCode($postalcode);
                $customer->setCustomerUserName($username);
                $customer->setCustomerPassword( password_hash($password, PASSWORD_DEFAULT));
            
                # save customer infor
               $customer->save();
                
                echo "<h3>Thank  you , customer infor registered .</h3>";
                
               $firstname ="";
               $lastname = "";
               $address = "";
               $city = "";
               $province ="";
               $postalcode ="";
               $username ="";
               $password = "";
                
            }
            
    }
                        
}  










#function to recieve post
function recievePostValidation(){
global $errorProdCode;
global $errorCusFname;
global $errorCusLname;
global $errorCusCity;
global $errorComments;
global $errorPrice;
global $errorQuantity;
#global variables
global $prodCode;
global $cusFname;
global $cusLname;
global $cusCity;
global $comments;
global $price;
global $quantity;
global $subTotal;
global $Taxes;
global $grandTotal;
global $array_Purchase;


    if(isset($_POST["save"]))
    {
            $prodCode = htmlspecialchars($_POST["prodCode"]);
            $cusFname =htmlspecialchars($_POST["firstName"]);
            $cusLname = htmlspecialchars($_POST["lastName"]);
            $cusCity= htmlspecialchars($_POST["city"]);
            $comments = htmlspecialchars($_POST["comments"]);
            $price = htmlspecialchars($_POST["price"]);
            $quantity= htmlspecialchars($_POST["quantity"]);
            
            
           $validated = true;
                #product code validation
            if($prodCode=="")
            {
                $errorProdCode = "Please enter a product Code";
                $validated = false;
            }
            else if(mb_strlen($prodCode)> PRODCODE_MAX_LENGTH)
            {
                    $errorProdCode = "The product code cannot contain more than".PRODCODE_MAX_LENGTH." characters"; 
                    $validated = false;
            }
            else if( PRODCODE_FIRST_CHAR !=strtolower($prodCode[0]))
            {
                $errorProdCode = "the first letter of the product code must beign with a p";
                $validated = false;
            }

            
            
       
            #first name validathion
            if($cusFname=="")
            {
                $errorCusFname = "Please enter  first name";
                $validated = false;
            }
            else if(mb_strlen($cusFname)> CUSFNAME_MAX_LENGTH)
            {
                    $errorCusFname= "The first name  cannot contain more than".CUSFNAME_MAX_LENGTH." characters";
                    $validated = false;
            }
    
            
            #last name validation
            if($cusLname=="")
            {
                $errorCusLname = "Please enter last name";
                $validated = false;
            }
            else if(mb_strlen($cusLname)> CUSLNAME_MAX_LENGTH)
            {
                    $errorCusLname= "The last name  cannot contain more than".CUSLNAME_MAX_LENGTH." characters";
                    $validated = false;
            }

            
            #city validation 
            if($cusCity=="")
            {
                $errorCusCity = "Please enter  the city"; 
                $validated = false;
            }
            else if(mb_strlen($cusCity)> CITY_MAX_LENGTH)
            {
                    $errorCusCity= "The city cannot contain more than".CITY_MAX_LENGTH." characters";
                    $validated = false;
            }
            
            # comments validation
   
           if(mb_strlen($comments)> COMMENTS_MAX_LENGTH)
           {
                    $errorComments= "The comments  cannot contain more than".COMMENTS_MAX_LENGTH." characters";
                    $validated = false;
            }
            
            # validation for prce
            if ($price=="")
            {
           
                    $errorPrice= "Please enter the price";
                    $validated = false;
                    
            }else if(!is_numeric($price)){
                    $errorPrice= "Please enter the price";
                    $validated = false;
            }
            else if(($price < PRICE_MIN_AMOUNT || $price>PRICE_MAX_AMOUNT))
            {
                    $errorPrice= "The PRICE cannot be more than ".PRICE_MAX_AMOUNT." less than ".PRICE_MIN_AMOUNT;
                    $validated = false;
                   
            }
            
            # validation for quantity         
            if ($quantity=="")
            {          
                    $errorQuantity = "Please enter the quantity";  
                    $validated = false;
            }
            else if(!is_numeric($quantity)){
                    $errorQuantity = "Please enter the quantity";  
                    $validated = false;
            }
            else if($quantity < QUANTITY_MIN_NUMBER || $quantity > QUANTITY_MAX_NUMBER)
            {
                    $errorQuantity= "The quantity  cannot be more than ".QUANTITY_MAX_NUMBER." less than ".QUANTITY_MIN_NUMBER;
                    $validated = false;
            }
            else if((float)$quantity != (int)$quantity)
            {
                $errorQuantity = "the quantity  can not be a fraction";
                $validated = false;
            }
                    
                
                 #saving valided order information
            if($validated == true){
                #asgning subtotal, taxes and grandtotal
                $subTotal = calculateSubaTotalAndTaxes($price, $quantity); 
                $Taxes = calculateSubaTotalAndTaxes($subTotal,TAXRATE);
                $grandTotal = addSumTotal($subTotal,$Taxes);

                # creating array for purchases and adding the infors
                $array_Purchase = array();
                $array_Purchase["prodCode"]= $prodCode ;
                $array_Purchase["firstName"]= $cusFname ;
                $array_Purchase["lastName"]=$cusLname;
                $array_Purchase["city"]=$cusCity;
                $array_Purchase["comment"]=$comments;
                $array_Purchase["price"]=$price;
                $array_Purchase["quantity"]=$quantity;
                $array_Purchase["subTotal"]=$subTotal;
                $array_Purchase["taxes"]= $Taxes;
                $array_Purchase["grandTotal"]= $grandTotal;

         
                #converting array into jeson file
                $myOrder = json_encode($array_Purchase);

                # creating text file using file handle
                file_put_contents(FILE_PURCHASE,$myOrder."\r\n", FILE_APPEND) or die("cannot open the file"); 
                
                echo "<h3>Thank  you for shopping with us, your order has been saved.</h3>";
                
                
                $prodCode = "";
                $cusFname ="";
                $cusLname ="";
                $cusCity ="";
                $comments ="";
                $price ="";
                $quantity ="";
            }
               // header("location:".FILE_BUYING_PAGE);
                
            
    }    
}

# functon to display ads
function displayAds(){
     global $picArray;           
   # $picArray = array(FILE_PIC1,FILE_PIC2,FILE_PIC3,FILE_PIC4);
        $num = rand(0,3);
     #shuffle($picArray);
                  // echo"<img src= '".$picArray[$num]. "'>";
     ?>
            <img class="<?php echo enlargeAds($num, FILE_PIC1 ) ?>" src= "<?php echo $picArray[$num]?> ">
      <?php      
      
}

# function to change big Ads
function enlargeAds($num,$pic){
    global $picArray;
    if ($picArray[$num] == $pic){
        
        return "ads";
    }else{
        return "ads2";
    }
        
}

#function to create table
function displayTable(){   
    global $array_Allpurchess;
    global $count;
   
    ?>
            <table class ="table">
                    <tr>
                        <th>Product ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>City</th>
                        <th>Comments</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>SubTotal</th>
                        <th>Taxes</th>
                        <th>Grand Total</th>

                    </tr>
                   <?php for($i = 0; $i<$count; $i++){?>
                   
                    <tr>
                        <td><?php echo $array_Allpurchess[$i]["prodCode"] ?></td>
                        <td><?php echo $array_Allpurchess[$i]["firstName"] ?></td>
                        <td><?php echo $array_Allpurchess[$i]["lastName"] ?></td>
                        <td><?php echo $array_Allpurchess[$i]["city"] ?></td>
                        <td><?php echo $array_Allpurchess[$i]["comment"] ?></td>
                        <td><?php echo $array_Allpurchess[$i]["price"]."$" ?></td>
                        <td><?php echo $array_Allpurchess[$i]["quantity"] ?></td>
                        
                        
                        <td class="<?php echo getColorFromUrl($array_Allpurchess[$i]["subTotal"]) ?>"><?php echo $array_Allpurchess[$i]["subTotal"]."$" ?></td>
                        <td><?php echo $array_Allpurchess[$i]["taxes"]."$"?></td>
                        <td><?php echo $array_Allpurchess[$i]["grandTotal"]."$" ?></td>
                       <?php ?>
                    </tr>
                   <?php } ?>
             
            </table>
            
    <?php
              
}

#function to multiply two number
function  calculateSubaTotalAndTaxes($num1, $num2){           
           return round(($num1 * $num2), 2);         
    }  
  
  #function to sum two numbers.
function  addSumTotal($num1, $num2){         
           return round(($num1 + $num2), 2);       
    } 
    
    
#function to read file
function readfileP(){
    global $array_Allpurchess;
    global  $count;
    $index=0;
        $array_Allpurchess = array();
        $jesonInforPurchase;
         
                
$fileHandle = fopen(FILE_PURCHASE, "r") or die("cannot open the file");
        
        ##$content = fread($fileHandle, filesize("jf.txt"));
        
        while (!feof($fileHandle)) 
        {
          $jesonInforPurchase = fgets($fileHandle);
          if($jesonInforPurchase!=""){
              
            $array_Allpurchess[$count] = json_decode($jesonInforPurchase, true);
          $count++; 
          }
        }
        
        fclose($fileHandle);
}
   





function diplayText($txt){
    ?>
    <marquee width="100%" direction="left" height="100px">
           <?php echo $txt; ?>
    </marquee><br><br>
    <?php
    
}

  #function to change color for subtotal
function subColorChange($num){
                if($num<100){
                   $subColor = "changeColor1";
                }elseif($num < 1000 && $num>100){
                    $subColor = "changeColor2";
                }else{
                    $subColor = "changeColor3";
                }
                return $subColor;
}

            


        if(isset($_GET["color"])){
                    $color = htmlspecialchars($_GET["color"]);

                    if ($color!="red"&& $color !=blue){

                                $color ="";

                                }
                   }
             if(isset($_GET["color"])){
             $color = htmlspecialchars($_GET["color"]);
             
             if ($color!="red"&& $color !=blue){
			 
			 $color ="";
			 
			 }
 
             }
                       
                   
                      
            
#function to get colour from url
 function getColorFromUrl($num){
     global $color;
      if(isset($_GET["command"])){
             $command = htmlspecialchars($_GET["command"]);              
             if ($command== $color)
                {			 
			echo subColorChange($num);			 
                }else
                {
                    $command="";
                }
                
    } 
 } 
 
 
 
 
#funtion to get command background color change 
 function getprintFromUrl(){
     global $print;
      if(isset($_GET["command"])){
             $command = htmlspecialchars($_GET["command"]);              
             if ($command== $print)
                {			 
			echo $print;			 
                }else
                {
                    $command="body";
                }
                
    } 
 }    
 
 #FOUNCTION LOG IN 
 function loginForm(){

          if(isset($_POST["logOut"])){
                    session_destroy();
                        header("Location:index.php");
                        die();

                    }       


         validateAndStartSession();

        if(!(isset($_SESSION["customerId"]) && isset($_SESSION["Name"] ))) {
             ?>
                 <form action="index.php" method="POST">

                             UserName:<input type="text" name="loginusername" value=""> <br>
                             Password:<input type="password" name="loginpword" value=""> <br>
                             <input type="submit" name="logIn" value="LogIn"><br>
                             Need a user account? <a href="<?php echo FILE_REGISTER_PAGE?> " >Register</a>                                              
                 </form>            
            <?php     
        }                   
 }

 
 #FUNCTION TO VALIDATE   A CUSTOMER  ANS START A SESSION
 
function validateAndStartSession(){
global $connection;
global $loginusername;
global $loginpword;
$pword = "";
$cusId= "";
$acustomer = new Customer();
     
    if(isset($_POST["logIn"]))
    {     
           $loginusername = htmlspecialchars($_POST["loginusername"]);          
           $loginpword = htmlspecialchars($_POST["loginpword"]);
           $SQLQuery = "CALL customersgetpassword(:loginusername)";
           $PDOStatement = $connection->prepare($SQLQuery);
           $PDOStatement -> bindParam(":loginusername", $loginusername);
           $PDOStatement->execute();         
           if($row =$PDOStatement->fetch())
           {
               $cusId = $row["customer_Id"];
               $pword =$row["customerPassword"];            
           }
           $PDOStatement->closeCursor();
            $PDOStatement= null;

           if (password_verify($loginpword, $pword))
           {    
              $acustomer->load($cusId);
              $_SESSION["customerId"] = $acustomer->getCustomer_Id(); 
              $_SESSION["Name"]= $acustomer->getCustomerFirstName()."  ".$acustomer->getCustomerLastName();
              header("Location:index.php");               
           } 
    }    
 }
 
 
 
 
 function session(){

     if(isset($_SESSION["customerId"]) && isset($_SESSION["Name"] )) {
            echo  "Welcome ".$_SESSION["Name"];
     ?>
      <form action="<?php echo FILE_HOME_PAGE?>" method="POST">
        <input type="submit" name="logOut" value="LogOut">
         </form>
    <?php
     }        
 }
 
 function accountForm(){
     
 $id =$_SESSION["customerId"];   
$customer = new Customer();
$customer->load($id);

$first = "";
$last = "";
$add ="";
$cit = "";
$provi = "";
$postal = "";
$user  = "";
$pass ="";

$first = $customer->getCustomerFirstName();
$last = $customer->getCustomerLastName();
$add =$customer->getCustomerAddress();
$cit = $customer->getCustomerCity();
$provi = $customer->getProvince();
$postal = $customer->getCustomerPostalCode();
$user  = $customer->getCustometUserName();
$pass =$customer->getCustomerPassword();
//echo var_dump($customer);
    
    
    
    
    ?>
            
            <form class = "accForm"   action="<?php echo FILE_ACCOUNT_PAGE ?>" method="POST">
                
                First name:  <input type ="text" name ="firstname" value="<?php echo $first?>"   /><br>
                Last  name:  <input type ="text" name ="lastname"  value="<?php echo $last?>"   /><br>
                Address:     <input type ="text" name ="address" value="<?php echo $add?>"  /><br>
                City:        <input type ="text" name ="city" value="<?php echo $cit?>"  ><br>
                Province:    <input type ="text" name ="province"  value="<?php echo $provi?>"  ><br>
                Postal Code: <input type ="text" name ="postalcode"  value="<?php echo $postal?>" > <br>
                Username:    <input type ="text" name ="username" value="<?php echo $user?>"  ><br>
                Password:    <input type ="password" name ="password" value="<?php echo $user?>" ><br>
                <input type ="submit" name ="update" value="UpdateInfor"  >
                  
            </form>  
    
              
    <?php
    
    
    
    
    if(isset($_POST["update"]))
    {
            $first = htmlspecialchars($_POST["firstname"]);
            $last =htmlspecialchars($_POST["lastname"]);
            $add = htmlspecialchars($_POST["address"]);
            $cit= htmlspecialchars($_POST["city"]);
            $provi = htmlspecialchars($_POST["province"]);
            $postal = htmlspecialchars($_POST["postalcode"]);
            $user= htmlspecialchars($_POST["username"]);
            $pass= htmlspecialchars($_POST["password"]);
            
           $validated = true;
                #first name validation
            if($first=="")
            {
                $errorfirst = "Please enter a firstname";
                $validated = false;
            }
             else if(mb_strlen($first)> NAME_MAX_LENGTH)
            {
                    $errorfirst = "The fisrtname  cannot contain more than".NAME_MAX_LENGTH." characters"; 
                    $validated = false;
            }
            
                #last name validation
            if($last=="")
            {
                $errorlast = "Please enter a last name";
                $validated = false;
            }
             else if(mb_strlen($last)> NAME_MAX_LENGTH)
            {
                    $errorlast = "The last name  cannot contain more than".NAME_MAX_LENGTH." characters"; 
                    $validated = false;
            }
            
               #address  validation
            if($add=="")
            {
                $erroradd = "Please enter a  address";
                $validated = false;
            }
             else if(mb_strlen($add)> ADDRESS_MAX_LENGTH)
            {
                    $erroradd = "The  address cannot contain more than".ADDRESS_MAX_LENGTH." characters"; 
                    $validated = false;
            }
            
            
            
             #city  validation
            if($cit=="")
            {
                $errorcit= "Please enter a  city";
                $validated = false;
            }
             else if(mb_strlen($cit)> CITY_MAX_LENGTH)
            {
                    $errorcit = "The  city cannot contain more than".CITY_MAX_LENGTH." characters"; 
                    $validated = false;
            }
            
               #province validation 
            if($provi=="")
            {
                $errorprovi = "Please enter the province";
                $validated = false;
            }
             else if(mb_strlen($provi)> PROVINCE_MAX_LENGTH)
            {
                    $errorprovi = "The  province cannot contain more than".PROVINCE_MAX_LENGTH." characters"; 
                    $validated = false;
            }
            
            
             #postal code  validation
            if($postal=="")
            {
                $errorpostal = "Please enter a  postal code";
                $validated = false;
            }
             else if(mb_strlen($postal)> POSTALCODE_MAX_LENGTH)
            {
                    $errorpostal = "The   postal code cannot contain more than".POSTALCODE_MAX_LENGTH." characters"; 
                    $validated = false;
            }
    
             #username  validation
            if($user=="")
            {
                $erroruser = "Please enter a  username";
                $validated = false;
            }
             else if(mb_strlen($user)> USERNAME_MAX_LENGTH)
            {
                    $erroruser = "The user name cannot contain more than".USERNAME_MAX_LENGTH." characters"; 
                    $validated = false;
            }
            
             #password   validation
            if($pass=="")
            {
                $errorpass= "Please enter a  password";
                $validated = false;
            }
             else if(mb_strlen($pass)> PASSWORD_MAX_LENGTH)
            {
                    $errorpass = "The   password cannot contain more than".PASSWORD_MAX_LENGTH." characters"; 
                    $validated = false;
            }
            
            
            
                
                 #saving valided  customer  information
            if($validated == true){
               

                #set the customer infor in the objects .
                $customer->setCustomerFirstName($first);
                $customer->setCustomerLastName($last);
                $customer->setCustomerAddress($add);
                $customer->setCustomerCity($cit);
                $customer->setCustomerProvince($provi);
                $customer->setCustomerPostalCode($postal);
                $customer->setCustomerUserName($user);
                $customer->setCustomerPassword( password_hash($pass, PASSWORD_DEFAULT));
            
                # save customer infor
               $customer->update();
                    $first = "";
                    $last = "";
                    $add ="";
                    $cit = "";
                    $provi = "";
                    $postal = "";
                    $user  = "";
                    $pass ="";
                
                echo "<h3>Thank  you , customer infor updated .</h3>";
            }
    }
               
}

## function for buy page
function buyProduct(){
    

    $products = new Products(); 
        ?>
            <form action="<?php echo FILE_BUY_PAGE ?>" method="post"> 
                Product Code:
                <?php
                //var_dump($products->allObjects);
                echo "<select name ='productid'>";
                foreach ($products->allObjects as $product) {
                
                    echo "<option value = '". $product->getProduct_Id()."'>"
                            .$product->getProductCode()."-"
                            .$product->getProductDescription()."("
                            . $product->getProductPrice().")"
                            ."</option>";
                }
                echo "</select><br>";
                
                ?>
                Comments:<input type="text" name="comment" value=""/><br>
                Quantity:<input type="text" name="quantity" value=""/><br>
                <input type="submit" name="buy" value="Buy"/>
            </form>  
         <?php   
}


function buySavePurchse()
{
    
    
     if(isset($_POST["buy"]))
    {
         
            $prodid = htmlspecialchars($_POST["productid"]);
            $comment = htmlspecialchars($_POST["comment"]);
            $quantity = htmlspecialchars($_POST["quantity"]);
            
//           if(mb_strlen($comment)> COMMENTS_MAX_LENGTH)
//           {
//                    $errorComment= "The comments  cannot contain more than".COMMENTS_MAX_LENGTH." characters";
//                    
//            }
            
            
            
            
            $product = new Product();
            $purchase = new Purchase();
     
            $product->load($prodid);
            
 
            $purchase->setCustomer_Id($_SESSION["customerId"]);
            $purchase->setProduct_Id($product->getProduct_Id());
            $purchase->setPurchaseQuantitySold($quantity);
            $purchase->setPurchaseProdPrice($product->getProductPrice());
            $purchase->setPurchaseComments($comment);
            
            $subTotal = calculateSubaTotalAndTaxes($product->getProductPrice(), $quantity);
            $tax = calculateSubaTotalAndTaxes($subTotal,.0152);
            $grand = addSumTotal($subTotal, $tax);
            
            $purchase->setPurchaseSubTotal($subTotal);
            $purchase->setPurchaseTaxes($tax);
            $purchase->setPurchaseGrandTotal($grand);

            $purchase->save();
            
            echo " thanks for shoping with us ";
    }
}



function purchaseFormSearch(){
    
    
    
     ?>
      <form action="<?php echo FILE_PURCHASES_PAGE?>" method="POST">
          
          show purchases made on this date or later: <input type="text" name="date"/>
          
         <input type="submit" name="search" value="Search">
         </form>
    <?php
    
    
    
}


function searchforCustomerPurchase(){
    
      # declaring a customer to register
   // $customer = new Customer();
  
 if(isset($_POST["search"]))
    {
      echo "start here";
            $date = htmlspecialchars($_POST["date"]);
            

    ?>
            <table class ="table">
                    <tr>
                        <th>Delete</th>
                        <th>Product Code</th>
                        <th>First Name </th>
                        <th>Last Name</th>
                        <th>city</th>
                        <th>comments</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>subtotal</th>
                        <th>Taxes</th>
                        <th>Grand Total</th>
                    </tr>
                   <?php  
                   global $connection;
        $SQLQuery = "CALL purchaseoObjects(:date)";
        $PDOStatement = $connection->prepare($SQLQuery);
        $PDOStatement -> bindParam(':date',$date);
        $PDOStatement->execute();
        while($row =$PDOStatement->fetch())
        {
   ?>
                   
                    <tr>
                        <td><?php
                        
                        ?>
      <form action="<?php echo FILE_PURCHASES_PAGE?>" method="POST">
          
          <input type="submit" name="date" value="Delete"/>
         </form>
    <?php
    
                        
                        
                        ?></td>
                        <td><?php echo $row["productCode"] ?></td>
                        <td><?php echo $row["customerFirstName"] ?></td>
                        <td><?php echo $row["customerLastName"] ?></td>
                        <td><?php echo $row["customerCity"] ?></td>
                        <td><?php echo $row["purchaseComments"] ?></td>
                        <td><?php echo $row["purchaseProdPrice"] ?></td>
                        <td><?php echo $row["purchaseQuantitySold"] ?></td>
                        <td><?php echo $row["purchaseSubtotal"] ?></td>
                        <td><?php echo $row["purchaseTaxes"] ?></td>
                        <td><?php echo $row["purchaseGrandTotal"] ?></td>
                       
                       <?php ?>
                    </tr>
                   <?php } ?>
             
            </table>
            
    <?php
      $PDOStatement->closeCursor();
      $PDOStatement= null;      
    }
}