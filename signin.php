<?php include('template/head.php') ?>
<?php include('template/header.php') ?>
    
<div class="container mt-4 flex-row d-flex justify-content-center">
        <div class="border-bottom pb-3">
            <h2 class="mb-4 font-weight-normal">Interior G-9 Login</h2>
            <div class="border-right pr-5 pt-3 pb-1">
                <form method="POST" action="controller/c_signin.php">
                    <div class="form-group flex-column d-flex justify-content-start">
                        <label class="mb-1" for="username">Username or Email Address</label>
                        <input class="form-control" type="text" id="email" name="email" required>
                    </div>
                    <div class="form-group flex-column d-flex justify-content-start">
                        <label class="mb-1" for="password">Password</label>
                        <input class="form-control" type="password" id="password" name="password" required>
                    </div>
                    <label class="p-0 m-0" style="color:red">
                    <?php
                        if (isset($_GET['valid']))
                        {
                            echo "{$_GET['valid']}";
                        }
                    ?>
                    </label>
                    <div class="form-group form-check mb-2 pt-0">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Keep me signed in</label>
                    </div>
                    <button type="submit" class="btn btn-dark font-weight-bolder w-100">Sign In</button>
                </form>
                <button type="submit" class="btn btn-light border border-dark mt-2 px-5 font-weight-bolder w-100">Email Me Link to Sign In</button>
                <div class="mt-2"><a href="forgotPassword.php"><small>Forgot your password? ></small></a></div>
            </div>
        </div>
        <div class="border-bottom pt-5 flex-column d-flex justify-content-start align-items-center">
            <div class="my-3"></div>
            <div class="mb-5"><img src="https://st.hzcdn.com/static/assets/login_chill.png" width="260" height="160"></div>
            <div class="btn btn-outline-light  border-secondary mx-5 w-75">
                <a class="flex-row d-flex justify-content-center pl-2">
                    <img src="https://cdn-icons-png.flaticon.com/128/281/281764.png" 
                        width="25" height="25">
                    <div class="text-dark border-left ml-3 px-3">Continue with Google</div>
                </a>
            </div>
            <div class="btn btn-light border-dark mx-5 mt-2 px-4 w-75 bg-white">
                <a class="flex-row d-flex justify-content-center align-items-center pl-2">
                    <img src="https://cdn-icons-png.flaticon.com/128/270/270781.png" 
                        width="20" height="20">
                    <div class="text-dark font-weight-bolder ml-1">Sign in with Apple</div>
                </a>
            </div>
            <div class="ml-5 mt-3 align-self-start"><a href="#">For Facebook login, Click here ></a></div>
        </div>
    </div>
    <div class="ml-5 my-4 flex-row d-flex justify-content-start">
        <div class="mx-5"></div><div class="mx-5"></div>
        <div class="flex-column d-flex justify-content-start align-items-start">
            <p class="message">Don't have an account yet? <a href="signup.php">Join now ></a></p>
            <div><small>By signing up, signing in or continuing, I agree to Group 9's <a href="#"><u>Terms of Use</u></a> and <a href="#"><u>Privacy Policy</u></a>.</small></div>
        </div>
</div>
<div class="my-5 py-5"></div>

<?php include('template/footer.php') ?>

