<?php
/**
 * @var User $user
 */
?>

    <button id="PaymentNotificationButton" type="button" class="btn btn-danger my-1" style="display: none"
            data-bs-toggle="modal" data-bs-target="#paymentModal">
        Danger
    </button>

    <div class="modal fade" id="paymentModal" tabindex="-1" style="display: ;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Default modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body m-3">
                <span class="badge badge-soft-danger" style="display: block">
                <p class="mb-0 mobile-mini-text" style="font-size: 15px; padding: 5px">Hi.You are the Debtor.</p>
                <p class="mb-0 mobile-mini-text" style="font-size: 15px; padding: 5px">Please proceed payment to avoid the disconnect.</p>
                </span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <style>
        @media screen and (max-width: 768px){
            .mobile-mini-text{
                font-size: 13px !important;
            }
        }

    </style>


<?php
if ($user->IsDebtor()) {
    ?>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            document.querySelector("#PaymentNotificationButton").click();
        })
    </script>
    <?php
}
?>