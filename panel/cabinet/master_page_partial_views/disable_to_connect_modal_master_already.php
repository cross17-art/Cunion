<?php
/**
 * @var $masterEmail
 * @var $connection []
 *
 */
?>


<div class="modal fade" id="subscribe_modal_<?= $masterId ?>" tabindex="-1"
     style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Subscribe to Trader</h5>
                <button type="button" class="btn-close"
                        data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body m-3">
                <div class="mb-3">
                    <button class="btn btn-outline-info" onclick="SetScaleBlockLang('rus')">Rus</button>
                    <button class="btn btn-outline-info" onclick="SetScaleBlockLang('eng')">Eng</button>
                </div>

                <p scale-info lng="eng" class="mb-0">
                    <strong>Note</strong> You can not connect to anyone while you are already the trader;
                </p>
                <p scale-info style="display: none" lng="rus" class="mb-0">
                    <strong>Примечание</strong> Вы не можете подключится к кому-либо в тот момент когда вы уже трейдер.
                </p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>