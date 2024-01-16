<?php
include('layouts/header.php');
$query = $connect->query("SELECT * FROM MauLogo WHERE id = '".$_GET['id']."'")->fetch_array();

if($_GET['id'] != $query['id']){
    echo redirect('./mau_logo.php');
}
?>


<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title"> Thêm Mẫu Logo </h4>
                    </div>
                    
                    <a href="./mau_logo.php" class="btn btn-danger"> Quay Lại </a><br><br>
                </div>
            </div>
                    
                    <div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4 class="header-title"> Thông Tin Logo </h4>
            </div>

            <div class="card-body">
                <div class="needs-validation" novalidate="">
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label" for="name"> Tên Mẫu </label>
                                <input type="text" class="form-control" id="name" placeholder="" value="<?=$query['name'];?>">
                            </div>
                            
                            <div class="col-6">
                                <label class="form-label" for="name"> Giá Bán </label>
                                <input type="text" class="form-control" id="price" placeholder="" value="<?=$query['price'];?>">
                            </div>

                            <div class="col-6">
                                <label class="form-label" for="uname"> Ảnh </label>
                                <input type="file" id="uploadInput" accept="image/*" class="form-control"><br>
                                <input type="text" id="image" class="form-control" placeholder="Link Ảnh" value="<?=$query['image'];?>">
                                <div id="message"></div>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary" onclick="ThemMayChu()"> Thêm Mẫu Logo </button>
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
                    url: "/admin/ajaxs/logo.php",
                    method: "POST",
                    data: {
                        type: 'edit_logo',
                        name: $("#name").val(),
                        price: $("#price").val(),
                        image: $("#image").val(),
                        id: <?=$query['id'];?>
                    },
                    success: function(response) {
                       $("#msg").html(response);
                       console.log(response);
                    }
                });
            }
        
        const uploadInput = document.getElementById('uploadInput');
            const shortenedUrlInput = document.getElementById('image');
         
            uploadInput.addEventListener('change', function (event) {
                const file = event.target.files[0];
                
                if (file) {
                    const formData = new FormData();
                    formData.append('image', file);
                    
                    const clientId = '815cf287c84b97c';
                    
                    fetch('https://api.imgur.com/3/image', {
                        method: 'POST',
                        headers: {
                            'Authorization': `Client-ID ${clientId}`,
                        },
                        body: formData,
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.data.link) {
                            document.getElementById('message').innerHTML = '<br><p class="text-success"> Ảnh đã được xử lí thành công </p>';
                            shortenedUrlInput.value = data.data.link;
                        }
                    })
                    
                    document.getElementById('message').innerHTML = '<br><b style="color: red;"> Ảnh đang được xử lí, vui lòng chờ </b>';
                }
            });
        </script>
        
<?php

if(isset($_GET['delete_server'])){
    $inTrue = $connect->query("DELETE FROM `MauLogo` WHERE `id` = '".$_GET['delete_server']."'");
    if($inTrue){
        echo swal('Thao tác thành công','success');
        echo redirect('?');
    } else {
        echo swal('Thao tác thất bại','error');
    }
}

include('layouts/footer.php');
?>