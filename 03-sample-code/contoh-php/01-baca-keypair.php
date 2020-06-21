<?php

// 1. Baca keypair di dalam file PKCS12
if (!$cert_store = file_get_contents("../../01-belajar-keypair/openssl/belajar.p12")) {
    echo "Error: Unable to read the cert file\n";
    exit;
}

// 2. Tampilkan private key dan public key
if (openssl_pkcs12_read($cert_store, $cert_info, "")) {
    echo "Certificate Information\n";
    //print_r($cert_info);

    // 2.a. Tampilkan private key
    echo("Private key : ");
    echo($cert_info['pkey']);

    // 2.b. Tampilkan certificate
    echo("Certificate : ");
    echo($cert_info['cert']);

} else {
    echo "Error: Unable to read the cert store.\n";
    exit;
}