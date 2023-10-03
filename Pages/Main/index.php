
<div class="carousel slide my-2" id="carouselExampleIndicators" data-ride="carousel">
    


    <div class="carousel-inner " role="listbox">
            <div id="caro_img" class="carousel-item active">
                <img class="d-block img-fluid" src="image\EvenSlide.png" alt="First slide" />
                

            </div>
            <div  id="caro_img" class="carousel-item">
                <img class="d-block img-fluid" src="image\EvenSlide2.png" alt="Second slide" />
                </a>
             </div>
             <div  id="caro_img" class="carousel-item">
                <img class="d-block img-fluid" src="image\EvenSlide3.png" alt="Second slide" />
                </a>
             </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>

            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

            <a href="index.php?quanly=AppDetail&idApp=1">
                    
                    <div class="slide-button">Find your next event</div>
            </a>
        
    </div>



    </a>
</div>

<?php
    $sql_Type = "SELECT * FROM manage_type ORDER BY ID_Type ASC";
    $query_Type = mysqli_query($mysqli, $sql_Type);
            ?>

<div class="row">    
    <div class=" category" >
        
        <?php
            while ($row_pro = mysqli_fetch_array($query_Type)) {
        ?>
            <div class="categories">
                <div class=" category-image " >
                    <!-- Make category view row have image and name -->
                    <a href="index.php?quanly=Categorylist&idloai=<?php
                    echo $row_pro['Type_Name'] ?>"><img src="image/<?php echo $row_pro['Type_Img'] ?>"> </a>
                </div>
                <h7 ><p class="category-name" href="index.php?quanly=Categorylist&idloai=<?php echo $row_pro['Type_Name']?>">
                                <?php echo $row_pro['Type_Name'] ?></p></h7>
            </div>
        <?php
        }
        ?>

        
    </div>
</div>
<div class="container">
    <?php
                $sql_FavoriteBusiness = "SELECT * FROM app_item WHERE Type_App = 'Business' and app_item.Status IN ('Accepted','Valid') ORDER BY Num_Down DESC ";
                $query_FavoriteBusiness = mysqli_query($mysqli,$sql_FavoriteBusiness);
            ?>

    <!-- <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a> -->


    <div class="row">
        <div>
            <h1 style="font-weight: bold; margin-bottom: 30px;">Popular in
                    <a style="color: black;" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="">Use my current location</a>
                        <a class="dropdown-item" href="">Browse online events</a>
                    </div>
                    <input style="color: blue;" type="text" data-spec="input-field-input-element" class="eds-field-styled__input" id="locationPicker" 
                    name="locationPicker" value="Hồ Chí Minh city" role="combobox" aria-expanded="false" aria-autocomplete="list" autocomplete="off" tabindex="0">
                
            </h1>
            <div class="danhsach" style="font-weight: bold; margin-bottom: 30px;">
                <a href="">All</a>
                <a href="">For you</a>
                <a href="">Online</a>
                <a href="">Today</a>
                <a href="">This weekend</a>
                <a href="index.php?quanly=Top_Down&Paid=Free">Free</a>
                <a href="index.php?quanly=Top_Down&Paid=NFree">Pay fee</a>
                <a href="index.php?quanly=Categorylist&idloai=Music">Music</a>
                <a href="index.php?quanly=Categorylist&idloai=Food and Drink">Food&Drink</a>
                
            </div>

        </div>


        <div>
            <h3 style="font-weight: bold; margin-top: 30px; margin-bottom: 10px;">Events in Hồ Chí Minh city - Business Events</h3>
        </div>

        <!-- <a href="index.php?quanly=ViewMore&view=Music" class="font-weight-bold">View More</a> -->

        <ul class="product-list ">
            <?php
                    while($row_pro = mysqli_fetch_array($query_FavoriteBusiness))
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
</div>
<hr style="padding: 5px; background-color: rgb(211, 211, 211);">
<div class="container">  
    

    <?php
                    $sql_FavoriteFood = "SELECT * FROM app_item WHERE Type_App != 'Business' and app_item.Status IN ('Accepted','Valid') ORDER BY Num_Down DESC LIMIT 8";
                    $query_FavoriteFood = mysqli_query($mysqli,$sql_FavoriteFood);
                ?>

    <div class="row">
        <div>
            <h3 style="font-weight: bold; margin-top: 30px;">More Event</h3>
        </div>
        <ul class="product-list ">
            <?php
                                while($row_pro = mysqli_fetch_array($query_FavoriteFood))
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
        <a href="index.php?quanly=ViewMore&view=MoreEvent" class="seemore font-weight-bold">See More</a>
    </div>
</div>
<div style="background-color: rgb(240, 240, 240);">
    <div class="container">
        <h3 style="font-weight: bold; margin-top: 30px; padding-top: 2cm;">Top destinations in United States</h3>
        <div>

        </div>
    </div>
    <div class="container">
        <h3 style="font-weight: bold; padding-top: 2cm;">Popular cities</h3>
        <div style="padding-bottom: 2cm;">
            <div>
                
            </div>                 
        </div>
    </div>
</div>                            
</div>
</div>
</div>
</div>


