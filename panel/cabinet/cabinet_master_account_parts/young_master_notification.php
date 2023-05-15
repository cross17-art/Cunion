<?php
/**
 * @var User $user
 */
?>

    <button id="YoungMasterNotification" type="button" class="btn btn-danger my-1" style="display: none"
            data-bs-toggle="modal" data-bs-target="#YoungNotification">
        Danger
    </button>

    <div class="modal fade" id="YoungNotification" tabindex="-1" style="display: ;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Default modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body m-3" style="font-size: 15px">
                    <span class="badge-soft-warning">Hi.You are the young trader.</span>
                    <br>
                    <span class="badge-soft-warning">You will be displayed in the trader table in one day, after the balance statistic will be collected.</span>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <style>
        @media screen and (max-width: 768px) {
            .mobile-mini-text {
                font-size: 13px !important;
            }
        }

    </style>


<?php
if ($user->kucoinMasterAccount->age < 1) {
    ?>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            document.querySelector("#YoungMasterNotification").click();
        })
    </script>
    <?php
}
?>