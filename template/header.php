
<?php session_start() ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light py-2 fixed-top shadow-sm">
    <button class="border-0 btn btn-outline-light mr-3">
        <img class="d-flex align-items-center" width="27" height="30" alt="" loading="lazy" 
            src="https://cdn-icons-png.flaticon.com/128/2976/2976215.png"
            id="toggle-button">
    </button>
    <a class="navbar-brand mr-4" href="index.php">
        <img class="d-flex align-items-center" width="45" height="45" alt="" loading="lazy" src="https://cdn-icons-png.flaticon.com/128/10740/10740594.png">
    </a>
    <form class="form-inline">
        <input class="form-control mr-sm-2 rounded-pill" type="search" placeholder="Search Interior" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0 rounded-pill" type="submit">
            <img src="https://cdn-icons-png.flaticon.com/128/16799/16799322.png"
                width="22" height="22">
        </button>
    </form>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto d-flex align-items-center">
            
            <li class="nav-item">
                <a class="nav-link btn btn-light rounded-pill flex-row d-flex justify-content-center align-item-center" href="#">
                    <img src="https://cdn-icons-png.flaticon.com/128/16919/16919051.png"
                        width="28" height="28">
                    <div class="align-self-center">Black Friday Sale</div>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link d-flex align-items-center justify-content-end ml-3" 
                href="<?php if ( isset( $_SESSION["loginUSER"] ) ) {echo "";} ?>"
                data-toggle="tooltip" data-placement="bottom" title="Cart">
                    <img src="https://cdn-icons-png.flaticon.com/128/11137/11137831.png"
                        width="38" height="34" class="">
                    <small class="rounded-circle bg-danger text-white position-absolute align-self-start px-1">
                        20
                    </small>
                    
                </a>
            </li>
                

            <?php  if ( isset( $_SESSION["loginUSER"] ) ) { ?>

                <li class="nav-item">
                    <a href="user_profile.php" data-toggle="tooltip" data-placement="bottom" title="Profile"><img src="https://cdn-icons-png.flaticon.com/128/1177/1177568.png"
                    width="34" height="34" class="ml-4"></a>
                    <!-- <a class="nav-link" href="#"> <?php echo $_SESSION["loginUSER"] ?>  </a> -->
                </li>
                <li class="nav-item">
                    <a class="flex-row d-flex justify-content-center align-items-center" 
                        href="controller/c_signout.php" ">
                        <img src="https://cdn-icons-png.flaticon.com/128/4400/4400828.png"
                            width="34" height="34" class="mr-1 ml-4">    
                        <div class="text-secondary">Sign Out</div>
                    </a>
                </li>

                <?php } else { ?>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="signin.php">
                            <img src="https://cdn-icons-png.flaticon.com/128/12029/12029277.png"
                                width="26" height="26"> 
                            Sign In
                        </a>
                    </li>
                    
                    <li class="nav-item ml-1">
                        <a class="nav-link border border-secondary rounded-lg d-flex align-items-center btn btn-light" href="signup.php">
                            <img src="https://cdn-icons-png.flaticon.com/128/3429/3429142.png"
                                width="23" height="23">
                            <div class="ml-1 text-dark">Join as a Pro</div>
                        </a>
                    </li>


            <?php }  ?>

        </ul>
    </div>
</nav>
<div class="pt-5 pb-4"></div>