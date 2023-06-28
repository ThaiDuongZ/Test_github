<?php
    include('config/config.php');
    // Đếm số danh mục
    $_count_Ma_dm = "SELECT COUNT(Ma_dm) AS Sl_dm FROM DM";
    $_sql_count_Ma_dm = mysqli_query($mysqli,$_count_Ma_dm);
    // Đếm số danh mục đang sửa dụng
    // $_count_Ma_dm = "SELECT COUNT(Ma_dm) AS Sl_dm FROM DM";
    // $_sql_count_Ma_dm = mysqli_query($mysqli,$_count_Ma_dm);
?>
<form method="POST" action="modules/qldm/edit.php">
    <div class="add__gird">
        <div class="add__header0">
            <!-- <p class="ti-package"></p> -->
            <p class="add__header">Thêm danh mục</p>
        </div>
        <div class="add_wrap">
            <div class="add_wrap0">
                <div class="add__code">
                    <div class="add__code--name">Mã danh mục</div>
                    <input type="text" class="add__code--code" name="Ma_dm">
                </div>
                <div class="add__name">
                    <div class="add__name--name">Tên danh mục</div>
                    <input type="text" class="add__name--code" name="Ten_dm">
                </div>
                <div class="add__name">
                    <div class="add__name--name">Nhóm danh mục</div>
                    <input type="text" class="add__name--code" name="Ma_nh">
                </div>
                <div class="add__name">
                    <div class="add__name--name">Acitve</div>
                    <select name="Active" id="" class="form-select" style="width: 200px">
                        <option value="1">Sử dựng</option>
                        <option value="0">Không sử dụng</option>
                    </select>
                </div>
                <input type="submit" value="Submit" class="btn btn-secondary add__dm" name="Add_dm">
            </div>
            <div class="add_wrap1">
                <?php
                    while($row = mysqli_fetch_array($_sql_count_Ma_dm)){                
                ?>
                <div class="add__code--name_count"> Số lượng danh mục hiện tại : <?php echo $row['Sl_dm'] ?></div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
</form>