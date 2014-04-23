<?php

class Email{

	protected $from = "javier.delahoz@talosdigital.com";
	protected $to = "javier.delahoz@talosdigital.com";
	protected $subject = "360 evaluation of ";
	protected $message = "You can see the 360 evaluation results in the attached file";
	protected $filename = "360evaluation.csv";
	protected $path = "files/";

	function sendEmail($name, $author){
		$uid = md5(uniqid(time()));

		$file = $this->path.$this->filename;
		$file_size = filesize($file);
	    $handle = fopen($file, "r");
	    $content = fread($handle, $file_size);
	    fclose($handle);
	    $attachment = chunk_split(base64_encode($content));

		//$attachment = chunk_split(base64_encode(file_get_contents('otteDB.sql'))); 
		$header = "From: ".$this->from." <".$this->from.">\r\n";
	    $header .= "Reply-To: ".$this->from."\r\n";
	    $header .= "MIME-Version: 1.0\r\n";
	    $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
	    $header .= "This is a multi-part message in MIME format.\r\n";
	    $header .= "--".$uid."\r\n";
	    $header .= "Content-type:text/plain; charset=iso-8859-1\r\n";
	    $header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
	    $header .= $this->message."\r\n\r\n";
	    $header .= "--".$uid."\r\n";
	    $header .= "Content-Type: application/octet-stream; name=\"".$this->filename."\"\r\n"; // use different content types here
	    $header .= "Content-Transfer-Encoding: base64\r\n";
	    $header .= "Content-Disposition: attachment; filename=\"".$name."-".$author."-".$this->filename."\"\r\n\r\n";
	    $header .= $attachment."\r\n\r\n";
	    $header .= "--".$uid."--";
		
	    $this->subject = $this->subject.$name;
	    mail($this->to,$this->subject, $this->message, $header);
	}

}