
<?php
    $sql_Type = "SELECT * FROM manage_type where Type_Name ='$_GET[idloai]'  order by ID_Type ASC";
    $query_Type = mysqli_query($mysqli, $sql_Type);
            ?>

    <?php
            while ($row_pro = mysqli_fetch_array($query_Type)) {
    ?>

    <div class="row" >
        <div class="col-lg-12" style="background-color: blue;">
            <div class="col-lg-8 float-left">
                <div style="display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                    height: 280px;
                    margin-left: 2cm;">
                    <h1 style="font-weight: bold; color: yellow;" ><?php echo $row_pro['Type_Name'] ?>
                        events
                    </h1>
                    <div style="color: white;">Discover the best Music events in your area and online</div>
                </div>
                
            </div>
            <div class="col-lg-4 float-left">
                <!-- image for cateroty -->
                <a href="index.php?quanly=Categorylist&idloai=<?php
                echo $row_pro['Type_Name'] ?>"><img style="width: 430px; height: 280px;" src="image/<?php echo $row_pro['Type_Img'] ?>"> </a>
            </div>
        </div>
    <?php
    }
    ?>

    <?php
$sql_pro = "SELECT * FROM app_item where Type_App ='$_GET[idloai]' and app_item.Status IN ('Accepted','Valid') order by ID_App ASC";

$query_pro = mysqli_query($mysqli, $sql_pro);

?>

<div class="container">
    <h3 style="margin-top: 20px; margin-left: 40px; font-weight: bold; color: blue;">Most popular events</h3>
    <ul class="product-list " style="margin-top: 20px;">
                <?php
                        while($row_pro = mysqli_fetch_array($query_pro))
                        {
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