<?php 
    require ('template/head.php');
    require('template/header.php');
?>

<div class="flex-row d-flex justify-content-center align-item-center">
    <div class="mx-5 px-5"></div>
    <div class="my-5 py-5 text-center mx-5 px-5">
        <div class="h2">Create a New Password</div>
        <div >Your password should have at least 8 characters</div>
        <div class="mb-4">with at least one symbol and one number.</div>
        <form method="POST" action="controller/c_change_password.php">
            <input name="email" placeholder="<?php echo $_SESSION['email']; ?>" class="form-control mb-3" type="password" disabled>
            <input name="password" placeholder="Password *" class="form-control mb-3" type="password" required>
            <input name="re-password" placeholder="Re-enter your password *" class="form-control" type="password" required>
            <button type="submit" class="btn btn-success w-100 mt-3 px-5" ><b>Submit</b></button>
        </form>
        <div class="mt-3"><small>By setting a password, you agree to Interior G9's Terms of Use, Privacy Policy.</small></div>
    </div>
    <div class="mx-5 px-5"></div>
</div>

<?php
    require ('template/footer.php');
?>