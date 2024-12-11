<?php 
    require ('template/head.php');
    require('template/header.php');
?>

<div class="flex-row d-flex justify-content-center align-item-center">
    <div class="mx-5 px-5"></div>
    <div class="my-5 py-5 text-center mx-5 px-5">
        <div class="h3">Forgot Your Password?</div>
        <div class="mb-4">Enter your email address and we'll send you a link to reset your password.</div>
        <form method="POST" action="controller/c_send_email.php">
            <input name="email" placeholder="Email address" class="form-control" required>
            <button type="submit" class="btn btn-primary mt-3 px-5" >Continue</button>
        </form>
    </div>
    <div class="mx-5 px-5"></div>
</div>

<?php
    require ('template/footer.php');
?>