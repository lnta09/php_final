<?php include('template/head.php') ?>
<?php include('template/header.php') ?>
    
<div class="ml-5 my-4 flex-row d-flex justify-content-start">
    <div class="mx-5"></div><div class="mx-5"></div>
    <div class="flex-column d-flex justify-content-start align-items-start">
            <h2 class="mb-3">Welcome to Interior G-9</h2>
            <h4 class="">One simple solution for contractors and design pros</h4>
    </div>
</div>
<div class="container flex-row d-flex justify-content-center">
        <div class="border-bottom pb-3">
            <div class="border-right pr-5 pt-3 pb-1">
                <form method="POST" action="controller/c_signup.php">
                    <div class="form-group flex-column d-flex justify-content-start">
                        <label class="mb-1 pr-5 mr-5" for="email">Username or Email Address</label>
                        <input class="form-control" type="text" id="email" name="email" required
                            value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>">
                    </div>
                    <div class="form-group flex-column d-flex justify-content-start mb-0">
                        <label class="mb-1" for="password">Password</label>
                        <input class="form-control" type="password" id="password" name="password" required>
                    </div>
                    <div class="text-secondary"><small>Use 8 or more characters, with a mix of letters, numbers</small></div>
                    <div class="text-secondary"><small>and symbols</small></div>

                    <div class="form-group flex-column d-flex justify-content-start mb-0 mt-2">
                        <label class="mb-1" for="re-password">Confirm your password</label>
                        <input class="form-control" type="password" id="re-password" name="re-password" required>
                    </div>

                    <div class="form-group flex-column d-flex justify-content-start mt-3">
                        <label class="mb-1" for="username">Username</label>
                        <input class="form-control" type="text" id="username" name="username" required>
                    </div>
                    <div class="form-group flex-column d-flex justify-content-start">
                        <label class="mb-1" for="phone">Phone number</label>
                        <input class="form-control" type="number" name="phone" required>
                    </div>
                    
                    <button type="submit" class="btn btn-dark font-weight-bolder mt-4 w-100">Sign Up</button>
                </form>
            </div>
        </div>
        <div class="border-bottom flex-column d-flex justify-content-start align-items-center">
            <div class="mb-3"><img src="https://cdni.iconscout.com/illustration/premium/thumb/study-room-3318355-2766926.png" 
                width="300" height="280"></div>
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
                    <div class="text-dark font-weight-bolder ml-1">Sign up with Apple</div>
                </a>
            </div>
            <div class="ml-5 mt-3 mb-2 align-self-start"><a href="#">For Facebook login, Click here ></a></div>
        </div>
    </div>
<div class="ml-5 my-4 flex-row d-flex justify-content-start">
    <div class="mx-5"></div><div class="mx-5"></div>
    <div class="flex-column d-flex justify-content-start align-items-start">
        <p class="message">Already have an account? <a href="signin.php">Sign In ></a></p>
        <div><small>By signing up, signing in or continuing, I agree to G-9's <a href="#"><u>Terms of Use</u></a> and <a href="#"><u>Privacy Policy</u></a>.</small></div>
    </div>
</div>
<div class="my-5 py-5"></div>

<?php include('template/footer.php') ?>

