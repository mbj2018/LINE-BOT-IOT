 <?php
  

function send_LINE($msg){
 $access_token = '0OjQ11iH1RdLOgXPV85kzpoLT7mZEtuGT9akE2FLVhZnde1w/+lT+rKQNIp4fJOXdqp4cEIXaZvzQ4hxZ/YsVtY4mwuw0cEUmPlHJztYywSc/rEDPHLm80pV4VXvoQtWDpzPPjSqioQ9fs0X1DeYDAdB04t89/1O/w1cDnyilFU='; 

  $messages = [
        'type' => 'text',
        'text' => $msg
        //'text' => $text
      ];

      // Make a POST Request to Messaging API to reply to sender
      $url = 'https://api.line.me/v2/bot/message/push';
      $data = [

        //'to' => 'Uf19a507ea61d612b5600b55ff34ac3f5',// user
        'to' => 'Cbba671d3c1043d9d231a951b25edc69b', //group
        'messages' => [$messages],
      ];
      $post = json_encode($data);
      $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      $result = curl_exec($ch);
      curl_close($ch);

      echo $result . "\r\n"; 
}

?>
