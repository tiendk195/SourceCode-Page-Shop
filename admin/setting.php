<?php
include('layouts/header.php');
?>


<div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title"> Cài Đặt </h4>
                            </div>
                        </div>
                    </div>
                    
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title"> Thông Tin Trang Web </h4>
                </div>
    
                <div class="card-body">
                    <div class="needs-validation" novalidate="">
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label" for="name"> Tiêu Đề </label>
                                    <input type="text" class="form-control" id="title" placeholder="Tiêu Đề" value="<?=$system32['title'];?>">
                                </div>
    
                                <div class="col-6">
                                    <label class="form-label" for="uname"> Mô tả trang web </label>
                                    <input type="text" class="form-control" id="description" placeholder="Mô tả trang web"  value="<?=$system32['description'];?>">
                                </div>
                            </div>
                        </div>
    
                        <div class="mb-3">
                            <div class="row">
    
                                <div class="col-6">
                                    <label class="form-label" for="validationCustomUsername"> Logo </label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="site_name" placeholder=""  value="<?=$system32['sitename'];?>">
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label" for="validationCustomUsername"> Ảnh Mô Tả </label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="image" placeholder=""  value="<?=$system32['image'];?>">
                                    </div>
                                </div>
    
                                <div class="col-6">
                                    <label class="form-label" for="validationCustomUsername"> Shortcut Icon </label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="shortcut_icon" placeholder=""  value="<?=$system32['shortcut_icon'];?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label" for="validationCustomUsername">  Thông Báo Index (Để Trống Để Tắt) </label>
                                    <div class="input-group">
                                        <textarea id="modal_index" class="form-control" rows="4" cols="50"><?=$system32['modal'];?></textarea>
                                    </div>
                                </div>

                            </div>
                        </div>
                        

                        <div class="mb-3">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label" for="validationCustomUsername">  Script (Tùy Chỉnh, Thêm Chat, vv) </label>
                                    <div class="input-group">
                                        <textarea id="script" class="form-control" rows="4" cols="50"><?=$system32['script'];?></textarea>
                                    </div>
                                </div>

                            </div>
                        </div>
    
    
                        <button class="btn btn-primary" onclick="ThemMayChu()"> Cập Nhật </button>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title"> Giao Diện </h4>
                </div>
                
                <div class="container">
                <div class="alert alert-warning alert-dismissible text-bg-danger border-0 fade show" role="alert">
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong> Lưu ý - </strong> Có Thể Một Số Chức Năng Chưa Hoạt Động Ở Phiên Bản Này, Vui Lòng Cập Nhật Phiên Bản Mới Liên Tục Để Sử Dụng Nhé
                    </div></div>
            </div>
        </div>
    </div>
    
    
                    </div> 
    
                </div> 
            </div>
            
            
            <style>
              .giaodien {
                text-align: center;
                padding-top: 12px;
              }
              
              .red_cyberlux {
                  color: red;
              }
            </style>
            

            <script>
                function ThemMayChu(){
                      $.ajax({
                        url: "/admin/ajaxs/system.php",
                        method: "POST",
                        data: {
                            type: 'setting',
                            title: $("#title").val(),
                            description: $("#description").val(),
                            site_name: $("#site_name").val(),
                            support_url: $("#support_url").val(),
                            image: $("#image").val(),
                            shortcut_icon: $("#shortcut_icon").val(),
                            modal_index: $("#modal_index").val(),
                            script: $("#script").val(),
                        },
                        success: function(response) {
                           $("#msg").html(response);
                           console.log(response);
                        }
                    });
                }
                
                function updateSelect(text, key){
                      $.ajax({
                        url: "/admin/ajaxs/system.php",
                        method: "POST",
                        data: {
                            type: 'select_home',
                            theme: key,
                        },
                        success: function(response) {
                          $("#msg").html(response);
                          console.log(response);
                        }
                    });
                }
                
                
                function seletOption(text, key){
                    swal({
                      title: "Xác Nhận",
                      text: "Bạn Có Chắc Muốn Chọn " + text + " Làm Giao Diện Trang Chủ?",
                      icon: "warning",
                      buttons: true,
                      dangerMode: true,
                    })
                    .then((willDelete) => {
                      if (willDelete) {
                        updateSelect(text, key);
                      }
                    });
                }
            </script>
            
<?php
include('layouts/footer.php');
?>