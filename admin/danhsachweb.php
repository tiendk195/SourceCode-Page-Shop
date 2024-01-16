<?php
include('layouts/header.php');
?>


<div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title"> Danh Sách Trang Web </h4>
                            </div>
                        </div>
                    </div>
                    
                   <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive-sm">
                                        <table class="table table-centered mb-0">
                                            <thead>
                                                <tr>
                                                    <th> ID </th>
                                                    <th> Người Mua </th>
                                                    <th> Tên Miền </th>
                                                    <th> Thông Tin Quản Trị </th>
                                                    <th> Giao Diện </th>
                                                    <th> Thời Gian Mua </th>
                                                    <th> Thời Gian Hết Hạn </th>
                                                    <th> Trạng Thái </th>
                                                    <th> Hành Động </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                <?php
                                                    $query = $connect->query("SELECT * FROM DanhSachWeb");
                                                    foreach($query as $row){
                                                        $theme = $connect->query("SELECT * FROM Products WHERE id = '".$row['theme']."'")->fetch_array();
                                                ?>
                                                
                                                <tr>
                                                    <td> #<?=$row['id'];?></td>
                                                    <td><?=$row['username'];?></td>
                                                    <td><a href="//<?=$row['domain'];?>"><?=$row['domain'];?></a></td>
                                                    <td><?=$row['taikhoan'];?>|<?=$row['matkhau'];?></td>
                                                    <td> <a href="/taoweb-<?=$theme['id'];?>" target="_blank" class="text-primary"> <?=$theme['name'];?> </a></td>
                                                    <td><?=ToTime($row['time']);?></td>
                                                    <td><?=ToTime($row['orvertime']);?></td>
                                                    <td><?=StatusShop($row['status']);?></td>
                                                    <td> <a onclick="loadDomain(<?=$row['id'];?>)" data-bs-toggle="modal" data-bs-target="#info-header-modal" class="btn btn-info"> Chi Tiết </a> </td>
                                                </tr>
            
                                            <?php } ?>
                                            
                                            </tbody>
                                        </table>
                                    </div>
                                
                                </div>   
                                
                            </div>
                        
                        </div>
                     
                    </div>
                    
                    
                </div> 

            </div> 
        </div>
        
        
        <?php
        if(isset($_POST['id']) && isset($_POST['domain'])){
        ?>
        
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                loadDomain(<?=$_POST['id'];?>);
            });
            
            $(document).ready(function(){
                $("#info-header-modal").modal('show');
            });
        </script>
        
        <?php } ?>
        
        <div id="info-header-modal" class="modal fade" tabindex="-1" aria-labelledby="info-header-modalLabel" aria-modal="true" role="dialog">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header modal-colored-header bg-info">
                                <h4 class="modal-title" id="info-header-modalLabel"> Chi Tiết Tên Miền </h4>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" id="error_response">
                                <div class="form-control"> Tên Miền: <strong class="text-info" id="domain"></strong></div><br>
                                <div class="form-control"> Chủ Sở Hữu: <strong class="text-dark" id="username"></strong></div><br>
                                <div class="form-control"> Giao Diện: <strong class="text-dark" id="theme"></strong></div><br>
                                <div class="form-control"> Tài Khoản / Mật Khẩu: <br> <strong id="taikhoan"></strong> / <strong id="matkhau"></strong></div><br>
                                <div class="form-control"> Ngày Hết Hạn: <strong class="text-dark" id="time"></strong></div><br>

                                <div class="row">
                                <div class="col-6">
                                <label class="form-label" for="validationCustomUsername"> Cập Nhật Trạng Thái </label>
                                <div class="input-group">
                                    <select class="form-control" id="status_select">
                                        
                                    </select>
                                </div>
                            </div>
                            
                            
                            <div class="col-6">
                                <label class="form-label" for="validationCustomUsername"> Ghi Chú </label>
                                <div class="input-group">
                                    <input id="ghichu" class="form-control" placeholder="Viết ghi chú cho khách hàng đọc (nếu có)">
                                </div>
                            </div>
                            </div>
                            
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal"> Đóng </button>
                                <button type="button" onclick="delete_hehe()" class="btn btn-danger">  Xóa Trang  </button>
                                <button type="button" onclick="Update_Domain()" class="btn btn-info"> Cập Nhật </button>
                            </div>
                        </div>
                    </div>
                </div>

        
        <script>
            function loadDomain(id){
                document.getElementById("id").value = id;
                
                  $.ajax({
                    url: "/admin/ajaxs/thietkeweb.php",
                    method: "POST",
                    data: {
                        type: 'load_info',
                        id: id,
                    },
                    success: function(response) {
                       var data = JSON.parse(response);
                       
                       if(data.status == 'error'){
                           document.getElementById("error_response").innerHTML = '<strong class="text-danger"> ' + data.message + ' </strong>';
                       } else {
                           
                            if (data.dmmm == 0) {
                              document.getElementById("status_select").innerHTML = `<option value="0" selected> Đang Xử Lí </option>
                                           <option value="1"> Hoạt Động </option>
                                           <option value="2"> Chờ Gia Hạn </option>
                                           <option value="3"> Hết Hạn </option>
                                           <option value="4"> Hủy </option>`;
                            } else if (data.dmmm == 1) {
                              document.getElementById("status_select").innerHTML = `<option value="0"> Đang Xử Lí </option>
                                           <option value="1" selected> Hoạt Động </option>
                                           <option value="2"> Chờ Gia Hạn </option>
                                           <option value="3"> Hết Hạn </option>
                                           <option value="4"> Hủy </option>`;
                            } else if (data.dmmm == 2) {
                              document.getElementById("status_select").innerHTML = `<option value="0"> Đang Xử Lí </option>
                                           <option value="1"> Hoạt Động </option>
                                           <option value="2" selected> Chờ Gia Hạn </option>
                                           <option value="3"> Hết Hạn </option>
                                           <option value="4"> Hủy </option>`;
                            } else if (data.dmmm == 3) {
                              document.getElementById("status_select").innerHTML = `<option value="0"> Đang Xử Lí </option>
                                           <option value="1"> Hoạt Động </option>
                                           <option value="2"> Chờ Gia Hạn </option>
                                           <option value="3" selected> Hết Hạn </option>
                                           <option value="4"> Hủy </option>`;
                            } else if (data.dmmm == 4) {
                               document.getElementById("status_select").innerHTML = `<option value="0"> Đang Xử Lí </option>
                                           <option value="1"> Hoạt Động </option>
                                           <option value="2"> Chờ Gia Hạn </option>
                                           <option value="3"> Hết Hạn </option>
                                           <option value="4" selected> Hủy </option>`;
                            } else {
                               document.getElementById("status_select").innerHTML =  `<option disabled> Không thể tải dữ liệu </option>`;
                            }
                            
                            
                           document.getElementById("domain").innerHTML = data.domain;
                           document.getElementById("ghichu").value = data.note;
                           document.getElementById("username").innerHTML = data.username;
                           document.getElementById("theme").innerHTML = '<a href="/taoweb-' + data.theme + '" target="_blank"> ' + data.theme + ' (Click Để Xem) </a>';
                           document.getElementById("taikhoan").innerHTML = data.taikhoan;
                           document.getElementById("matkhau").innerHTML = data.matkhau;
                           document.getElementById("time").innerHTML = data.orvertime;
                           document.getElementById("orvertime").innerHTML = data.orvertime;
                       }
                    }
                });
            }
            
            function Update_Domain(id){
                  $.ajax({
                    url: "/admin/ajaxs/thietkeweb.php",
                    method: "POST",
                    data: {
                        type: 'update_web',
                        id: $("#id").val(),
                        note: $("#ghichu").val(),
                        status: $("#status_select").val(),
                    },
                    success: function(response) {
                        $("#msg").html(response);
                        console.log(response);
                    }
                });
            }
            
            
            function delete_hehe(){
                var id = document.getElementById("id").value;
                swal({
                  title: "Xác nhận?",
                  text: "Bạn có chắc chắn muốn xóa dịch vụ này?",
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

        </script>
        
        <input type="hidden" id="id"><input type="hidden" id="name"><input type="hidden" id="username2">
<?php

if(isset($_GET['delete_server'])){
    $inTrue = $connect->query("DELETE FROM `DanhSachWeb` WHERE `id` = '".$_GET['delete_server']."'");
    if($inTrue){
        $connect->query("DELETE FROM `DanhSachWeb` WHERE `id` = '".$check['id']."'");
        echo swal('Xóa thành công','success');
        echo redirect('?');
    } else {
        echo swal('Không Thể Xóa','error');
    }
}
include('layouts/footer.php');
?>