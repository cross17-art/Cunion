<?php
// CUSTOM.PHP - Custom PHP block for personal customizations, activate it from WordPress menu > Apparence > Theme options

if (strpos($_SERVER["REQUEST_URI"],"/support") > 0) {
    delete_option("sb-conversation-93769959");
}
?>
