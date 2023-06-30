<?php
    if(isset($_GET['admin']) && isset($_GET['query'])){
        $_admin = $_GET['admin'];
        $_query = $_GET['query'];
    }else{
        $_admin = '';
        $_query = '';
    }
    if($_admin=='qldm' && $_query =='add'){
        include('modules/qldm/add.php');
        include('modules/qldm/select.php');
    }elseif($_admin=='qldm' && $_query =='update'){
        include('modules/qldm/update.php');
    }elseif($_admin=='product' && $_query =='add'){
        include('modules/product/add.php');
        include('modules/product/select.php');
    }elseif($_admin=='product' && $_query =='update'){
        include('modules/product/update.php');
    }else{
        include('modules/dashboard.php');
    }
?>