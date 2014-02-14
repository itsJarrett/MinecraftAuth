<?php
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"https://authserver.mojang.com/authenticate");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"agent":{"name":"Minecraft","version":1},"clientToken":"'.$_POST['clientToken'].'","username":"'.$_POST['username'].'", "password": "'.$_POST['password'].'"}');
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec ($ch);
curl_close ($ch);

$data = json_decode($server_output, true);

if ($_POST['debug'] == true) 
    echo "<pre><strong>(DEBUG) </strong>".$server_output."</pre>";
    
if ($data['accessToken'] != null)    {
    echo '<div class="alert alert-success fade in"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!';
    echo '<br>Username:</strong> '.$data['username'].'';
    echo '<br>Access Token:</strong> '.$data['accessToken'].'';
    echo '<br><strong>User Token:</strong> '.$data['selectedProfile']['id'].'';
    echo '<br><strong>Client Token:</strong> '.$data['clientToken'].'</div>';
} else {
    echo '<div class="alert alert-error fade in"> <strong>Error getting access token!</strong><button type="button" class="close" data-dismiss="alert">&times;</button>';
    echo '<br><strong>Exception Type: </strong>' . $data['error'];
    echo '<br><strong>ErrorMessage: </strong>' . $data['errorMessage'];
    echo '</div>';
} 
?>
