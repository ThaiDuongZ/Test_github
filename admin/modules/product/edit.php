<?php
    include('../../config/config.php');
    $Ma_sp = $_POST['Ma_sp'];
    $Ten_sp = $_POST['Ten_sp'];
    $Gia_sp = $_POST['Gia_sp'];
    $Img_sp = $_FILES['Img_sp']['name'];
    $Img_sp_tmp = $_FILES['Img_sp']['tmp_name'];
    $Tom_tat = $_POST['Tom_tat'];
    $Dien_giai = $_POST['Dien_giai'];
    $Ma_nh_sp = $_POST['Ma_nh_sp'];
    $Ma_dm = $_POST['Ma_dm'];
    $Active = $_POST['Active'];
    //Xử lý hình ảnh
    if(isset($_POST['Add_sp'])){
        $Sql_add = "INSERT INTO DMSP(Ma_sp,Ten_sp,Gia_sp,Img_sp,Tom_tat,Dien_giai,Ma_nh_sp,Ma_dm,Active) 
        VALUE ('".$Ma_sp."','".$Ten_sp."','".$Gia_sp."','".$Img_sp."','".$Tom_tat."','".$Dien_giai."','".$Ma_nh_sp."','".$Ma_dm."','".$Active."') ";
        mysqli_query($mysqli,$Sql_add);
        move_uploaded_file($Img_sp_tmp,'uploads/'.$Img_sp);
        header('location:../../index.php?admin=product&query=add');
    }elseif(isset($_GET['query'])=='delete'){
        $id = $_GET['id'];
        $delete_img = "SELECT * FROM DMSP WHERE Ma_sp = '".$id."' LIMIT 1";
        $sql_dete_img=mysqli_query($mysqli,$delete_img);
        while($row = mysqli_fetch_array($sql_dete_img)){
            unlink('uploads/'.$row['Img_sp']);
        }
        $Sql_delete = "DELETE FROM DMSP WHERE Ma_sp = '".$id."'";
        mysqli_query($mysqli,$Sql_delete);
        header('location:../../index.php?admin=product&query=add');
    }else{
        $id = $_GET['Ma_sp'];
        if($Img_sp != ''){
            move_uploaded_file($Img_sp_tmp,'uploads/'.$Img_sp);
            $delete_img = "SELECT * FROM DMSP WHERE Ma_sp = '".$id."' LIMIT 1";
            $sql_dete_img=mysqli_query($mysqli,$delete_img);
            while($row = mysqli_fetch_array($sql_dete_img)){
            unlink('uploads/'.$row['Img_sp']);
            }
            $sql_update = "UPDATE DMSP SET Ma_sp = '".$Ma_sp."', Ten_sp = '".$Ten_sp."', Gia_sp = '".$Gia_sp."', Tom_tat='".$Tom_tat."'
            ,Dien_giai = '".$Dien_giai."',Ma_nh_sp = '".$Ma_dm."',Ma_dm = '".$Ma_dm."',Active = '".$Active."',Img_sp = '".$Img_sp."'
            WHERE Ma_sp = '".$id."'";
        }else{
            $sql_update = "UPDATE DMSP SET Ma_sp = '".$Ma_sp."', Ten_sp = '".$Ten_sp."', Gia_sp = '".$Gia_sp."', Tom_tat='".$Tom_tat."'
            ,Dien_giai = '".$Dien_giai."',Ma_nh_sp = '".$Ma_dm."',Ma_dm = '".$Ma_dm."',Active = '".$Active."'
            WHERE Ma_sp = '".$id."'";
        }       
        mysqli_query($mysqli,$sql_update);
        header('location:../../index.php?admin=product&query=add');
    }
?>