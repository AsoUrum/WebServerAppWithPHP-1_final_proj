<?php

#Revision History

# Developer                       Date                 comments
#Urum bone aso(1831133)           Feb. 20, 2021          Created buying page
#Urum bone aso(1831133)           Feb. 21, 2021          mmodified footer function and created

#Urum bone aso(1831133)           Feb. 26,2021        update my review his  to match what is request by the teacher*/



define("FOLDER_FUNCTIONS","php/");
define("FILES_CONSTANTS",FOLDER_FUNCTIONS."php-constants.php");


require_once (FILES_CONSTANTS);
require_once (FILES_PHP_FUNCTIONS);

 
//createSendHeader();
createPageHeader("Buying");
//createLog();
creatNav();
recievePostValidation();
createForm();
 

createPageFooter();
