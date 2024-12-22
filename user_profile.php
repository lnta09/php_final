<?php 
    include('template/head.php'); 
    include('template/header.php');
    include('template/sidebar.php')
?>

<div class="row my-5 w-100">
    <div class="w-25 flex-row d-flex justify-content-start align-items-start">
        <div class="px-4"></div>
        <div class="w-75">
            <a href="user_profile.php"><div class="w-100 mb-4 py-3 border border-secondary btn-outline-dark rounded-pill shadow flex-row d-flex align-items-center">
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
        <div class="ml-4 mr-4 p-4 rounded-lg shadow-sm">
            <div class="h4">
                Account Information
            </div>
        </div>
    </div>
</div>

<?php include('template/footer.php') ?>