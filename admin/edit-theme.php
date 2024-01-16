<?php
include('layouts/header.php');
$danhmuc = $connect->query("SELECT * FROM DanhMuc WHERE id = '".$_GET['theme']."'")->fetch_array();
$theme = $connect->query("SELECT * FROM Products WHERE id = '".$_GET['id']."'")->fetch_array();

if(isset($_GET['delete_server'])){
    $check = $connect->query("SELECT * FROM `Products` WHERE `id` = '".$_GET['delete_server']."'")->fetch_array();
    
    if($_GET['delete_server'] != $check['id']){
        echo swal('ID Máy Chủ Không Hợp Lệ','error');
    } else {
        $inTrue = $connect->query("DELETE FROM `Products` WHERE `id` = '".$_GET['delete_server']."'");
        if($inTrue){
            echo swal('Thao Tác Thành Công','success');
            echo redirect('./giaodien.php');
        } else {
            echo swal('Không Thể Xóa','error');
        }
    }
}
?>



<div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title"> Chỉnh Sửa Giao Diện (<?=inHoaString($theme['name']);?>) </h4>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="header-title"> Chỉnh Sửa Giao Diện </h4>
                                </div>
                                
                                <div class="card-body">
                                    <div class="needs-validation" novalidate="">
                                        
                                        <div class="mb-3">
                                            <label class="form-label" for="name"> Tên Giao Diện </label>
                                            <input type="text" class="form-control" id="name" placeholder="VD: Thiết Kế Shop Bán Nick" value="<?=$theme['name'];?>">
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label class="form-label" for="name"> Mô Tả Giao Diện </label>
                                            <input type="text" class="form-control" id="description" placeholder="Mô Tả Giao Diện" value="<?=$theme['description'];?>">
                                        </div>
                                        
                                        
                                        <div class="mb-3">
                                            <label class="form-label" for="uname"> Hình Ảnh </label>
                                            <input type="text" class="form-control" id="image" placeholder="Link Ảnh" value="<?=$theme['image'];?>">
                                        </div>


                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustomUsername"> Số Tiền </label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="price" placeholder="VD: 100000" value="<?=$theme['price'];?>">
                                            </div>
                                        </div>
                                     
                                        <button class="btn btn-primary" onclick="ThemMayChu()"> Chỉnh Sửa </button>
                                    </div>

                                </div> 
                            </div> 
                        </div> 
                        
                    </div>
                </div> 

            </div> 
        </div>
        
        <script>
            function ThemMayChu(){
                  $.ajax({
                    url: "/admin/ajaxs/thietkeweb.php",
                    method: "POST",
                    data: {
                        type: 'edit_theme',
                        name: $("#name").val(),
                        description: $("#description").val(),
                        image: $("#image").val(),
                        price: $("#price").val(),
                        id: '<?=$_GET['id'];?>'
                    },
                    success: function(response) {
                       $("#msg").html(response);
                       console.log(response);
                    }
                });
            }
        </script>
        
<?php
include('layouts/footer.php');
?>