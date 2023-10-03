<?php
if (isset($_GET['Log']) && $_GET['Log'] == 1) {
    header("Location:login.php");
} elseif (isset($_GET['Log']) && $_GET['Log'] == 2) {
    header("Location:signup.php");
} elseif (isset($_GET['Log']) && $_GET['Log'] == 3) {
    unset($_SESSION['Login']);
    header("Location:index.php");
}
?>


<?php
if (isset($_SESSION['Login'])) {
    $Email = $_SESSION['Login'];
    $sql_level = "SELECT * FROM user WHERE Email='$Email' LIMIT 1";
    $query_level = mysqli_query($mysqli, $sql_level);
    $user = mysqli_fetch_array($query_level);
}
?>



<header class="" id="myHeader">
    <nav class="navbar navbar-expand-lg navbar-white bg-white">
        <div class="container">
            <a class="navbar-brand" id="logo" href="index.php">eventbrite</a>
            <div class="search-container">
                <form class="form-inline my-2 my-lg-0" method="POST" action="index.php?quanly=Search">
                    <input name="Search_Name" class="form-control mr-sm-2" type="text" placeholder="Search event" aria-label="Search">
                    <button class="btn btn-outline-light my-2 my-sm-0" style="color: #333; border: 1px solid #000" name="Search" type="submit">
                        <i class="Icon_root__1fy91 Icon_icon-small__1fy91" aria-hidden="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M14.926 13.426a6 6 0 10-1.454 1.468L18.5 
                                20l1.5-1.5-5.074-5.074zM10 14a4 4 0 100-8 4 4 0 000 8z" fill="#3A3247"></path>
                            </svg>
                        </i>
                    </button>
                </form>
            </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">

                <ul class="navbar-nav ml-auto text-center">
                    <li class="nav-item active">
                        <a class="nav-link" id="find-event" href="FindEvents.php">
                            Find Events
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" id="create-event" href="CreateEvents.php">
                            Create Events
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="Dropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Help Center
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="">Help Center</a>
                            <a class="dropdown-item" href="">Find your tickets</a>
                            <a class="dropdown-item" href="">Contact the event organizer</a>

                        </div>
                    </li>

                    <?php
                    if (!isset($_SESSION['Login'])) {
                    ?>
                        <li class="nav-item active">
                            <a class="nav-link" id="login" href="login.php">
                                Log In
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>

                        <li class="nav-item active">
                            <a class="nav-link" id="signup" href="signup.php">
                                Sign Up
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                    <?php
                    } else {
                    ?>

                        <li class="nav-item dropdown">
                            <a style="margin-top: 5px;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="d-inline">
                                    Hello:
                                    <?php
                                    if (isset($_SESSION['Login'])) {

                                        echo $user['FullName'];
                                    }   
                                    ?>
                                    <img id = "ava" style="border-radius:500px" class=" AVT h-25 w-25" src="<?php echo $user['AVT']; ?>" alt="">
                                </div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="index.php?quanly=UserProfile&idedit=<?php echo $_SESSION['Login'] ?>">Profile</a>
                                <a class="dropdown-item" href="ChangePassword.php">Change Password</a>
                                <a class="dropdown-item" href="index.php?quanly=AddMoney&idedit=<?php echo $_SESSION['Login'] ?>">Recharge and transaction history</a>
                                <?php
                                if ($user['Level'] == 1) {
                                ?>
                                    <a class="dropdown-item" href="index.php?quanly=Upgrade_Develop&idedit=<?php echo $_SESSION['Login'] ?>">Become a Developer</a>

                                <?php
                                } elseif ($user['Level'] == 2) {
                                ?>
                                    <a class="dropdown-item" href="index.php?quanly=ManageApps&idedit=<?php echo $_SESSION['Login'] ?>">Manage Application</a>
                                    <a class="dropdown-item" href="index.php?quanly=ViewOrder&idedit=<?php echo $_SESSION['Login'] ?>">View Order</a>
                                <?php
                                } elseif ($user['Level'] == 3) {
                                ?>
                                    <a class="dropdown-item" href="index.php?quanly=WAF&idedit=<?php echo $_SESSION['Login'] ?>">Examine Application</a>
                                    <a class="dropdown-item" href="index.php?quanly=Manage_Type">Manage Category</a>
                                    <!-- <a class="dropdown-item" href="CreateCard.php">Create Card</a> -->
                                    <a class="dropdown-item" href="index.php?quanly=ManageAccount&idedit=<?php echo $_SESSION['Login'] ?>">Manage Account</a>
                                    <a class="dropdown-item" href="index.php?quanly=ManageApplication&idedit=<?php echo $_SESSION['Login'] ?>">Manage Application</a>
                                <?php
                                }
                                ?>
                            </div>
                        </li>
                    <?php
                    }
                    ?>





                    <?php
                    if (isset($_SESSION['Login'])) {
                    ?>
                        <li class="nav-item">
                            <a id ="logout"class="nav-link text-blue" href="?Log=3">Log out
                            </a>
                        </li>
                    <?php
                    }
                    ?>

                </ul>
            </div>
        </div>
    </nav>
</header>


<!-- hello -->