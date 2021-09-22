<?php
# Developer                       Date                 comments
#Urum bone aso(1831133)           Feb. 20, 2021          Created order page
#Urum bone aso(1831133)           Feb. 26,2021            update my review his  to match what is request by the teacher*/
#Urum bone aso(1831133)           mar 09,2021           added the create table function
#Urum bone aso(1831133)           mar 10,2021           modify the position of readfile
#URUM BONE ASO(1831133)           march 11/12/13,2021      did all the final miss parts of the project
define("FOLDER_FUNCTIONS","php/");
define("FILES_CONSTANTS",FOLDER_FUNCTIONS."php-constants.php");


require_once (FILES_CONSTANTS);
require_once (FILES_PHP_FUNCTIONS);



//createSendHeader(); 
createPageHeader("Order");
//createLog();
creatNav();
readfileP();
displayTable();


createPageFooter();

