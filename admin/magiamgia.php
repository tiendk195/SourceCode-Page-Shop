<?php
include('layouts/header.php');
?>


<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title"> Mã Giảm Giá </h4>
                    </div>
                </div>
            </div>
                    
                    <div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4 class="header-title"> Thêm Mã Giảm Giá </h4>
            </div>

            <div class="card-body">
                <div class="needs-validation" novalidate="">
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label" for="name"> Mã </label>
                                <input type="text" class="form-control" id="code" placeholder="Nếu để trống hệ thống tự random mã">
                            </div>
                            
                            <div class="col-6">
                                <label class="form-label" for="name"> Loại Giảm </label>
                                <select class="form-control" id="type" onchange="changMore()">
                                    <option value=""> Vui Lòng Chọn </option>
                                    <option value="tien"> Giảm Tiền </option>
                                    <option value="phantram"> Giảm Phần Trăm </option>
                                </select>
                            </div>
                            
                            <div id="more_option"></div>
                            <br>
                            
                            <div class="col-12">
                                <label class="form-label" for="name"> Giới Hạn Dùng </label>
                                <input type="text" class="form-control" id="gioihan" placeholder="Tối thiểu 1 lượt">
                            </div>
                            
                        </div>
                    </div>

                    <button class="btn btn-primary" onclick="ThemMayChu()"> Thêm Mã Giảm Giá  </button>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title"> Danh Sách Mã </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-dark mb-0">
                            <thead>
                                <tr>
                                    <th> ID </th>
                                    <th> Mã </th>
                                    <th> Mệnh Giá </th>
                                    <th> Đã Dùng / Giới Hạn </th>
                                    <th> Loại Giảm Giá </th>
                                    <th> Thao Tác </th>
                                </tr>
                            </thead>
                            <tbody>                    
                            <?php
                                $query = $connect->query("SELECT * FROM MaGiamGia");
                                foreach($query as $row){
                                    $id+=1;
                                ?>
                                
                                <tr>
                                    <td> #<?=Monney($id);?></td>
                                    <td> <?=$row['code'];?></td>
                                    <td> <?php if($row['loai'] == 'tien'){ echo Monney($row['amount']).'<sup>đ</sup>'; } else if($row['loai'] == 'phantram'){ echo $row['amount'].'%'; }; ?> </td>
                                    <td> <?=$row['luotdung'];?> / <?=$row['gioihan'];?> </td>
                                    <td> <?php if($row['loai'] == 'tien'){ echo 'Giảm Tiền'; } else if($row['loai'] == 'phantram'){ echo 'Phần Trăm'; }; ?> </td>
                                    <td>
                                        <button onclick="delete_data(<?=$row['id'];?>)" class="btn btn-danger"> Xóa </button>
                                    </td>
                                </tr>
                                
                                <?php }  ?>
                                
                            </tbody>
                        </table>
                    </div> <!-- end table-responsive-->

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div>
                        
</div>


                </div> 

            </div> 
        </div>
        
        <script>
        
        function changMore(){
            const type = document.getElementById("type").value;
            if(type == 'tien'){
                document.getElementById('more_option').innerHTML = `<div class="col-6">
                                <label class="form-label" for="name"> Số Tiền Giảm </label>
                                <input type="text" class="form-control" id="amount" placeholder="VD: 10000">
                            </div>`;
            } else if(type == 'phantram'){
                document.getElementById('more_option').innerHTML = `<div class="col-6">
                                <label class="form-label" for="name"> Phần Trăm Giảm </label>
                                <input type="text" class="form-control" id="amount" placeholder="VD: 10">
                            </div>`;
            } else {
                document.getElementById('more_option').innerHTML = '';
            }
        }
        
          function delete_data(id){
                swal({
                  title: "Xác nhận?",
                  text: "Bạn có chắc chắn muốn xóa mã này?",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                    window.location.href="?delete_server=" + id;
                  }
                });
            }
            
            
            function ThemMayChu(){
                  $.ajax({
                    url: "/admin/ajaxs/magiamgia.php",
                    method: "POST",
                    data: {
                        code: $("#code").val(),
                        amount: $("#amount").val(),
                        type: $("#type").val(),
                        gioihan: $("#gioihan").val(),
                    },
                    success: function(response) {
                       $("#msg").html(response);
                       console.log(response);
                    }
                });
            }
        </script>
        
<?php

if(isset($_GET['delete_server'])){
    $inTrue = $connect->query("DELETE FROM `MaGiamGia` WHERE `id` = '".$_GET['delete_server']."'");
    if($inTrue){
        echo swal('Thao tác thành công','success');
        echo redirect('?');
    } else {
        echo swal('Thao tác thất bại','error');
    }
}

include('layouts/footer.php');
?>