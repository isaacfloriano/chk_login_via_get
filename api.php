<?php
extract($_GET);
error_reporting(0);

$login = $_GET['lista'];

if ($login == ""){
    echo "O login não pode ser nulo";
    return;
}

$url = "https://autodiscover.clarobrasil.com.br/autodiscover/autodiscover.xml";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER,
array(
    'Sec-Fetch-Dest: document',
    'Sec-Fetch-Mode: navigate',
    'Sec-Fetch-Site: cross-site',
    'Sec-Fetch-User: ?1',
    'Upgrade-Insecure-Requests: 1',
    'User-Agent: Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Mobile Safari/537.36',
));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERPWD, $login);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

$retorno = curl_exec($ch);

//pegar o status code
$httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_reset($ch);
curl_close($ch);
