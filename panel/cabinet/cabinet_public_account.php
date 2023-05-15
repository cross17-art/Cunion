<?php

session_start();

?>
<script>
    ym(87462220, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
    });
    ym(87462220,'reachGoal','demo_account');
</script>

<?php
$_SESSION['logged'] = true;
$_SESSION['user_email'] = 'wydebinance@gmail.com';

$href = '';
if($_GET['r'] == 'jerry'){
    ?>
        <script>
            let href = "https://cunion.io/panel/cabinet/cabinet_master_page?master-id=231";
            location.href = href;
        </script>
<?php
}
if($_GET['r'] == 'boris'){
    ?>
    <script>
        let href = "https://cunion.io/panel/cabinet/cabinet_master_page?master-id=181";
        location.href = href;
    </script>
<?php
}
if($_GET['r'] == 'main'){
    ?>
    <script>
        let href = "https://cunion.io/panel/cabinet/cabinet";
        location.href = href;
    </script>
<?php
}
?>
