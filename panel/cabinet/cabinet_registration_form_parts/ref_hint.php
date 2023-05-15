<?php
if(isset($_COOKIE['ref_user_id'])) {
    $refUserId = $_COOKIE['ref_user_id'];
    echo('<p><span class="badge badge-soft-info">You use referral registration</span></p>');
    echo('<p><span class="badge badge-soft-info">Referal User Id:'. $refUserId .'</span></p>');
}
?>
