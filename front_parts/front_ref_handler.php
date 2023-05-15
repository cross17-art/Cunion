<script>
    console.log("Ref Handler connected");
</script>
<script src="../front_js/cookie_handler.js"></script>
<script src="../front_js/ref_handler.js"></script>


<?php
if(isset($_GET['ref'])){
    $refUserId = $_GET['ref']
    ?>

    <script>
        ref_handler.SetRefCookieUserId(<?= $refUserId ?>)
    </script>

<?php
}
?>

