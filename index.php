<?php
#Revision History

# Developer                       Date                 comments
#Urum bone aso(1831133)           Feb. 20, 2021        modify home page page 
#Urum bone aso(1831133)           Feb. 26,2021         update my review his  to match what is request by the teacher*/
#URUM BONE ASO(1831133)           march 11/12/13,2021      did all the final miss parts of the project
define("FOLDER_FUNCTIONS","php/");
define("FILES_CONSTANTS",FOLDER_FUNCTIONS."php-constants.php");


require_once FILES_CONSTANTS;
require_once FILES_PHP_FUNCTIONS;
require_once FILE_OBJECT_CUSTOMERS;
require_once FILE_OBJECT_CUSTOMER;







//createSendHeader();
createPageHeader("Home");






//createLog();
creatNav();
// login function
loginForm();


diplayText($text);



displayAds();

createPageFooter();



















?>
    
