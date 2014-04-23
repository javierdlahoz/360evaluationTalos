<?php
 
 	function getRequest() {
 		$body = file_get_contents("php://input");
        $body_params = json_decode($body);
        return $body_params;
    }
