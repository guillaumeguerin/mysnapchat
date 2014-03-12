<?php
function rsadecrypt($input)
{
 //Load private key:
$private = file_get_contents('rsa/privatekey.pem');

if (!$privateKey = openssl_pkey_get_private($private)) die('Loading Private Key failed');

//Decrypt
$decrypted_text = "";
if (!openssl_private_decrypt($input, $decrypted_text, $privateKey)) die('Failed to decrypt data');


//Free key
openssl_free_key($privateKey);

	return $decrypted_text;
}
?>