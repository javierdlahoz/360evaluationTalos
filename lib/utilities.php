<?php	

	function arrayToCsv($json){
		$filename = "files/360evaluation.csv";
		$array = $json;
		$fp = fopen($filename, 'w');
		$j=0;
        foreach($array as $rows){
        	if($j!=0)
	        {
	        	$answer = array();
	        	$i=1;
	        	foreach ($rows as $row) {
						array_push($answer, $row);
						$i++;
	        		}
	        	print_r($answer);
	        	fputcsv($fp, $answer);
	        }
	        $j++;				
		}
	    fclose($fp);
	}

	function getName($json_array){
		foreach ($json_array as $array_name) {
				$result = $array_name->{'name'};
				break;
		}
		return $result;
	}

	function getAuthor($json_array){
		foreach ($json_array as $array_name) {
				$result = $array_name->{'author'};
				break;
		}
		return $result;
	}

	/*json style
	json = [
	{
		"name" => "name of the evaluated person",
		"author" => "name of who evaluated"
	}
	{
		1 => "fist question title",
		2 => "second question title",
		3 => "third question title"
	},
	{
		1 => "fist answer",
		2 => "second answer",
		3 => "third answer"		
	}
	]
	*/