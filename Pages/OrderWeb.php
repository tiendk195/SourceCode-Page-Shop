<?php
include('../system/header.php');
echo checkSession();
$query = $connect->query("SELECT * FROM Products WHERE id = '".$_GET['id']."'")->fetch_array();
if($_GET['id'] != $query['id']){
    echo swal('Mã Đơn Hàng Không Khả Dụng','error');
    echo redirect('/');
}
?>

<main class="main-content w-full px-[var(--margin-x)] pb-8">
  <div class="flex items-center space-x-4 py-5 lg:py-6">
    <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
      <li class="flex items-center space-x-2">
        <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent" href="#"> <?=AntiXss($query['name']);?> </a>
        <svg x-ignore="" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
      </li>
      <li>Nhập Thông Tin Trang Web #<?=$query['id'];?></li>
    </ul>
  </div>

  <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
    <div class="col-span-12 sm:col-span-6">
      <div class="card p-4 sm:p-5">
        <p class="text-base font-medium text-slate-700 dark:text-navy-100">
          Nhập Thông Tin Trang Web #<?=$query['id'];?>
        </p>
      
          <div class="mt-4 space-y-4" onchange="check()">

            <label class="block">
              <span>Tên Miền Chính</span>
              <input class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" placeholder="Nhập tên miền" id="domain" pattern="[a-zA-Z0-9]*" type="text">
            </label>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
              <label class="block">
                <span>Tài Khoản Admin</span>
                <input class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" placeholder="Nhập tài khoản Admin" id="taikhoan" type="text">
              </label>
              <label class="block">
                <span>Mật Khẩu Admin</span>
                <input class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" placeholder="Nhập mật khẩu Admin" id="matkhau" type="text">
              </label>
            </div>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
              <label class="block">
  <span>Chọn Đuôi Miền</span>
<select class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent" id="dot">
  <option value=""> -- Chọn đuôi miền -- </option>
  <?php
  $response = $connect->query("SELECT * FROM Dots");
  foreach($response as $row){
  ?>
  
  <option value="<?=$row['dot'];?>"> .<?=$row['dot'];?> - <?=Monney($row['price']);?>đ </option>
  
  <?php
  }
  ?>
  </select>

</label>

              <label class="block">
                <span>Chọn Hạn Dùng</span>
                <select class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent" id="hsd">
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
            </div>

            <div class="flex justify-end space-x-2">
              <button onclick="submit()" id="thanhtoan" class="btn space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z">
      
  </path>
</svg><span>Tạo Ngay - <strong id="pricex"> 0 </strong><sup>đ</sup></span>
              </button>
            </div>
          </div>
     </div>
      
    </div>

    <div class="col-span-12 sm:col-span-6">
      <div class="card p-4 lg:p-6">

        <div class="mt-6 font-inter text-base text-slate-600 dark:text-navy-200">
        

          <img class="w-full rounded-lg object-cover object-center" src="<?=$query['image'];?>" alt="Templates">

          <br>
          <h1 class="text-xl font-medium text-slate-900 dark:text-navy-50 lg:text-2xl">Nếu Miền Có Sẵn</h1>
          <p>Nếu Miền Có Sẵn Đã Mua Từ Tenten,Vietnix,Inet,v.v Thì Trỏ Vào Namesever Sau Để Tạo Rồi Liên Hệ Admin Để Hỗ Trợ Thêm</p>
          <p>Namesever 1</p>
          <input disabled="" class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary disabled:pointer-events-none disabled:select-none disabled:border-none disabled:bg-zinc-100 dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent dark:disabled:bg-navy-600" placeholder="Null" id="ns1" value="Null" type="text">
          <p>Namesever 2</p>
          <input disabled="" class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary disabled:pointer-events-none disabled:select-none disabled:border-none disabled:bg-zinc-100 dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent dark:disabled:bg-navy-600" placeholder="Null" id="ns2" value="Null" type="text">

        <br>       <br>       
          <h1 class="text-xl font-medium text-slate-900 dark:text-navy-50 lg:text-2xl">Thông Tin</h1>
          <?=$query['description'];?>
        </div>

      </div>
    </div>
  </div>
</main>

<script>

    function check(){
        var price = '<?=$query['price'];?>';
        var hsd = document.getElementById("hsd").value;
        var dot = document.getElementById("dot").value;
        
        var value_monney = price * hsd;
        
        <?php
        $dots = $connect->query("SELECT * FROM Dots");
        foreach($dots as $row){
        ?>
        
        if(dot == '<?=$row['dot'];?>'){
           var dot_price = <?=$row['price'];?>;
        } else
        
        <?php
        } 
        ?>
        
        { 
            var dot_price = 0;
        }
     
        let tongtien = value_monney + dot_price;
        let vndString = tongtien.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' }); 
        let codeflow = vndString.replace('₫', ''); 
        document.getElementById('pricex').innerHTML = codeflow;   
        }
            
      function submit(){
          $('#thanhtoan').html('Đang Xử Lí...').prop('disabled', true);
          $.ajax({
            url: "/assets/ajaxs/thanhtoan.php",
            method: "POST",
            data: {
                type: '1',
                domain: $("#domain").val(),
                dot: $("#dot").val(),
                taikhoan: $("#taikhoan").val(),
                matkhau: $("#matkhau").val(),
                hsd: $("#hsd").val(),
                id: '<?=$query['id'];?>'
            },
            success: function(response) {
                var data = JSON.parse(response);
                
                swal('Thông Báo', data.message, data.status);
                
                $('#thanhtoan').html('<span>Tạo Ngay - <strong id="pricex"> 0 </strong> <sup>đ</sup></span>').prop('disabled', false);
                check();
            }
        });
      }
  </script>
  
  
<?php
include('../system/footer.php');
?>