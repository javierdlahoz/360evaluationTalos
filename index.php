<?php

$json_test = array(
    			 	array("name" => "Javier De la Hoz",
    			 		"author" => "talos digital"
    			 		),
    			 	array(1 => "first question title",
    			 		  2 => "second question title",
						  3 => "third question title"
    			 		),
    			 	array(
    			 		1 => "fist answer",
						2 => "second answer",
						3 => "third answer"		
    			 		)
    	);

include_once("lib/rest.php");
include_once("lib/email.php");
include_once("lib/utilities.php");

$email = new Email();
$data = getRequest($body); //DATA FROM ANGULAR

//TESTING JSON FILE
$json = json_encode($json_test);
$json = json_decode($json);

arrayToCsv($json);
$email->sendEmail(getName($json), getAuthor($json));