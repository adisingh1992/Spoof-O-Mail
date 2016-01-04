<?php
	$from = validate($_POST["from"]);
	$to = validate($_POST["to"]);
	$subject = validate($_POST["subject"]);
	$msg = validate($_POST["msg"]);

	if (empty($from) || empty($to) || empty($subject))
		message(1);
	else
		send_mail($from, $to, $subject, $msg);

function validate($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

function message($num){
	if ($num == 1 ){
		echo "<script>alert('Enter The Required Attributes');</script>";
		echo "<script>location.href='index.html'</script>";
	}
	else if($num == 2){
		echo "<script>alert('Your Mail Is Sent Successfully');</script>";
		echo "<script>location.href='index.html'</script>";
	}
	return;
}

function send_mail($from, $to, $subject, $msg){
	$headers = "FROM: $from";
	mail($to, $subject, $msg, $headers);
	return message(2);
}
?>