<?php
include('../system/header.php');
$id = $_GET['id'];
$query = $connect->query("SELECT * FROM Hostings WHERE id = '$id' AND username = '".$getUser['username']."'")->fetch_array();
$getName = $connect->query("SELECT * FROM ServerName WHERE uname = '".$query['server']."'")->fetch_array();
$getPack = $connect->query("SELECT * FROM `CpanelPackage` WHERE `package` = '".$query['package']."'")->fetch_array();

if($id != $query['id'] || empty($id)){
    echo redirect('/Service/Hosting');
}

?>

<main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center space-x-4 py-5 lg:py-6">
          <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
            <?=inHoaString($query['domain']);?>
          </h2>
          <div class="hidden h-full py-1 sm:flex">
            <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
          </div>
          <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
            <li class="flex items-center space-x-2">
              <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent" href="#"> Quản Lý Dịch Vụ </a>
              <svg x-ignore="" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
              </svg>
            </li>
            <li> <?=inHoaString($query['domain']);?> </li>
          </ul>
        </div>

        <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
          <div class="col-span-12 lg:col-span-4">
            <div class="card p-4 sm:p-5">
              <ul class="mt-6 space-y-1.5 font-inter font-medium">
                <li>
                  <a class="flex items-center space-x-2 rounded-lg bg-primary px-4 py-2.5 tracking-wide text-white outline-none transition-all dark:bg-accent" <?php if($query['status'] == 1){ ?> onclick="window.open('<?=$getName['hostname'];?>:2083/login/?user=<?=$query['taikhoan'];?>&pass=<?=$query['matkhau'];?>')" <?php } else { ?> onclick="ErrorStatus()" <?php } ?>>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span> Truy Cập Cpanel </span>
                  </a>
                </li>
                <li>
                  <a <?php if($query['status'] == 1){ ?> onclick="changePassword()" <?php } else { ?> onclick="ErrorStatus()" <?php } ?> class="group flex space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                    </svg>

                    <span> Đổi Mật Khẩu </span>
                  </a>
                </li>
                <li>
                  <a <?php if($query['status'] == 1 || $query['status'] == 4){ ?> onclick="giaHan()" <?php } else { ?> onclick="ErrorStatus()" <?php } ?> class="group flex space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                    <span> Gia Hạn </span>
                  </a>
                </li>
                <li>
                  <a <?php if($query['status'] == 1){ ?> onclick="nangcap()" <?php } else { ?> onclick="ErrorStatus()" <?php } ?> class="group flex space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                    <span> Nâng Cấp </span>
                  </a>
                </li>
                
                <li>
                  <a onclick="SwalChamDut()" class="group flex space-x-2 rounded-lg px-4 py-2.5 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                    <span> Hủy Dịch Vụ </span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          
          
          <div class="col-span-12 lg:col-span-8">
            <div class="card">
              <div class="flex flex-col items-center space-y-4 border-b border-slate-200 p-4 dark:border-navy-500 sm:flex-row sm:justify-between sm:space-y-0 sm:px-5">
                <h2 class="text-lg font-medium tracking-wide text-slate-700 dark:text-navy-100">
                  Thông Tin Chi Tiết
                </h2>
              </div>
              
              <div class="p-4 sm:p-5">
                
                <div class="container">
                    <ul><strong> Link Hosting: </strong> <?php if($query['status'] == 0 || $query['status'] == 1){ ?> <a style="color: blue;" href="<?=$getName['hostname'];?>:2083" target="_blank"> <?=$getName['hostname'];?>:2083 </a> <?php } else { echo 'Không Hiển Thị!'; } ?></ul>
                    <ul><strong> Tên Miền: </strong> <a href="https://<?=$query['domain'];?>" style="color: blue;" target="_blank"> https://<?=$query['domain'];?> </a></ul>
                    <ul>
                          <strong> IP: </strong>
                          <span id="ipContent">*******</span>
                          <i id="viewIcon" style="font-size: 20px;" class="far fa-2x fa-eye" onclick="toggleView('ipContent', 'viewIcon', 'ip');"></i>
                        </ul>
                        
                        <ul>
                          <strong> Tài Khoản: </strong>
                          <span id="username">*******</span>
                          <i id="viewUser" style="font-size: 20px;" class="far fa-2x fa-eye" onclick="toggleView('username', 'viewUser', 'username');"></i>
                        </ul>
                        
                        <ul>
                          <strong> Mật Khẩu: </strong>
                          <span id="password">*******</span>
                          <i id="viewPass" style="font-size: 20px;" class="far fa-2x fa-eye" onclick="toggleView('password', 'viewPass', 'password');"></i>
                        </ul>
                        
                        <ul><strong> Nameserver: </strong>  <?php if($query['status'] == 0 || $query['status'] == 1){ ?>  <?=$getName['nameserver1'];?> / <?=$getName['nameserver2'];?> <?php } else { ?> Không Hiển Thị! <?php } ?> </ul>
                        <ul><strong> Ngày Mua: </strong> <?=ToTime($query['time']);?> </ul>
                        <ul><strong> Gói Đang Dùng: </strong> <?=inHoaString($getPack['package']);?> (<?=Monney($getPack['price']);?> <sup>đ</sup>) </ul>
                        <ul><strong> Ngày Hết Hạn: </strong> <?=ToTime($query['orvertime']);?> </ul>
                        <ul><strong> Trạng Thái: </strong> <?=StatusHost($query['status']);?> </ul>
                        
                        <div style="padding-top: 15px; color: red;"><strong class="text-danger"> Ghi Chú: </strong> Khi Hết Hạn Dịch Vụ Sẽ Bị Khóa, Sau 3 Ngày Quý Khách Không Gia Hạn Sẽ Bị Xóa Vĩnh Viễn! </div>
                        
                    <br>
                </div>
          
              </div>
            </div>
          </div>
        </div>
      </main>
      
      
       <?php if($query['status'] == 1){ ?>
        
        <script>
            function changePassword(){
                swal({
                  text: 'Vui lòng Nhập Mật Khẩu Mới".',
                  content: "input",
                  icon: "warning",
                  button: {
                    text: "Đổi Mật Khẩu",
                    closeModal: false,
                  },
                })
                
                .then((content) => {
                  if (content != '') {
                    ChangePassword(content);
                  } else {
                    swal("Thông Báo","Vui Lòng Nhập Mật Khẩu Mới", "error");
                  }
                });
            }
            
               function ChangePassword(password){
                $.ajax({
                    url: "/assets/ajaxs/cpanel.php",
                    method: "POST",
                    data: {
                       id: '<?=$query['id'];?>',
                       password: password,
                       type: 'changepassword',
                    },
                    success: function(response) {
                     var data = JSON.parse(response);
                     
                     swal("Thông Báo",data.message,data.status);
                     
                     if(data.status == 'success'){
                         window.location.href="";
                     }
                     
                     modal.close();
                    }
                });
            }
    
        </script>
  
  
            
          <form action="" method="post" id="submitDelete"><input name="delete" value="true" type="hidden"></form>

            <?php 
            if(isset($_POST['delete']) && $_POST['delete'] == 'true'){
                    $query = $getName['hostname'].':2087/json-api/removeacct?api.version=1&user='.$query['taikhoan'].'&password='.$query['matkhau'].'&enabledigest=0&db_pass_update=1'; 
                    $curl = curl_init();
                    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,0); 
                    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST,0);
                    curl_setopt($curl, CURLOPT_HEADER,0); 
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER,1); 
                    $header[0] = "Authorization: Basic " . base64_encode($getName['whmusername'].":".$getName['whmpassword']) . "\n\r";
                    curl_setopt($curl, CURLOPT_HTTPHEADER, $header); 
                    curl_setopt($curl, CURLOPT_URL, $query); 
                    $result = curl_exec($curl); 
                    if ($result == false) {
                        echo swal('Không Thể Kết Nối Đến Cpanel','error');
                    } else {
                        $connect->query("DELETE FROM `Hostings` WHERE `id` = '$id'");
                        echo swal('Chấm Dứt Dịch Vụ Thành Công','success');
                        echo redirect('');
                    }
                    curl_close($curl); 
              }
              
            ?>

          <script>
                    let viewed = false;
                    
                    function toggleView(contentId, iconId, field) {
                      const contentElement = document.getElementById(contentId);
                      const iconElement = document.getElementById(iconId);
                    
                      if (viewed) {
                        contentElement.textContent = '*******';
                        iconElement.classList.remove('fa-eye-slash');
                        iconElement.classList.add('fa-eye');
                      } else {
                        if (field === 'ip') {
                          <?php if($query['status'] == 0 || $query['status'] == 1){ ?> contentElement.textContent = '<?=$getName['ip'];?>'; <?php } else { echo 'contentElement.textContent = "Không Hiển Thị!";'; } ?>
                        } else if (field === 'username') {
                          contentElement.textContent = '<?=$query['taikhoan'];?>';
                        } else if (field === 'password') {
                          contentElement.textContent = '<?=$query['matkhau'];?>';
                        }
                        iconElement.classList.remove('fa-eye');
                        iconElement.classList.add('fa-eye-slash');
                      }
                    
                      viewed = !viewed;
                    }
                    </script>
                    
                    
                    
  <?php } if($query['status'] == 1 || $query['status'] == 4){ 
  $package = $connect->query("SELECT * FROM CpanelPackage WHERE package = '".$query['package']."'")->fetch_array();
  ?>
  
  
 
    
    <div class="myModal" id="giaHan">
        <div class="modalContent">
            <span class="closeBtn" onclick="closeModal()">&times;</span>
            <strong style="font-size: 18px;"> Gia Hạn Dịch Vụ</strong>
            
            
            <br>
            
            <br>
            
            <label class="block">
                <span>Chọn Hạn Dùng</span>
                <select class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent" id="hsd">
                  <option value="0">-- Chọn hạn sử dụng --</option>
                      <option value="1">1 Tháng - <?=Monney($package['price'] * 1);?>đ</option>
                      <option value="2">2 Tháng - <?=Monney($package['price'] * 2);?>đ</option>
                      <option value="3">3 Tháng - <?=Monney($package['price'] * 3);?>đ</option>
                      <option value="4">4 Tháng - <?=Monney($package['price'] * 4);?>đ</option>
                      <option value="5">5 Tháng - <?=Monney($package['price'] * 5);?>đ</option>
                      <option value="6">6 Tháng - <?=Monney($package['price'] * 6);?>đ</option>
                      <option value="7">7 Tháng - <?=Monney($package['price'] * 7);?>đ</option>
                      <option value="8">8 Tháng - <?=Monney($package['price'] * 8);?>đ</option>
                  </select>
              </label>
              
              <br>
              
              <button onclick="thanhToan()" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                  Thanh Toán
            </button>
              
        </div>
    </div>
 
    
    <script>
        function thanhToan(){
            $.ajax({
                url: "/assets/ajaxs/cpanel.php",
                method: "POST",
                data: {
                   id: '<?=$query['id'];?>',
                   hsd: $("#hsd").val(),
                   type: 'giahan',
                },
                success: function(response) {
                 var data = JSON.parse(response);
                 
                 swal("Thông Báo",data.message,data.status);
                 
                 if(data.status == 'success'){
                     window.location.href="";
                 }
                 
                }
            });
        }
    </script>
  
   <?php } if($query['status'] == 1){ 
     $package = $connect->query("SELECT * FROM CpanelPackage WHERE package = '".$query['package']."'")->fetch_array();
      ?>
      
  
 
    
    <div class="myModal" id="nangcap">
        <div class="modalContent">
            <span class="closeBtn" onclick="closeModal()">&times;</span>
            <strong style="font-size: 18px;"> Nâng Cấp Dịch Vụ </strong>
            
            
            <br>
            
            <br>
            
            <label class="block">
                <span>Chọn Hạn Dùng</span>
                <select class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent" id="package">
                  <option value="0">-- Chọn Gói --</option>
                      <?php
                       $hsd = tinhNgay($query['time'], $query['orvertime']);
                       $tienConLai  = TruTienDichVu($query['time'], $getPack['price'], $hsd);
                       $getPrice = $getPack['price'];
                       $res = $connect->query("SELECT * FROM CpanelPackage WHERE server = '".$getName['uname']."' AND price > $getPrice AND package != '".$package['package']."'");
                       foreach($res as $row){
                           $id+=1;
                       ?>
                       
                       <option value="<?=$row['id'];?>"> <?=inHoaString($row['package']);?> (<?=Monney($row['price'] - $tienConLai);?> <sup>đ</sup>) </option>
                       
                       <?php } if($id == 0){ ?>
                       
                        <option value=""> Hiện không có gói nào:( </option>
                        
                       <?php } ?>
                  </select>
              </label>
              
              <br>
              
              <button onclick="thanhToan2()" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                  Thanh Toán
            </button>
              
        </div>
    </div>
    
    
    <script>
        function thanhToan2(){
            $.ajax({
                url: "/assets/ajaxs/cpanel.php",
                method: "POST",
                data: {
                   id: '<?=$query['id'];?>',
                   packagee: $("#package").val(),
                   type: 'nangcap',
                },
                success: function(response) {
                 var data = JSON.parse(response);
                 
                 swal("Thông Báo",data.message,data.status);
                 
                 if(data.status == 'success'){
                     window.location.href="";
                 }
                 
                }
            });
        }
    </script>
   
  <?php } ?> 
  
  
  
  
  <script>
        function giaHan() {
            document.getElementById('giaHan').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('giaHan').style.display = 'none';
        }

        window.onclick = function (event) {
            var modal = document.getElementById('giaHan');
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        };
        
        function nangcap() {
            document.getElementById('nangcap').style.display = 'block';
        }

        function closeModal2() {
            document.getElementById('nangcap').style.display = 'none';
        }

        window.onclick = function (event) {
            var modal = document.getElementById('nangcap');
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        };
        
        
        function ErrorStatus(){
          swal('Thông Báo','Chức Năng Chỉ Cho Phép Dùng Khi Hosting Hoạt Động','warning');
      }
      
       function SwalChamDut(){
        swal({
          title: "Xác Nhận",
          text: "Bạn Có Chắc Muốn Xóa Dịch Vụ?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
              document.getElementById("submitDelete").submit();
              swal("Tạo Lệnh Chấm Dứt Thành Công, Vui Lòng Đợi", {
              icon: "success",
            });
          }
        });
    }
        
    </script>


  <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .myModal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modalContent {
            background-color: #fefefe;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .closeBtn {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .closeBtn:hover,
        .closeBtn:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

    </style>
    
    
  
  

<?php
include('../system/footer.php');
?>