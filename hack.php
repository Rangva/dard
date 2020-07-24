<?php

function fetch_value($str,$find_start,$find_end) {
	$start = @strpos($str,$find_start);
	if ($start === false) {
		return "";
	}
	$length = strlen($find_start);
	$end = strpos(substr($str,$start +$length),$find_end);
	return trim(substr($str,$start +$length,$end));
}

echo "\n";
echo "# Masukan Username : ";
$username = trim(fgets(STDIN));
echo "# Masukan Password : ";
$password = trim(fgets(STDIN));

$ua = array(
'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
'User-Agent: Dalvik/2.1.0 (Linux; U; Android 7.0; SM-G610F Build/NRD90M)',
'Host: umairspin.spinforcash.app',
'Connection: Keep-Alive',
'Accept-Encoding: gzip');

$login = "https://umairspin.spinforcash.app/api.php";

$data = "username=".$username."&access_key=6808"."&password=".$password."&user_login=1"."&";

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $login);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $ua);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_COOKIEJAR, "cookie.txt");
curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");

$result = curl_exec($ch);
$user = fetch_value($result,'"username":"','"');
$poin = fetch_value($result,'"points":"','"');
echo "\nLogin Sukses. . .\n";
sleep(1);
echo "# Username Saya : ".$user;
echo "\n";
echo "# Poin Saya : ".$poin;
echo "\n";
sleep(7);


// MENDAOATKAN POIN

echo "\n Sedang Melakukan Spin !\n\n";
sleep(1);
while(true){
$login1 = "https://umairspin.spinforcash.app/api.php";

$data1 = "username=".$username."&access_key=6808&type=Spin+wheel&add_spin=1&points=16&";

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $login1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $ua);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data1);
curl_setopt($ch, CURLOPT_COOKIEJAR, "cookie.txt");
curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");

$result = curl_exec($ch);
$respon = fetch_value($result,'"message":"','"');
echo "\r# ".$respon." | ";

// MELIHAT HASIL BALANCE

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $login);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $ua);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_COOKIEJAR, "cookie.txt");
curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");

$result = curl_exec($ch);
$user = fetch_value($result,'"username":"','"');
$poin = fetch_value($result,'"points":"','"');
echo "Total Balance Poin Saya : ".$poin;
sleep(3);

echo "\nMenunggu 5 detik";
sleep(5);
}

