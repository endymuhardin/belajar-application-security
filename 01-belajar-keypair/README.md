# Berbagai Perintah OpenSSH dan OpenSSL #

1. Generate private key dan public key dengan OpenSSH

        ssh-keygen -f namafile-tujuan

2. Generate private key dengan OpenSSL

        openssl genrsa -out private.pem

3. Generate public key dengan OpenSSL

        openssl rsa -in private.pem -pubout > public.pem

4. Konversi private key OpenSSH menjadi format PEM

        ssh-keygen -p -m PEM -f namafile-privatekey

5. Sign file halo.txt dengan private key

        openssl dgst -sha1 -sign private.pem -out halo.sign halo.txt

6. Verifikasi signature dengan public key

        openssl dgst -sha1 -verify public.pem -signature halo.sign halo.txt

7. Membuat self-signed certificate dengan OpenSSL

        openssl req -key private.pem -new -x509 -days 365 -out public.crt

8. Melihat isi digital certificate

        openssl x509 -in public.crt -text -nooout

9. Simpan private key dan certificate dalam file PKCS12

        openssl pkcs12 -inkey private.pem -in public.crt -export -out keypair.p12

10. Konversi PKCS12 menjadi PEM

        openssl pkcs12 -in keypair.p12 -nodes -out keypair.pem
