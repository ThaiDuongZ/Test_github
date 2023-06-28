<?php
    include('config/config.php');
    $_select = "SELECT * FROM DM";
    $_sql_select = mysqli_query($mysqli,$_select);
?>
<form method="GET" action="modules/qldm/edit.php">
    <div class="add__gird">
        <div class="add__header0">
            <!-- <p class="ti-package"></p> -->
            <p class="add__header">Danh sách danh mục</p>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã danh mục</th>
                    <th>Tên danh mục</th>
                    <th>Mã nhóm</th>
                    <th>Ngày sửa gần nhất</th>
                    <th>Active</th>
                    <th>Quản lý</th>
                </tr>
            </thead>

            <?php
                $i = 0;
                while($row = mysqli_fetch_array($_sql_select)){     
                    $i++
                        
            ?>
            <tbody>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $row['Ma_dm'] ?></td>
                    <td><?php echo $row['Ten_dm'] ?></td>
                    <td><?php echo $row['Ma_nh'] ?></td>
                    <td>
                        <?php
                            if($row['Ngay_sua'] == '1900-01-01'){
                                echo $row['Ngay_ct'];
                            }else{
                                echo $row['Ngay_sua'];
                            }
                        ?>
                    </td>
                    <td>
                        <?php
                            if($row['Active'] == '1'){
                                echo 'Đang sử dụng';
                            }else{
                                echo 'Không sử dụng';
                            }
                        ?>
                    </td>
                    <td><a href="modules/qldm/edit.php?query=delete&id=<?php echo $row['Ma_dm']?>">Xóa danh mục</a> | <a href="index.php?admin=qldm&query=update&id=<?php echo $row['Ma_dm']?>">Sửa danh mục</a></td>
                </tr>

            </tbody>

            <?php
                }
            ?>
        </table>
    </div>
</form>
