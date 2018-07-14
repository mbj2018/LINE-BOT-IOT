<?php
//include 'headbot.php';
// Function Return message

function t1($tt1)
{
	$messages = [
		'type' => 'text',
		'text' => $tt1
		];
	return $messages;
}
$Accesstoken =$_GET["accesstoken"];
$Gid =$_GET["gid"];
$StrGet = $_GET["strget"];
//$StrGet = 'TEST';
//$messagesToken = t1($A_Token);
//$text = $StrGet;
//$PyGroupid =$_GET["Group_ID"];
//$text = "Test";
	 
//if (!is_null($text))
if (!is_null($StrGet)) {
//if (!empty($_POST)){
	//$text = "ได้รับ Mail จาก :".$return_path."\nหัวข้อ :".$subject."\nเนื่อหา".$plain;
	//$messages = t1($text);
	$messages = t1($StrGet);
	$url = 'https://api.line.me/v2/bot/message/push';
	$data = [
  		
		'to' => $Gid,
		'messages' => [$messages]
		];
	$post = json_encode($data);
	$headers = array('Content-Type: application/json', 'Authorization: Bearer ' .$Accesstoken);//$access_token
			
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post);//$post
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	$result = curl_exec($ch);
	curl_close($ch);
	echo $result . "\r\n";	
	echo $StrGet;

}
?>
