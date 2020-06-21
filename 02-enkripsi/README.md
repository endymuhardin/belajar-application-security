# Perintah untuk Encryption/Decryption #

1. Enkripsi file kecil halo.txt dengan public key

        openssl rsautl -encrypt -in halo.txt -pubin -inkey public.pem | openssl base64 > halo-enc.txt

2. Dekripsi dengan private key

        cat halo-enc.txt | openssl base64 -d | openssl rsautl -decrypt -inkey private.pem -out halo-dec.txt 

3. Enkripsi file dengan AES

        gpg --symmetric --cipher-algo AES256 --output halo.enc.txt halo.txt

4. Dekripsi file dengan AES

        gpg --output halo.dec.txt -d halo.enc.txt