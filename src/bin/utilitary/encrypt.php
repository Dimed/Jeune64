<?php



// Fonction d'encryptage pour utilisé la méthode get sans danger

function encrypt($data) {

    $key = "54GD654GDfqdsDD5qf/*1ZA*/*4/dh@Fç'ffjiso";
    $plaintext = $data;
    $ivlen = openssl_cipher_iv_length($cipher = "AES-128-CBC");
    $iv = openssl_random_pseudo_bytes($ivlen);
    $ciphertext_raw = openssl_encrypt($plaintext, $cipher, $key, $options = OPENSSL_RAW_DATA, $iv);
    $hmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary = true);
    $ciphertext = base64_encode($iv . $hmac . $ciphertext_raw);

    return $ciphertext;
}

?>