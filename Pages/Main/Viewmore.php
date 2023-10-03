<?php

if (isset($_GET['view'])) {
    $view = $_GET['view'];
} else {
    $view = '';
}

if (isset($_GET['viewsame_Type'])) {
    $viewType = $_GET['viewsame_Type'];
} else {
    $viewType = '';
}

if (isset($_GET['viewsame_Develop'])) {
    $viewDevelop = $_GET['viewsame_Develop'];
} else {
    $viewDevelop = '';
}



?>

<?php
if ($view == 'Games') {
    $sql_FavoriteApps = "SELECT * FROM app_item WHERE Type_App = '$view' and Status IN ('Valid','Accepted') ORDER BY Num_Down DESC LIMIT 24";
} else {
    $sql_FavoriteApps = "SELECT * FROM app_item WHERE Type_App <> 'Games' and Status IN ('Valid','Accepted') ORDER BY Num_Down DESC LIMIT 24";
}

$query_FavoriteApps = mysqli_query($mysqli, $sql_FavoriteApps);
?>

<?php
if (isset($_GET['view'])) {
?>

<h3 style="margin-top: 20px; margin-left: 40px; font-weight: bold; color: blue;">View More</h3>
    <ul class="product-list ">
        <?php
        while ($row_pro = mysqli_fetch_array($query_FavoriteApps)) {
        ?>

            
<div class="col-lg-3 col-md-6 mb-4 float-left">
                <div class="card h-100" id="card">
                <a href="index.php?quanly=AppDetail&idApp=<?php echo $row_pro['ID_App']?>"><img class="card-img-top" src="<?php echo $row_pro['Icon'] ?>"> </a>
                    <div class="card-body">
                        <h5 class="card-title" href="index.php?quanly=AppDetail&idApp=<?php echo $row_pro['ID_App']?>">
                                <?php echo $row_pro['Name'] ?></h5>
                        <p class="date-event" href="index.php?quanly=AppDetail&idApp=<?php echo $row_pro['ID_App']?>">Thu, Sep 28, 2023 9:00 PM +07</p>
                        <p class="des-app" href="index.php?quanly=AppDetail&idApp=<?php echo $row_pro['ID_App']?>">
                                <?php echo $row_pro['Describe_App'] ?></p>
                        <p class="price" href="index.php?quanly=AppDetail&idApp=<?php echo $row_pro['ID_App']?>"><?php echo $row_pro['Paid'] ?></p>
                        <p class="develop" href="index.php?quanly=AppDetail&idApp=<?php echo $row_pro['ID_App']?>"><?php echo $row_pro['Develop'] ?></p>
                        <p class="follower" href="index.php?quanly=AppDetail&idApp=<?php echo $row_pro['ID_App']?>">6.6k followers</p>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </ul>
<?php
} elseif (isset($_GET['viewsame_Type'])) {
?>
    <?php
    $sql_sametype = "SELECT * FROM app_item WHERE Type_App IN (SELECT Type_App FROM app_item WHERE ID_App='$viewType')and Status IN ('Valid','Accepted')";
    $query_sametype = mysqli_query($mysqli, $sql_sametype);
    ?>

    <div class="row">
        <div>
            <h2>Same Type Apps</h2>
        </div>

        <ul class="product-list ">
            <?php
            while ($row_sametype = mysqli_fetch_array($query_sametype)) {
            ?>
                <div class="col-lg-3 col-md-6 mb-4 float-left">
                <div class="card h-100" id="card">
                <a href="index.php?quanly=AppDetail&idApp=<?php echo $row_pro['ID_App']?>"><img class="card-img-top" src="<?php echo $row_pro['Icon'] ?>"> </a>
                    <div class="card-body">
                        <h5 class="card-title" href="index.php?quanly=AppDetail&idApp=<?php echo $row_pro['ID_App']?>">
                                <?php echo $row_pro['Name'] ?></h5>
                        <p class="date-event" href="index.php?quanly=AppDetail&idApp=<?php echo $row_pro['ID_App']?>">Thu, Sep 28, 2023 9:00 PM +07</p>
                        <p class="des-app" href="index.php?quanly=AppDetail&idApp=<?php echo $row_pro['ID_App']?>">
                                <?php echo $row_pro['Describe_App'] ?></p>
                        <p class="price" href="index.php?quanly=AppDetail&idApp=<?php echo $row_pro['ID_App']?>"><?php echo $row_pro['Paid'] ?></p>
                        <p class="develop" href="index.php?quanly=AppDetail&idApp=<?php echo $row_pro['ID_App']?>"><?php echo $row_pro['Develop'] ?></p>
                        <p class="follower" href="index.php?quanly=AppDetail&idApp=<?php echo $row_pro['ID_App']?>">6.6k followers</p>
                    </div>
                </div>
            </div>
            <?php

            }
            ?>
        </ul>
    </div>
<?php
} elseif (isset($_GET['viewsame_Develop'])) {

    $sql_sameDevelop = "SELECT * FROM app_item WHERE Develop IN (SELECT Develop FROM app_item WHERE ID_App='$viewDevelop')and Status IN ('Valid','Accepted')";
    $query_sameDevelop = mysqli_query($mysqli, $sql_sameDevelop);
?>

    <div class="row">
        <div>
            <h2>Same Developer's Apps</h2>
        </div>

        <ul class="product-list ">
            <?php
            while ($row_Develop = mysqli_fetch_array($query_sameDevelop)) {
            ?>
                <div class="col-lg-3 col-md-6 mb-4 float-left">
                <div class="card h-100" id="card">
                <a href="index.php?quanly=AppDetail&idApp=<?php echo $row_pro['ID_App']?>"><img class="card-img-top" src="<?php echo $row_pro['Icon'] ?>"> </a>
                    <div class="card-body">
                        <h5 class="card-title" href="index.php?quanly=AppDetail&idApp=<?php echo $row_pro['ID_App']?>">
                                <?php echo $row_pro['Name'] ?></h5>
                        <p class="date-event" href="index.php?quanly=AppDetail&idApp=<?php echo $row_pro['ID_App']?>">Thu, Sep 28, 2023 9:00 PM +07</p>
                        <p class="des-app" href="index.php?quanly=AppDetail&idApp=<?php echo $row_pro['ID_App']?>">
                                <?php echo $row_pro['Describe_App'] ?></p>
                        <p class="price" href="index.php?quanly=AppDetail&idApp=<?php echo $row_pro['ID_App']?>"><?php echo $row_pro['Paid'] ?></p>
                        <p class="develop" href="index.php?quanly=AppDetail&idApp=<?php echo $row_pro['ID_App']?>"><?php echo $row_pro['Develop'] ?></p>
                        <p class="follower" href="index.php?quanly=AppDetail&idApp=<?php echo $row_pro['ID_App']?>">6.6k followers</p>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </ul>
    </div>
<?php
}
?>