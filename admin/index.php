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
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                            <li class="breadcrumb-item active"> Thống kê!</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title"> Thống kê</h4>
                                </div>
                            </div>
                        </div>
                        
                        <?php
                        if(time() - $system32['date_cron'] >= 3600){
                            ?>
                            
                            
                         <div id="error_cron" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-modal="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header modal-colored-header bg-danger">
                                        <h4 class="modal-title" id="danger-header-modalLabel"> Thông Báo </h4>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h5 class="mt-0"> Xin Chào, Tạ Minh Phát Admin Đẹp Trai Số 1 Thế Giới =)) 
                                         </h5>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> Đóng </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <script>
                            $(document).ready(function () {
                                $('#error_cron').modal('show');
                            });
                        </script>



                            <?php
                        }
                        ?>
    
                    
                    <div class="row">
                        
                    <?=file_get_contents('https://updates.cyberlux.vn/taowebgame/getData.php?type=message_home');?>
                   
                    <?php
                    $query = $connect->query("SELECT * FROM DanhSachWeb WHERE status = '0'");
                    $numRows = $query->num_rows;
                    
                    $logoQuery = $connect->query("SELECT * FROM DanhSachLogo WHERE status = '0'");
                    $numRows2 = $logoQuery->num_rows;
                    ?>
                    
                    <?php if($numRows >= 1){ ?>            
                
                        
                          <?php
                           foreach ($query as $row){
                               $id+=1;
                           ?>
                           
                           <div class="col-xl-4 col-sm-12">
                                           
                            <div class="alert alert-dark text-bg-dark border-0" role="alert">
                                    <strong> Thông Báo: </strong> Có Đơn Tạo Trang Web Cần Xử Lí: <a style="color: lightblue;" href="#" onclick="redirectDomain('<?=$row['domain'];?>', <?=$row['id'];?>)">Click Để Xem</a>
                                </div>
                                             
                        </div>
                                <?php } } ?>
                                
                                
                                
                            <?php if($numRows2 >= 1){ ?>            
                
                        
                          <?php
                           foreach ($logoQuery as $row2){
                               $id+=1;
                           ?>
                           
                           <div class="col-xl-4 col-sm-12">
                                           
                            <div class="alert alert-dark text-bg-dark border-0" role="alert">
                                    <strong> Thông Báo: </strong> Có Đơn Tạo Logo Cần Xử Lí: <a style="color: lightblue;" href="#" onclick="redirectLogo(<?=$row2['id'];?>)"> Click Để Xem </a>
                                </div>
                                             
                        </div>
                                <?php } } ?>
                                
                   
                        
                        
                        </div>
                        
                        
                        <script>
                            function redirectDomain(domain, id){
                                document.getElementById("domain").value = domain;
                                document.getElementById("id").value = id;
                                
                                document.getElementById("submitInfo").submit();
                            }
                            
                            function redirectLogo(id){
                                document.getElementById("id2").value = id;
                                document.getElementById("submitInfo2").submit();
                            }
                        </script>
                        
                        
                        <form action="/admin/danhsachweb.php" method="post" id="submitInfo"> <input type="hidden" id="id" name="id"><input type="hidden" id="domain" name="domain"> </form>
                        <form action="/admin/danhsach_logo.php" method="post" id="submitInfo2"> <input type="hidden" id="id2" name="id2"></form>
                        
                        
                        <div class="row">
                            <div class="col-xxl-3 col-sm-6">
                                <div class="card widget-flat text-bg-pink">
                                    <div class="card-body">
                                        <div class="float-end">
                                             
                                        </div>
                                        <h6 class="text-uppercase mt-0" title="Customers"> Trang Web Hoạt Động </h6>
                                        <h2 class="my-2"> <?=Monney($cpActive);?> </h2>
                                      
                                    </div>
                                </div>
                            </div> 


                            <div class="col-xxl-3 col-sm-6">
                                <div class="card widget-flat text-bg-purple">
                                    <div class="card-body">
                                        <div class="float-end">
                                            
                                        </div>
                                        <h6 class="text-uppercase mt-0" title="Customers"> Trang Web Chờ Gia Hạn </h6>
                                        <h2 class="my-2"> <?=Monney($cpExpires);?> </h2>
                                      
                                    </div>
                                </div>
                            </div> 

                            <div class="col-xxl-3 col-sm-6">
                                <div class="card widget-flat text-bg-info">
                                    <div class="card-body">
                                        <div class="float-end">
                                            
                                        </div>
                                        <h6 class="text-uppercase mt-0" title="Customers"> Logo Đã Bán </h6>
                                        <h2 class="my-2"><?=Monney($domainList);?></h2>

                                    </div>
                                </div>
                            </div> 

                            <div class="col-xxl-3 col-sm-6">
                                <div class="card widget-flat text-bg-primary">
                                    <div class="card-body">
                                        <div class="float-end">
                                            
                                        </div>
                                        <h6 class="text-uppercase mt-0" title="Customers"> Logo Chờ Xử Lí </h6>
                                        <h2 class="my-2"> <?=Monney($domainPending);?> </h2>

                                    </div>
                                </div>
                            </div> <!-- end col-->
                            
                            
                            
                            
                            
                            <div class="col-xxl-3 col-sm-6">
                                <div class="card widget-flat text-bg-pink">
                                    <div class="card-body">
                                        <div class="float-end">
                                            
                                        </div>
                                        <h6 class="text-uppercase mt-0" title="Customers"> Tổng Thành Viên </h6>
                                        <h2 class="my-2"> <?=Monney($usersGetAll);?> </h2>

                                    </div>
                                </div>
                            </div> <!-- end col-->

                            <div class="col-xxl-3 col-sm-6">
                                <div class="card widget-flat text-bg-purple">
                                    <div class="card-body">
                                        <div class="float-end">
                                            
                                        </div>
                                        <h6 class="text-uppercase mt-0" title="Customers"> Tiền Thành Viên </h6>
                                        <h2 class="my-2"> <?=Monney($monneyUser);?> <sup>đ</sup></h2>
                                    
                                    </div>
                                </div>
                            </div> <!-- end col-->

                            <div class="col-xxl-3 col-sm-6">
                                <div class="card widget-flat text-bg-info">
                                    <div class="card-body">
                                        <div class="float-end">
                                            
                                        </div>
                                        <h6 class="text-uppercase mt-0" title="Customers"> Doanh Thu Hôm Nay </h6>
                                        <h2 class="my-2"> <?=Monney($doanhThuToday);?>  <sup>đ</sup> </h2>
                                
                                    </div>
                                </div>
                            </div> <!-- end col-->

                            <div class="col-xxl-3 col-sm-6">
                                <div class="card widget-flat text-bg-primary">
                                    <div class="card-body">
                                        <div class="float-end">
                                            
                                        </div>
                                        <h6 class="text-uppercase mt-0" title="Customers"> Tổng Doanh Thu </h6>
                                        <h2 class="my-2"> <?=Monney($tongDoanhThu);?> <sup>đ</sup> </h2>
          
                                    </div>
                                </div>
                            </div> <!-- end col-->
                            
                            
                        </div>

                    </div>

                </div>
           
       
       
<?php
include('layouts/footer.php');
?>