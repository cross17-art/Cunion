<?php
/**
 * @var $masterId
 * @var $masterEmail ;
 */

?>

<div class="modal fade" id="unsubsribe_modal_<?= $masterId ?>" tabindex="-1"
     style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Unsubscribe Trader</h5>
                <button type="button" class="btn-close"
                        data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div unsubscription_info_window class="modal-body m-3">
                <p class="mb-0">Are you sure you want to unsubscribe the
                    master</p>
            </div>
            <div unsubscription_await_window class="modal-body m-3"
                 style="display: none">
                <p class="mb-0">The system will now disconnect you from the
                    master. Please wait it will not take than <span
                            disconnection_timer> 15 </span> seconds
                <div class="spinner-grow text-warning me-2" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            <div class="modal-footer">
                <button close_unsubscribe type="button"
                        class="btn btn-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-danger"
                        onclick="DisableBot('<?= $masterEmail ?>')">
                    Disconnect
                </button>
            </div>
        </div>
    </div>
</div>
