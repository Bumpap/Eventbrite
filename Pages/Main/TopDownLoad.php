<?php

if (isset($_GET['Paid'])) {
    $Paid = $_GET['Paid'];
} else {
    $Paid = '';
}

if ($Paid == 'Free') {
    $sql_pro = "SELECT * FROM app_item where Paid ='Free' and app_item.Status IN ('Accepted','Valid') ORDER BY Num_Down DESC LIMIT 12";
    $query_pro = mysqli_query($mysqli, $sql_pro);
} else {
    $sql_pro = "SELECT * FROM app_item where Paid !='Free' and app_item.Status IN ('Accepted','Valid') ORDER BY Num_Down DESC LIMIT 12";
    $query_pro = mysqli_query($mysqli, $sql_pro);
}

?>
<div class="container">
    <h3 style="margin-top: 20px; margin-left: 40px; font-weight: bold; color: blue;">Most popular events</h3>
<ul class="product-list ">
    <?php
    while ($row_pro = mysqli_fetch_array($query_pro)) {
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