<?php

#Revision History
# Developer                                    Date                          comments
#Urum bone aso(1831133)           April. 29, 2021          created my connection file here

#connection to connect into my database.

$connection = new PDO("mysql:host=localhost;dbname=database-1831133","root","aso");
$connection ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

