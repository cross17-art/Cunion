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

            <div subscription_info_window class="modal-body m-3">
                <div class="mb-3">
                    <!--        <button class="btn btn-outline-info" onclick="SetScaleBlockLang('rus')">Rus</button>-->
                    <button class="btn btn-outline-info" onclick="SetScaleBlockLang('eng')">Eng</button>
                </div>

                <p scale-info lng="eng" class="mb-0">
                    <strong>Note</strong>: Cunion.io recommends using a free (new) account on a cryptocurrency exchange
                    exclusively with a working deposit for copy trading on our platform in order to avoid errors when
                    copying trade transactions
                </p>

                <p scale-info style="display: none" lng="rus" class="mb-0">
                    <strong>Примечание</strong>: Cunion.io рекомендует использовать для копитрейдинга на нашей платформе
                    свободный (новый) аккаунт на криптовалютной бирже исключительно с рабочим депозитом во избежании
                    погрешностей при копировании торговых сделок
                </p>
                <!--    <div class="input-group mb-3" style="width: 165px; margin-top:15px">-->
                <!--        <span class="input-group-text">X</span>--><? //= $connection['scale'] ?>
                <!--        <input scale_coefficient type="text" class="form-control" placeholder="scale coefficient" value="-->
                <? //= $connection['scale'] ?><!--">-->
                <!--    </div>-->
            </div>
            <div subscription_await_window class="modal-body m-3" style="display: none">
                <p class="mb-0">The system will now connect you to the master. Please wait it will not take than <span
                            connection_timer> 15 </span> seconds
                <div class="spinner-grow text-success me-2" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            <div class="modal-footer">
                <button close_subscribe type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="EnableBot('<?= $masterEmail ?>')">Confirm
                    connection
                </button>
            </div>

        </div>
    </div>
</div>