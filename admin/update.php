<?php
include('layouts/header.php');
?>


<div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title"> Thông Tin Nhà Phát Hành </h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    
                    

                    <div class="row">
                        <div class="col-xl-6 col-sm-6 ">
                            
                            <div class="form-control"> Version: <strong class="text-danger"><?php echo file_get_contents('https://'.$_SERVER['SERVER_NAME'].'/system/version.txt');?></strong> </div><br>
                                                
                            <div class="card">
                                <div class="card-header bg-danger text-white">
                                    <div class="card-widgets">
                                        <a href="javascript:;" data-bs-toggle="reload"><i class="ri-refresh-line"></i></a>
                                        <a data-bs-toggle="collapse" href="#card-collapse3" role="button" aria-expanded="false" aria-controls="card-collapse3"><i class="ri-subtract-line"></i></a>
                                        <a href="#" data-bs-toggle="remove"><i class="ri-close-line"></i></a>
                                    </div>
                                    <h5 class="card-title mb-0"> Thông Tin Nhà Phát Hành </h5>
                                </div>
                                
                                <div id="card-collapse3" class="collapse show">
                                    <div class="card-body">

                                                                                   
                                            <div class="alert alert-purple bg-transparent text-purple" role="alert">
                                                <strong class="text-danger"><p>Author: Tạ Minh Phát</p><p>Facebook: facebook.com/minhphaat.info</p><p>Youtube: youtube.com/@mphatdz</p>
                                               <p>Zalo: 0961154794</p><p>Written/Designed by MinhPhat, v<?php echo file_get_contents('https://'.$_SERVER['SERVER_NAME'].'/system/version.txt');?></p></strong> </div>
                                            

                                    </div>
                                    
                                </div>
                                
                            </div>

                        </div>
                        

                    </div> 

                </div> 

            </div> 

        </div>

<?php include('layouts/footer.php');?>

