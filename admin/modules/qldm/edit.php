<?php
    include('../../config/config.php');
    $Ma_dm = $_POST['Ma_dm'];
    $Ten_dm = $_POST['Ten_dm'];
    $Ma_nh = $_POST['Ma_nh'];
    $Active = $_POST['Active'];
    if(isset($_POST['Add_dm'])){
        $Sql_add = "INSERT INTO DM(Ma_dm,Ten_dm,Ma_nh,Active) VALUE ('".$Ma_dm."','".$Ten_dm."','".$Ma_nh."','".$Active."') ";
        $sql_update = "UPDATE DM SET Ngay_ct = (SELECT DATE(NOW())) WHERE Ma_dm = '".$Ma_dm."'";
        mysqli_query($mysqli,$Sql_add);
        mysqli_query($mysqli,$sql_update);
        header('location:../../index.php?admin=qldm&query=add');
    }elseif(isset($_GET['query'])=='delete'){
        $id = $_GET['id'];
        $Sql_delete = "DELETE FROM DM WHERE Ma_dm = '".$id."'";
        mysqli_query($mysqli,$Sql_delete);
        header('location:../../index.php?admin=qldm&query=add');
    }else{
        $id = $_GET['Ma_dm'];
        $sql_update = "UPDATE DM SET Ma_dm = '".$Ma_dm."', Ten_dm = '".$Ten_dm."', Ma_nh = '".$Ma_nh."', Active='".$Active."', Ngay_sua = (SELECT DATE(NOW())) WHERE Ma_dm = '".$id."'";
        mysqli_query($mysqli,$sql_update);
        header('location:../../index.php?admin=qldm&query=add');
    }
?>