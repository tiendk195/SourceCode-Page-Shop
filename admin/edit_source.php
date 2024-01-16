<?php
include('layouts/header.php');
$query = $connect->query("SELECT * FROM SourceCode WHERE id = '".$_GET['id']."'")->fetch_array();

if($_GET['id'] != $query['id']){
    echo redirect('./sourcecode.php');
}
?>


<div class="content-page">
            <div class="content">
                <div class="container-fluid">

                    <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title"> Chỉnh Sửa Code </h4>
                                </div> 
                                <a href="./sourcecode.php" class="btn btn-danger"> Quay Lại</a><br><br>
                            </div>
                        </div>
                        
                        <br>
                        

            
                        <div class="row"> 
                        
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="header-title"> Thông Tin Source Code </h4>
                                </div>
                                
                                
                                <div class="card-body">
                                    <div class="needs-validation" novalidate="">
                                        
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom01"> Tên Code </label>
                                            <input type="text" class="form-control" id="name" placeholder="Tên Code" value="<?=$query['name'];?>">
                                        </div>
                                        
                                        
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom01"> Mô Tả </label>
                                            <input type="text" class="form-control" id="description" placeholder="Mô Tả" value="<?=$query['description'];?>">
                                        </div>
                                        
                                        
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom01"> Giá Bán </label>
                                            <input type="number" class="form-control" id="price" placeholder="10000" value="<?=$query['price'];?>">
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom01"> Link Code </label>
                                            <input type="text" class="form-control" id="linkcode" placeholder="Tên Code" value="<?=$query['code'];?>">
                                        </div>
                                        
                                        
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom01"> Ảnh Mô Tả </label>
                                            <input type="text" class="form-control" id="image" placeholder="Link Ảnh" value="<?=$query['image'];?>">
                                        </div>

                                        <button class="btn btn-primary" onclick="onclickSubmit()"> Cập Nhật </button>
                                    </div>

                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div>
                    
                        
                    </div>
                    
                    
                    
                </div> 

            </div>

        </div>
        
        <script>

            function onclickSubmit(){
                  $.ajax({
                    url: "/admin/ajaxs/source.php",
                    method: "POST",
                    data: {
                        type: 'edit_code',
                        name: $("#name").val(),
                        description: $("#description").val(),
                        image: $("#image").val(),
                        price: $("#price").val(),
                        code: $("#linkcode").val(),
                        id: <?=$query['id'];?>
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