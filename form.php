<?php 
	if(!empty($_POST['name'])){
		$service_url = 'http://localhost/talos360.co/index.php';
       	$curl = curl_init($service_url);
   	    $curl_post_data = array(
   	         "name" => $_POST['name']
   	         );
   	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   	    curl_setopt($curl, CURLOPT_POST, true);
   	    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($curl_post_data));
   	    $curl_response = curl_exec($curl);
   	    curl_close($curl);
 	
   	    echo $curl_response;
	}
?>
<html>
	<body>
		<form name="test" action="form.php" method="post">
			Introduce your name: <input name="name">
			<input type="submit" name="sendme"  value="Send me">
		</form>
	</body>
</html>