<?php
    include('config/config.php');
    // Đếm số danh mục
    $_count_Ma_dm = "SELECT COUNT(Ma_dm) AS Sl_dm FROM DM";
    $_sql_count_Ma_dm = mysqli_query($mysqli,$_count_Ma_dm);
    // Đếm số danh mục đang sửa dụng
    $_count_Active = "SELECT COUNT(Active) AS Sl_active FROM DM WHERE Active = '1'";
    $_sql_count_Active = mysqli_query($mysqli,$_count_Active);
    // Lấy ngày thêm danh mục gần nhất
    $_count_Ngay_ct = "SELECT Ngay_ct, Ten_dm FROM DM ORDER BY Ngay_ct DESC LIMIT 1";
    $_sql_count_Ngay_ct = mysqli_query($mysqli,$_count_Ngay_ct);
    // Lấy ngày sửa danh mục gần nhất
    $_count_Ngay_sua = "SELECT Ngay_sua, Ten_dm FROM DM ORDER BY Ngay_sua DESC LIMIT 1";
    $_sql_count_Ngay_sua = mysqli_query($mysqli,$_count_Ngay_sua);
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
                        <option value="1">Sử dụng</option>
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
                <?php
                    while($row = mysqli_fetch_array($_sql_count_Active)){                
                ?>
                <div class="add__code--name_count"> Số lượng danh mục đang sử dụng : <?php echo $row['Sl_active'] ?></div>
                <?php
                    }
                ?>
                <?php
                    while($row = mysqli_fetch_array($_sql_count_Ngay_ct)){                
                ?>
                <div class="add__code--name_count"> Ngày tạo danh mục gần nhất : <?php echo $row['Ngay_ct']?> - <?php echo $row['Ten_dm'] ?></div>
                <?php
                    }
                ?>
                <?php
                    while($row = mysqli_fetch_array($_sql_count_Ngay_sua)){                
                ?>
                <div class="add__code--name_count"> Ngày sửa danh mục gần nhất : <?php echo $row['Ngay_sua']?> - <?php echo $row['Ten_dm'] ?></div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
</form>