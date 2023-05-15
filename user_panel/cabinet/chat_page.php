<?php
session_start();
include("classes/user.php");
$user = new User($_SESSION['user_email']);
?>

<html lang="en" xmlns="http://www.w3.org/1999/html">
<?php include("header.php") ?>

<!--
  HOW TO USE:
  data-theme: default (default), dark, light
  data-layout: fluid (default), boxed
  data-sidebar-position: left (default), right
  data-sidebar-behavior: sticky (default), fixed, compact
-->

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
<div class="wrapper">
    <?php include("cabinet_navigation.php"); ?>
    <div class="main">
        <?php include("cabinet_header.php"); ?>


        <main class="content">
            <div class="container-fluid p-0">

                <h1 class="mb-3">Messages</h1>

                <div class="card">
                    <div class="row g-0">

<!--                        //friends-->
                        <div class="col-12 col-lg-5 col-xl-3 border-end">

                            <div class="px-4 d-none d-md-block">
                                <div class="d-flex align-items-start align-items-center">
                                    <div class="flex-grow-1">
                                        <input type="text" class="form-control my-3" placeholder="Search...">
                                    </div>
                                </div>
                            </div>

                            <a href="#" class="list-group-item list-group-item-action border-0">
                                <div class="badge bg-success float-end">5</div>
                                <div class="d-flex align-items-start">
                                    <img src="img/avatars/avatar-5.jpg" class="rounded-circle me-1" alt="Ashley Briggs"
                                         width="40" height="40">
                                    <div class="flex-grow-1 ms-3">
                                        Ashley Briggs
                                        <div class="small"><span class="fas fa-circle chat-online" aria-hidden="true"></span> Online</div>
                                    </div>
                                </div>
                            </a>
                         
                            <a href="#" class="list-group-item list-group-item-action border-0">
                                <div class="d-flex align-items-start">
                                    <img src="img/avatars/avatar-3.jpg" class="rounded-circle me-1" alt="Jennifer Chang"
                                         width="40" height="40">
                                    <div class="flex-grow-1 ms-3">
                                        Jennifer Chang
                                        <div class="small"><span class="fas fa-circle chat-offline"></span> Offline
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <hr class="d-block d-lg-none mt-1 mb-0"/>
                        </div>

<!--                        //place send mes-->
                        <div class="col-12 col-lg-7 col-xl-9">
                            <div class="py-2 px-4 border-bottom d-none d-lg-block">
                                <div class="d-flex align-items-start align-items-center py-1">
                                    <div class="position-relative">
                                        <img src="img/avatars/avatar-3.jpg" class="rounded-circle me-1"
                                             alt="Bertha Martin" width="40" height="40">
                                    </div>
                                    <div class="flex-grow-1 ps-3">
                                        <strong>Bertha Martin</strong>
                                        <div class="text-muted small"><em>Typing...</em></div>
                                    </div>
                                    <div>
                                        <button class="btn btn-primary btn-lg me-1 px-3"><i class="feather-lg"
                                                                                            data-feather="phone"></i>
                                        </button>
                                        <button class="btn btn-info btn-lg me-1 px-3 d-none d-md-inline-block"><i
                                                    class="feather-lg" data-feather="video"></i></button>
                                        <button class="btn btn-light border btn-lg px-3"><i class="feather-lg"
                                                                                            data-feather="more-horizontal"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

<!--                            //message-->
                            <div class="position-relative">
                                <div class="chat-messages p-4" style="max-height: 800px;
    overflow-y: scroll;
    min-height: 900px;">


                                    <div class="chat-message-right pb-4">
                                        <div>
                                            <img src="img/avatars/avatar.jpg" class="rounded-circle me-1"
                                                 alt="Chris Wood" width="40" height="40">
                                            <div class="text-muted small text-nowrap mt-2">2:43 am</div>
                                        </div>
                                        <div class="flex-shrink-1 bg-light rounded py-2 px-3 me-3">
                                            <div class="fw-bold mb-1">You</div>
                                            Lorem ipsum dolor sit amet, vis erat denique in, dicunt prodesset te vix.
                                        </div>
                                    </div>

                                    <div class="chat-message-left pb-4">
                                        <div>
                                            <img src="img/avatars/avatar-3.jpg" class="rounded-circle me-1"
                                                 alt="Bertha Martin" width="40" height="40">
                                            <div class="text-muted small text-nowrap mt-2">2:44 am</div>
                                        </div>
                                        <div class="flex-shrink-1 bg-light rounded py-2 px-3 ms-3">
                                            <div class="fw-bold mb-1">Bertha Martin</div>
                                            Sit meis deleniti eu, pri vidit meliore docendi ut, an eum erat animal
                                            commodo.
                                        </div>
                                    </div>

                                </div>
                            </div>

<!--                            //sender-->
                            <div class="flex-grow-0 py-3 px-4 border-top">
                                <div class="input-group">
                                    <input id="message" type="text" class="form-control" placeholder="Type your message">
                                    <button class="btn btn-primary" onclick="SendMsg()">Send</button>
                                </div>
                            </div>

                        </div>



                    </div>
                </div>
            </div>
        </main>

        <footer class="footer">
            <div class="container-fluid">
                <div class="row text-muted">
                    <div class="col-6 text-start">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a class="text-muted" href="#">Support</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-muted" href="#">Help Center</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-muted" href="#">Privacy</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-muted" href="#">Terms of Service</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-6 text-end">
                        <p class="mb-0">
                            &copy; 2021 - <a href="index.html" class="text-muted">AppStack</a>
                        </p>
                    </div>
                </div>
            </div>
        </footer>


    </div>
</div>
<script src="js/app.js"></script>
<script src="js/settings.js"</script>

<script>
    // Chat
    document.addEventListener("DOMContentLoaded", function () {
        $('.chat-messages').scrollTop($('.chat-messages')[0].scrollHeight);
    });
</script>
<script src="js/test_send.js"></script>
</body>
</html>


<script src="js/verification_script.js">
</script>