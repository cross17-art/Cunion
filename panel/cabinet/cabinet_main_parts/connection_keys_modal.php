<?php

$connectionIcon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share-2 align-middle"> <circle cx="18" cy="5" r="3"></circle> <circle cx="6" cy="12" r="3"></circle> <circle cx="18" cy="19" r="3"></circle> <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line> <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg>';

?>

<div class="modal fade" id="need_connect" modal-with-video tabindex="-1" style="display: none;"
     aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content trd_modal_content">
            <div class="modal-header">
                <h5 class="modal-title" style="width: 100%;">
                    <span class="badge badge-soft-warning title-badge" style="font-size: 1em">You need to connect your account via api keys first</span>
                </h5>
            </div>
            <div class="modal-body m-3">
                <iframe id="main_video_instruction" inner-video class="trd_iframe" style="display: block; margin: auto"
                        src="https://www.youtube.com/embed/ivqFwb_MM64"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="https://cunion.io/panel/cabinet/cabinet_accounts">
                    <button class="btn btn-warning" ya-goal="goal-modal-connect-keys-button"><?= $connectionIcon ?>Connect Keys</button>
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    .title-badge {
        margin: auto;
        text-align: center;
        width: fit-content;
        display: block;
    }
</style>

