<?php



// Fonction de décryptage pour utilisé la méthode get sans danger

function decrypt($data){

    $key = "54GD654GDfqdsDD5qf/*1ZA*/*4/dh@Fç'ffjiso";
    $c = base64_decode($data);
    $ivlen = openssl_cipher_iv_length($cipher = "AES-128-CBC");
    $iv = substr($c, 0, $ivlen);
    $hmac = substr($c, $ivlen, $sha2len = 32);
    $ciphertext_raw = substr($c, $ivlen + $sha2len);
    $original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key, $options = OPENSSL_RAW_DATA, $iv);
    $calcmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary = true);

    if (hash_equals($hmac, $calcmac))
    {
        return $original_plaintext;
    }
}

?>