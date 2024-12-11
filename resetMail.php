<?php 
    require ('template/head.php');
    require('template/header.php');
?>

<div class="flex-row d-flex justify-content-center align-item-center">
    <div class="mx-5 px-5"></div>
    <div class="my-5 py-5 text-center mx-5 px-5">
        <div class="h3">Email sent!</div>
        <div>Check your inbox for an email with a password reset link</div>
        <div class="mb-4">(sent to <b><?php if(isset($_SESSION['email'])) {echo $_SESSION['email'];} ?></b>)</div>
        <a href="https://mail.google.com/mail/" target="_blank"
            class="btn btn-light px-5 border-secondary flex-row d-flex justify-content-center align-items-center" >
            <img src="https://cdn-icons-png.flaticon.com/128/5968/5968534.png"
                width="30" height="30">
            <div class="ml-3"><b>Open Gmail</b></div>
        </a>
    </div>
    <div class="mx-5 px-5"></div>
</div>

<?php
    require ('template/footer.php');
?>