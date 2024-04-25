<?php  
require_once("PayPal-PHP-SDK/PayPal-PHP-SDK/autoload.php");

// After Step 1
$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'AW3UUpHeJxb-XW_Q6Lrv-XkiPGKvUyPrv0Glncqub5WrqWi_VY4dt2bapXe28KEj_knlHbUANT-BE2CL',     // ClientID
        'EFrDnqEiMVp5Y8t2XmnehGhdhw_4H1sUb2ONmaSL-fYLrQS3rxmyrSF_hpqEoWz_Gu5ZPlyDHPMBm-4k'      // ClientSecret
    )
);

?>