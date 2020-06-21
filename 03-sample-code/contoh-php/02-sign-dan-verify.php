<?php

include('01-baca-keypair.php');

echo("\n===============================\n");

// 1. Melakukan sign message dengan private key

$message = "halo php";
openssl_sign($message, $signature, $cert_info['pkey']);

// 2. Tampilkan hasil signature
echo("Signature : \n");
echo($signature);

// 3. Verifikasi signature dengan public key
$sukses = openssl_verify($message, $signature, $cert_info['cert']);
if($sukses) {
    echo("Verifikasi berhasil, signature dan public key match");
} else {
    echo("Verifikasi gagal, signature dan public key tidak sesuai");
}