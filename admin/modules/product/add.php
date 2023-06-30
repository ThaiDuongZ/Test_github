<form method="POST" action="modules/product/edit.php" enctype="multipart/form-data">
    <div class="add__gird">
        <div class="add__header0">
            <!-- <p class="ti-package"></p> -->
            <p class="add__header">Thêm sản phẩm</p>
        </div>
        <div class="add_wrap__sp">
            <div class="add_wrap__sp0">
                <div class="add__code">
                    <div class="add__code--name">Mã sản phẩm</div>
                    <input type="text" class="add__code--code" name="Ma_sp">
                </div>
                <div class="add__name">
                    <div class="add__name--name">Tên sản phẩm</div>
                    <input type="text" class="add__name--code" name="Ten_sp">
                </div>
                <div class="add__name">
                    <div class="add__name--name">Giá sản phẩm</div>
                    <input type="text" class="add__name--code" name="Gia_sp">
                </div>
                <div class="add__name">
                    <div class="add__name--name">Hình ảnh</div>
                    <input type="file" class="add__name--code" name="Img_sp">
                </div>
                <div class="add__name">
                    <div class="add__name--name">Nhóm sản phẩm</div>
                    <input type="text" class="add__name--code" name="Ma_nh_sp">
                </div>
                <div class="add__name">
                    <div class="add__name--name">Nhóm danh mục</div>
                    <!-- <input type="text" class="add__name--code" name="Ma_dm"> -->
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
                <div class="add__name">
                    <div class="add__name--name">Acitve</div>
                    <select name="Active" id="" class="form-select" style="width: 200px">
                        <option value="1">Sử dụng</option>
                        <option value="0">Không sử dụng</option>
                    </select>
                </div>
                <input type="submit" value="Submit" class="btn btn-secondary add__sp" name="Add_sp">
            </div>
            <div class="add_wrap__sp1">
                <div class="add__name">
                    <div class="add__name--name">Tóm tắt</div>
                    <textarea name="Tom_tat" id="" cols="50" rows="3" class="add__name--code"></textarea>
                </div>
                <div class="add__name">
                    <div class="add__name--name">Diễn giải</div>
                    <textarea name="Dien_giai" id="" cols="50" rows="7" class="add__name--code"></textarea>
                </div>
            </div>
        </div>
    </div>
</form>