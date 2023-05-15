<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/panel/cabinet/classes/ConnectionButton.php";

/**
 * @var User $user ;
 * @var $masterId
 * @var $masterEmail ;
 */


?>

<?php

$connectionButton = new ConnectionButton($user, $masterId, $masterEmail);
//var_dump($connectionButton->connectionType);
if ($user->ApiKeysAreConnected()) {
    if (!$user->IsConnectedToMaster('kucoin', $masterId)) {

        $buttonConnectionClass = ($user->IsConnectedToOneOfTheMaster('kucoin') || $user->IsKucoinMaster()) ? "btn-outline-secondary" : "btn-primary";

        ?>

        <?php if($masterId != $user->id){ ?>
        <button type="button" class="btn connect-to-master-button <?= $buttonConnectionClass ?> " data-bs-toggle="modal" ya-goal='goal-valid-connect-button'
                data-bs-target="#subscribe_modal_<?= $masterId ?>">
            Connect
        </button>

        <?php } ?>

    <?php
    } else {
        ?>
        <button type="button" class="btn btn-outline-danger connect-to-master-button"
                data-bs-toggle="modal"
                data-bs-target="#unsubsribe_modal_<?= $masterId ?>">
            Disconnect
        </button>
        <?php
    }
} else { ?>
    <button type="button" class="btn btn-warning  connect-to-master-button" data-bs-toggle="modal" ya-goal="goal-warning-connect-button"
            data-bs-target="#need_connect">
        Connect
    </button>
<?php }
?>