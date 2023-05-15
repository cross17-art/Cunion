<?php
?>


    <button id="openInstructionModal" type="button" class="btn btn-primary my-1" style="display: none"
            data-bs-toggle="modal" data-bs-target="#instructionModal">
        Primary
    </button>


    <div class="modal fade" id="instructionModal" modal-with-video tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content trd_modal_content">
                <div class="modal-header">
                    <h5 class="modal-title">How to connect your Api Keys</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body m-3">
                    <iframe id="main_video_instruction"  inner-video class="trd_iframe" style="display: block; margin: auto" src="https://www.youtube.com/embed/ivqFwb_MM64"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="dont_show_instruction_button" type="button" class="btn btn-primary" data-bs-dismiss="modal">Do not show this again</button>
                </div>
            </div>
        </div>
    </div>

    <style>
        @media screen and (min-width: 768px){
            .trd_modal_content{
                width: 800px;
            }

            .trd_iframe{
                width: 560px;
                height: 315px;
            }
        }

        @media screen and (max-width: 768px) {
            .trd_iframe {
                width: 280px;
                height: 200px;

            }
        }
    </style>


<?php
/**
 * @var User $user
 */

if (!$user->ApiKeysAreConnected() && !isset($_COOKIE['do_not_show_video_instruction'])) {
    ?>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            document.querySelector("#openInstructionModal").click();
        })
    </script>
    <?php
}
?>