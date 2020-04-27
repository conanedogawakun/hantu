<?php

/////////////////////////////////
/////////CONAN EDOGAWA//////////
///////////////////////////////

include 'tri_req.php';

$tri = new tri();
$imei = "868880043302499";
echo "Monggo Masukkan No Telp Bosque : ";
$msisdn = trim(fgets(STDIN));
$otp = $tri->request_otp($msisdn,$imei);
echo $otp[1] . "\r\n";
echo "Monggo Masukkan Kode OTP Bosque : ";
$otp = trim(fgets(STDIN));
$login = $tri->login($msisdn,$otp);
$login = json_decode($login,true);
$bearer = $login['access_token'];
$id = $tri->trans($bearer);
$id = json_decode($id,true);
$id = $id['data'][0]['rewardTransactionId'];
for($id1 = 1500; $id1 < 1600;$id1++)
{
  $panjul = $tri->claim($bearer,$id,$id1);
  echo $panjul . "\r\n";
  sleep(2);
}


?>
