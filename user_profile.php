<?php 
    include('template/head.php'); 
    include('template/header.php');
    include('template/sidebar.php');

?>

<?php 
    require('model/m_user.php');
    $new_user = new User();
    $this_user = $new_user->select_user($_SESSION['loginUSER']);


?>
<div class="row my-5 w-100">
    <div class="w-25 flex-row d-flex justify-content-start align-items-start">
        <div class="px-4"></div>
        <div class="w-75">
            <a href="user_profile.php"><div class="w-100 mt-3 mb-4 py-3 border border-secondary btn-outline-dark rounded-pill shadow flex-row d-flex align-items-center">
                <img src="https://cdn-icons-png.flaticon.com/128/1177/1177568.png"
                width="30" height="30" class="mr-2 ml-4">
                <div class="h6 m-0">Account info</div>
            </div></a>
            <a href=""><div class="w-100 mb-4 py-3 border border-secondary btn-outline-dark rounded-pill shadow flex-row d-flex align-items-center">
                <img src="https://cdn-icons-png.flaticon.com/128/7325/7325265.png"
                width="30" height="30" class="mr-2 ml-4">
                <div class="h6 m-0">Bills</div>
            </div></a>
            <a href="controller/c_signout.php"><div class="w-100 py-3 border border-secondary btn-outline-dark rounded-pill shadow flex-row d-flex align-items-center">
                <img src="https://cdn-icons-png.flaticon.com/128/4400/4400828.png"
                width="30" height="30" class="mr-2 ml-4">
                <div class="h6 m-0">Sign out</div>
            </div></a>
        </div>
    </div>
    <div class="w-75">
        <div class="ml-4 mr-4 p-4 rounded-lg shadow">
            <div class="h3 mb-4 ml-3">Account Information</div>
            <form method="post" action="controller/c_edit_user.php">
                <input type="hidden" name="email" value="<?php echo $this_user['email']; ?>">
                <div class="mb-4 flex-row d-flex align-items-center w-75 border rounded-pill pl-4 py-2">
                    <img src="https://cdn-icons-png.flaticon.com/128/3177/3177440.png"
                        width="30" height="30">
                    <div class="ml-3 w-100">
                        <div class="text-secondary">Username</div>
                        <input class="border-0 h5 m-0 w-75" name="username" value="<?php echo $this_user['username']; ?>" required>
                    </div>
                </div>
                <div class="mb-4 flex-row d-flex align-items-center w-75 border rounded-pill pl-4 py-2">
                    <img src="https://cdn-icons-png.flaticon.com/128/16749/16749931.png"
                        width="30" height="30">
                    <div class="ml-3 w-100">
                        <div class="text-secondary">Phone number</div>
                        <input class="border-0 h5 m-0 w-75" type="number" name="phone" value="<?php echo $this_user['phone']; ?>" required>
                    </div>
                </div>
                <div class="mb-4 flex-row d-flex align-items-center w-75 border rounded-pill pl-4 py-2">
                    <img src="https://cdn-icons-png.flaticon.com/128/1647/1647794.png"
                        width="30" height="30">
                    <div class="ml-3 w-100">
                        <div class="text-secondary">Genger</div>
                        <select class="border-0 h5 m-0 w-75" name="gender">
                            <option value="male" <?php if($this_user['gender'] == 'male') {echo 'selected';} ?>>Male</option>
                            <option value="female" <?php if($this_user['gender'] == 'female') {echo 'selected';} ?>>Female</option>
                        </select>
                    </div>
                </div>
                <div class="mb-4 flex-row d-flex align-items-center w-75 border rounded-pill pl-4 py-2">
                    <img src="https://cdn-icons-png.flaticon.com/128/2454/2454297.png"
                        width="30" height="30">
                    <div class="ml-3 w-100">
                        <div class="text-secondary">Date of Birth</div>
                        <input class="border-0 h5 m-0 w-75" name="birthday" type="date" value="<?php echo $this_user['birthday']; ?>">
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-primary ml-3 mb-5"><h5 class="m-0">Update user profile</h5></button>
            </form>
            <div class="h3 mb-4 ml-3 mt-5">Login Information</div>
            <form method="post" action="controller/c_change_password.php">
                <input type="hidden" name="email" value="<?php  ?>">
                <div class="mb-4 flex-row d-flex align-items-center w-75 border rounded-pill pl-4 py-2">
                    <img src="https://cdn-icons-png.flaticon.com/128/3177/3177440.png"
                        width="30" height="30">
                    <div class="ml-3 w-100">
                        <div class="text-secondary">Email</div>
                        <input class="border-0 h5 m-0 w-75" name="email" value="<?php echo $this_user['email']; ?>" readonly>
                    </div>
                </div>
                <div class="mb-4 flex-row d-flex align-items-center w-75 border rounded-pill pl-4 py-2">
                    <img src="https://cdn-icons-png.flaticon.com/128/6195/6195699.png"
                        width="30" height="30">
                    <div class="ml-3 w-100">
                        <div class="text-secondary">Old Password</div>
                        <input class="border-0 h5 m-0 w-75" name="old-password" type="password" value="hackerhacker" required>
                    </div>
                </div>
                <div class="mb-4 flex-row d-flex align-items-center w-75 border rounded-pill pl-4 py-2">
                    <img src="https://cdn-icons-png.flaticon.com/128/6195/6195699.png"
                        width="30" height="30">
                    <div class="ml-3 w-100">
                        <div class="text-secondary">New Password</div>
                        <input class="border-0 h5 m-0 w-75" name="new-password" type="password" value="hackerhacker" required>
                    </div>
                </div>
                <div class="mb-4 flex-row d-flex align-items-center w-75 border rounded-pill pl-4 py-2">
                    <img src="https://cdn-icons-png.flaticon.com/128/6195/6195699.png"
                        width="30" height="30">
                    <div class="ml-3 w-100">
                        <div class="text-secondary">Confirm Password</div>
                        <input class="border-0 h5 m-0 w-75" name="re-password" type="password" value="hackerhacker" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-danger ml-3"><h5 class="m-0">Update Password</h5></button>
            </form>
        </div>
    </div>
</div>

<?php include('template/footer.php') ?>