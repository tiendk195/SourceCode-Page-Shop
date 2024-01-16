<?php
include('../system/header.php');
$id = $_GET['id'];
$query = $connect->query("SELECT * FROM CpanelPackage WHERE id = '$id'")->fetch_array();
$getName = $connect->query("SELECT * FROM ServerName WHERE uname = '".$query['server']."'")->fetch_array();

if($id != $query['id']){
    echo redirect('/Hosting');
}

echo Title('Thanh Toán Dịch Vụ ('.inHoaString($query['package']).')');
?>



<main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="mt-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
         

          <div class="col-span-12 grid lg:col-span-8">
            <div class="card">
              <div class="border-b border-slate-200 p-4 dark:border-navy-500 sm:px-5">
                <div class="flex items-center space-x-2">
                  <div class="flex h-7 w-7 items-center justify-center rounded-lg bg-primary/10 p-1 text-primary dark:bg-accent-light/10 dark:text-accent-light">
                    <i class="fa-solid fa-layer-group"></i>
                  </div>
                  <h4 class="text-lg font-medium text-slate-700 dark:text-navy-100">
                    Đăng Ký Dịch Vụ
                  </h4>
                </div>
              </div>
              <div class="space-y-4 p-4 sm:p-5">
                <label class="block">
                  <span> Tên Miền </span>
                  <input id="domain" class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" placeholder="Tên Miền Chính" type="text">
                </label>
            
                <div>
                  <span> Email</span>
                  <div class="filepond fp-bordered fp-grid mt-1.5 [--fp-grid:2]">
                    <input id="email" value="<?=$getUser['email'];?>" class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" placeholder="Tên Miền Chính" type="text">
                  </div>
                </div>
                
                
                <label class="block">
                <span>Chọn Hạn Dùng</span>
                <select class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent" id="hsd"  onchange="checkGia()">
                  <option value="0">-- Chọn hạn sử dụng --</option>
                      <option value="1">1 Tháng - <?=Monney($query['price'] * 1);?>đ</option>
                      <option value="2">2 Tháng - <?=Monney($query['price'] * 2);?>đ</option>
                      <option value="3">3 Tháng - <?=Monney($query['price'] * 3);?>đ</option>
                      <option value="4">4 Tháng - <?=Monney($query['price'] * 4);?>đ</option>
                      <option value="5">5 Tháng - <?=Monney($query['price'] * 5);?>đ</option>
                      <option value="6">6 Tháng - <?=Monney($query['price'] * 6);?>đ</option>
                      <option value="7">7 Tháng - <?=Monney($query['price'] * 7);?>đ</option>
                      <option value="8">8 Tháng - <?=Monney($query['price'] * 8);?>đ</option>
                  </select>
              </label>

                <?php 
                      if(!empty($getName['ghichu'])){
                      ?>
                      
                      <br>
                      <strong style="color: red;"> Ghi Chú: </strong> <?=$getName['ghichu'];?>
                      <br>      <br>
                      
                      <?php } ?>
                      
                      
                  <button onclick="thanhToan()" id="ThanhToan" class="btn space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z">
                  
              </path>
            </svg><span> Thanh Toán - <strong id="money"> 0 </strong><sup>đ</sup></span>
                          </button>
                        
              </div>
            </div>
          </div>
          
          
          

          <div class="card col-span-12 px-4 pb-5 sm:px-5 lg:col-span-4">
            <div class="flex items-center justify-between py-3">
              <h2 class="font-medium tracking-wide text-slate-700 dark:text-navy-100">
                Thông Tin Dịch Vụ
              </h2>
              <div x-data="usePopper({placement:'bottom-end',offset:4})" @click.outside="isShowPopper &amp;&amp; (isShowPopper = false)" class="inline-flex">
                <button x-ref="popperRef" @click="isShowPopper = !isShowPopper" class="btn -mr-1 h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                  </svg>
                </button>
              </div>
            </div>
            

            <div class="mt-2 space-y-4">
                <span> Máy Chủ: <?=$getName['name'];?> </span>
            </div>
            
            <div class="mt-2 space-y-4">
                <span> Gói Dịch Vụ: CPANEL_<?=inHoaString($query['package']);?>  </span>
            </div>
            
            <div class="mt-2 space-y-4">
                <span> Giá Tiền: <?=Monney($query['price']);?> <sup>đ</sup> </span>
            </div>
            
            <br>
            <div class="flex justify-start space-x-2">
            <div onclick="window.location.href='/Hosting';" class="badge space-x-2.5 rounded-full bg-error/10 text-error dark:bg-error/15">
              <div class="h-2 w-2 rounded-full bg-current"></div>
              <span>Đổi Gói -> </span>
            </div>
           
                 </div>
                 
                 <center> 
                 
            <img src="https://lineone.piniastudio.com/images/illustrations/dashboard-meet-dark.svg" width="240px">
            </center>
          </div>
        </div>
        </div>
        </div>
      </main>
      
<script>
    function checkGia(){
        const price = <?=$query['price'];?>;
        const hsd = document.getElementById("hsd").value;
        
        let tongtien = price * hsd;
        let vndString = tongtien.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' }); 
        let cyberlux = vndString.replace('₫', ''); 
        document.getElementById("money").innerHTML = cyberlux;
        document.getElementById("totals").innerHTML = cyberlux;
    }
    
    
    function thanhToan(){
        swal({
          title: "Xác nhận?",
          text: "Bạn có chắc muốn mua dịch vụ này?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            pay();
          }
        });
    }
    
    function pay(){
        $('#ThanhToan').html('Đang Xử Lí <i class="fa fa-spinner fa-spin"></i>').prop('disabled', true);
         $.ajax({
                url: "/assets/ajaxs/cpanel.php",
                method: "POST",
                data: {
                    type: 'create',
                    domain: $("#domain").val(),
                    hsd: $("#hsd").val(),
                    email: $("#email").val(),
                    id: '<?=$id;?>'
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    
                    if(data.status == 'error'){
                        swal('Thông Báo', data.message, data.status);
                    } else if(data.status == 'success') {
                        swal('Thông Báo', data.message, data.status);
                    }
                    $('#ThanhToan').html('Thanh Toán - <strong id="money">0</strong> <sup>đ</sup>').prop('disabled', false);
                    checkGia();
                }
            });
    }
</script>
  
  
  
<?php
include('../system/footer.php');
?>