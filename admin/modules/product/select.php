<?php
    include('config/config.php');
    $_select = "SELECT * FROM DMSP";
    $_sql_select = mysqli_query($mysqli,$_select);
?>
<form action="modules/product/edit.php" method="GET">
    <div class="add__header0">
        <p class="add__header">Danh sách danh mục</p>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Mã sản phẩm</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Giá sản phẩm</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Mã nhóm sản phẩm</th>
                    <th scope="col">Mã danh mục</th>
                    <th scope="col">Tóm tắt</th>
                    <th scope="col">Active</th>
                    <th scope="col">Quản lý</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($row = mysqli_fetch_array($_sql_select)){
                ?>
                    <tr class="">
                        <td><?php echo $row['Ma_sp'] ?></td>
                        <td><?php echo $row['Ten_sp'] ?></td>
                        <td><?php echo $row['Gia_sp'] ?></td>
                        <td><img src="modules/product/uploads/<?php echo $row['Img_sp'] ?>" alt="" class="img_sp" ></td>
                        <td><?php echo $row['Ma_nh_sp'] ?></td>
                        <td><?php echo $row['Ma_dm'] ?></td>
                        <td><?php echo $row['Tom_tat'] ?></td>
                        <td>
                            <?php  
                            if($row['Active'] = '1'){
                                echo 'Đang sử dụng';
                            }else{
                                echo 'Không sử dụng';
                            }
                            ?>
                        </td>
                        <td>
                            <a name="" id="" class="btn btn-primary" href="modules/product/edit.php?query=delete&id=<?php echo $row['Ma_sp']?>" role="button">DELETE</a>
                            <a name="" id="" class="btn btn-primary" href="index.php?admin=product&query=update&id=<?php echo $row['Ma_sp']?>" role="button">UPDATE</a>
                        </td>
                    </tr>
                <?php
                  }
                ?>
            </tbody>
        </table>
    </div>
    
    

</form>