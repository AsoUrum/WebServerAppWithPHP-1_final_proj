<?php

#Revision History

# Developer                       Date                 comments
#Urum bone aso(1831133)           May 01, 2021        created purchases
define("FOLDER_FUNCTIONS","php/");
define("FILES_CONSTANTS",FOLDER_FUNCTIONS."php-constants.php");
require_once FILES_CONSTANTS;
require_once FILES_PHP_FUNCTIONS;



 if(isset($_SESSION["customerId"]) && isset($_SESSION["Name"] )) {   
//createSendHeader();
createPageHeader("Purchases");
//createLog();
creatNav();
searchforCustomerPurchase();
purchaseFormSearch();
createPageFooter();
 }else{  
    echo" You have to log in before you view this page ";   
 }