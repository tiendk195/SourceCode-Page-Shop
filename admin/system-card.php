<?php
include('layouts/header.php');
?>


<div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title"> Cài Đặt Nạp Thẻ Tự Động </h4>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4 class="header-title"> Nguồn Thẻ  </h4>
            </div>
            
            <div class="container">
            <div class="alert alert-danger alert-dismissible text-bg-danger border-0 fade show" role="alert">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong> Nguồn Thẻ Mặc Định - </strong> Nguồn Thẻ Mặc Định Được Tích Hợp Qua DOITHE1S.VN, Nên Các Thông Tin API Vui Lòng Tham Khảo Tại DOITHE1S.VN
                </div>
            </div>

            <div class="card-body">
                <div class="needs-validation" novalidate="">
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-6">
                                <label class="form-label" for="name"> Partner_ID </label>
                                <input type="text" class="form-control" id="partner_id" placeholder="Lấy Tại Web Nguồn" value="<?=$system32['partner_id'];?>">
                            </div>

                            <div class="col-6">
                                <label class="form-label" for="uname"> Partner_Key </label>
                                <input type="text" id="partner_key" class="form-control" placeholder="Lấy Tại Web Nguồn Thẻ" value="<?=$system32['partner_key'];?>">
                            </div>
                        </div>
                    </div>
                    

                    <div class="mb-3">
                        <div class="row">
                            <div class="col-12">
                                <strong class="text-dark"> Link Callback: <strong class="text-danger">https://<?=$_SERVER['SERVER_NAME'];?>/api/callback.php</strong></strong>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary" onclick="ThemMayChu()"> Cập Nhật </button>
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
                    url: "/admin/ajaxs/system.php",
                    method: "POST",
                    data: {
                        type: 'card_system',
                        partner_id: $("#partner_id").val(),
                        partner_key: $("#partner_key").val(),
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