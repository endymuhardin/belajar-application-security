<?php

include('01-baca-keypair.php');

echo("\n===============================\n");

// 1. Encrypt dengan public key
$plaintext = "halo php";
openssl_public_encrypt($plaintext, $hasil_encrypt, $cert_info['cert']);
echo("Hasil encrypt : \n");
echo($hasil_encrypt);

// 2. Decrypt dengan private key
openssl_private_decrypt( $hasil_encrypt, $hasil_decrypt, $cert_info['pkey']);
echo("\n Hasil Decrypt : \n");
echo($hasil_decrypt);

// 3. Symmetric encryption dengan GPG
putenv('GNUPGHOME=/Users/endymuhardin/.gnupg');
error_reporting(E_ALL);
$res = gnupg_init();
gnupg_seterrormode($res,GNUPG_ERROR_WARNING);
$info = gnupg_keyinfo($res, 'your-key-id');
echo "Key - Info<pre>";
var_dump($info);
gnupg_addencryptkey($res,"8660281B6051D071D94B5B230549F9DC851566DC");
$enc = gnupg_encrypt($res, $plaintext);
echo("Hasil symmetric encryption : \n");
echo($enc);