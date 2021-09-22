<?php

#Revision History

# Developer                       Date                 comments
#Urum bone aso(1831133)           May 05, 2021        created page registrer
define("FOLDER_FUNCTIONS","php/");
define("FILES_CONSTANTS",FOLDER_FUNCTIONS."php-constants.php");
require_once FILES_CONSTANTS;
require_once FILES_PHP_FUNCTIONS;

if(isset($_SESSION["customerId"]) && isset($_SESSION["Name"] )) {
//createSendHeader();
createPageHeader("Buy");

//createLog();
creatNav();

buySavePurchse();
buyProduct();
createPageFooter();
}else{
    
    
    echo" You have to log in before you view this page ";
}
