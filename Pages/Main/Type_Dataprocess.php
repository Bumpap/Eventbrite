<?php
    include('../../config/config.php');
    if(isset($_POST['TypeName']))
    {
        $TypeName = $_POST['TypeName'];

    }
    else
    {
        $TypeName="";
    }

    $hinhanh = 'image/'.$_FILES['TypeImg']['name'];
    $hinhanh_tmp ='image/'.$_FILES['TypeImg']['tmp_name'];




    if(isset($_GET['Type_delete']))
    {   

        $Type =  $_GET["Type_delete"];

        $sql_boo  = "SELECT * FROM app_item WHERE Type_App ='$Type'";
        $query_boolean = mysqli_query($mysqli,$sql_boo);

        $row = mysqli_fetch_array($query_boolean);
       
        if($row[0]==null)
        {

            $sql_delete = "DELETE FROM manage_type WHERE Type_Name= '$Type' ";
            mysqli_query($mysqli,$sql_delete);
            header('Location:../../index.php?quanly=Manage_Type');
        }
        else
        {

            header('Location:../../index.php?quanly=Manage_Type');
        }
        
    }
    elseif(isset($_POST['AddType']))
    {
        if(isset($_FILES['TypeImg']))
        {
            $TypeImg = $_FILES['TypeImg']['name'];
            $TypeImg_tmp = $_FILES['TypeImg']['tmp_name'];
            move_uploaded_file($TypeImg_tmp,'../../image/'.$TypeImg);
        }
        else
        {
            $TypeImg = "";
        }
        if(isset($_POST['TypeName']))
        {
            $TypeName = $_POST['TypeName'];
        }
        else
        {
            $TypeName = "";
        }
        $sql_insert = "INSERT INTO manage_type(Type_Name,Type_Img) VALUE ('$TypeName','$TypeImg') ";
        mysqli_query($mysqli,$sql_insert);
        header('Location:../../index.php?quanly=Manage_Type');
    }
    elseif(isset($_POST['EditType']))
    {
        if(isset($_POST['Edit_App']))
        {
            $Type = $_POST['Edit_App'];
        }
        else
        {
            $Type = "";
        }

        if(isset($_POST['ID_Type']))
        {
            $ID = $_POST['ID_Type'];
        }
        else
        {
            $ID = "";
        }

        if(isset($_FILES['Edit_Img']))
        {
            $Edit_Img = $_FILES['Edit_Img']['name'];
            $Edit_Img_tmp = $_FILES['Edit_Img']['tmp_name'];
            move_uploaded_file($Edit_Img_tmp,'../../image/'.$Edit_Img);
        }
        else
        {
            $Edit_Img = "";
        }
        // $sql_update = "UPDATE manage_type SET manage_type.Type_Name  = '$Type',manage_type.Type_Img = '$Edit_Img' 
        // WHERE manage_type.Type_Name IN (SELECT Type_Name FROM manage_type WHERE ID_Type = '$ID') ";
        // mysqli_query($mysqli,$sql_update);
        // $sql_update1 = "UPDATE app_item  SET app_item.Type_App  = '$Type' 
        // WHERE app_item.Type_App IN (SELECT Type_Name FROM manage_type WHERE ID_Type = '$ID') ";
        // mysqli_query($mysqli,$sql_update1);
        // header('Location:../../index.php?quanly=Manage_Type');

        $sql_update = "UPDATE app_item  SET app_item.Type_App  = '$Type' 
        WHERE app_item.Type_App IN (SELECT Type_Name FROM manage_type WHERE ID_Type = '$ID') ";
        mysqli_query($mysqli,$sql_update);
        $sql_update1 = "UPDATE manage_type SET manage_type.Type_Name  = '$Type',manage_type.Type_Img = '$Edit_Img' 
        WHERE manage_type.Type_Name IN (SELECT Type_Name FROM manage_type WHERE ID_Type = '$ID') ";
        mysqli_query($mysqli,$sql_update1);
        header('Location:../../index.php?quanly=Manage_Type');
    }

?>
