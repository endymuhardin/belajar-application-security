# Perintah untuk Encryption/Decryption #

1. Enkripsi file kecil halo.txt dengan public key
   ```shell
   $ openssl rsautl -encrypt -in halo.txt -pubin -inkey public.pem | openssl base64 > halo-enc.txt
   ```
   The command rsautl was deprecated in version 3.0. Use 'pkeyutl' instead.   

   ```shell
   $ openssl pkeyutl -encrypt -in halo.txt -pubin -inkey public.pem | openssl base64 > halo-enc.txt
   ```

2. Dekripsi dengan private key
   ```shell
   $ cat halo-enc.txt | openssl base64 -d | openssl rsautl -decrypt -inkey private.pem -out halo-dec.txt
   ```
   The command rsautl was deprecated in version 3.0. Use 'pkeyutl' instead.
   
   ```shell
   $ cat halo-enc.txt | openssl base64 -d | openssl pkeyutl -decrypt -inkey private.pem -out halo-dec.txt
   ```

3. Enkripsi file dengan AES
   ```shell
   gpg --symmetric --cipher-algo AES256 --output halo.enc.txt halo.txt
   ``

4. Dekripsi file dengan AES
   ```shell
   gpg --output halo.dec.txt -d halo.enc.txt
   ```