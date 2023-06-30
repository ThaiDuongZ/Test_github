<?php
    include('config/config.php');
    $sql_update = "SELECT * FROM DMSP WHERE Ma_sp = '".$_GET['id']."'";
    $query_sql_update = mysqli_query($mysqli,$sql_update);
?>

<form method="POST" action="modules/product/edit.php?Ma_sp=<?php echo $_GET['id'] ?>" enctype="multipart/form-data">
    <?php
        while($_row = mysqli_fetch_array($query_sql_update)){ 
    ?>
    <div class="warpper">
        <div class="add__gird">
            <div class="add__header0">
                <!-- <p class="ti-package"></p> -->
                <p class="add__header">Sửa sản phẩm</p>
            </div>
            <div class="wrap_sp">
                <div class="add_wrap5">
                    <div class="add__code">
                        <div class="add__code--name">Mã sản phẩm</div>
                        <input type="text" class="add__code--code" name="Ma_sp" value="<?php echo $_row['Ma_sp'] ?>">
                    </div>
                    <div class="add__name">
                        <div class="add__name--name">Tên sản phẩm</div>
                        <input type="text" class="add__name--code" name="Ten_sp" value="<?php echo $_row['Ten_sp'] ?>">
                    </div>
                    <div class="add__name">
                        <div class="add__name--name">Giá sản phẩm</div>
                        <input type="text" class="add__name--code" name="Gia_sp" value="<?php echo $_row['Gia_sp'] ?>">
                    </div>
                    <div class="add__code">
                        <div class="add__code--name">Hình ảnh</div>
                        <input type="file" class="add__code--code" name="Img_sp">
                    </div>
                    <div class="add__name">
                        <div class="add__name--name">Nhóm sản phẩm</div>
                        <input type="text" class="add__name--code" name="Ma_nh_sp" value="<?php echo $_row['Ma_nh_sp'] ?>">
                    </div>
                    <div class="add__name">
                        <div class="add__name--name">Nhóm danh mục</div>
                        <select name="Ma_dm" id="" class="form-select" style="width: 200px">
                            <?php
                                include('config/config.php');
                                $_select = "SELECT * FROM DM";
                                $_sql_select = mysqli_query($mysqli,$_select);

                                while($row = mysqli_fetch_array($_sql_select)){
                            ?>
                                
                                    <option value="<?php echo $row['Ma_dm'] ?>"><?php echo $row['Ten_dm'] ?></option>
                                
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="add_wrap__sp1">
                        <div class="add__name">
                            <div class="add__name--name">Tóm tắt</div>
                            <textarea name="Tom_tat" id="" cols="50" rows="3" class="add__name--code"><?php echo $_row['Tom_tat'] ?></textarea>
                        </div>
                        <div class="add__name">
                            <div class="add__name--name">Diễn giải</div>
                            <textarea name="Dien_giai" id="" cols="50" rows="7" class="add__name--code"><?php echo $_row['Dien_giai'] ?></textarea>
                        </div>
                    </div>
                    <div class="add__name">
                        <div class="add__name--name" >Acitve</div>
                        <?php
                            if($_row['Active'] == '1'){
                        ?>
                            <select name="Active" id="" class="form-select" style="width: 200px">
                                <option value="1">Sử dụng</option>
                                <option value="0">Không sử dụng</option>
                            </select>
                        <?php
                            }else{
                        ?>
                            <select name="Active" id="" class="form-select" style="width: 200px">
                                <option value="0">Không sử dụng</option>
                                <option value="1">Sử dụng</option>
                            </select>
                        <?php     
                            }
                        ?>
                    </div>
                    <input type="submit" value="Submit" class="btn btn-secondary add__dm" name="Update_dm">
                    <a style="background-color: #838383; margin-left: 200px;border-color: #838383" class="btn btn-primary add__dm" href="index.php?admin=product&query=add" role="button">Back</a>
                </div>
                <div class="add_wrap6">
                    <img src="modules/product/uploads/<?php echo $_row['Img_sp'] ?>" height="400px" width="auto" >
                </div>
            </div>
        </div>
    </div>
    <?php
         }
    ?>

</form>
