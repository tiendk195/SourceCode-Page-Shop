<?php
include('../system/header.php');
CheckSession();

$query = $connect->query("SELECT * FROM DanhSachWeb WHERE id = '".$_GET['id']."'")->fetch_array();
$products = $connect->query("SELECT * FROM Products WHERE id = '".$query['theme']."'")->fetch_array();
if($_GET['id'] != $query['id']){
    echo redirect('/');
}
?>

<main class="main-content w-full px-[var(--margin-x)] pb-8">
  <div class="flex items-center space-x-4 py-5 lg:py-6">
    <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
      <li class="flex items-center space-x-2">
        <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent" href="#"> <?=inHoaString($query['domain']);?> </a>
        <svg x-ignore="" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
      </li>
      <li> Gia Hạn Dịch Vụ </li>
    </ul>
  </div>

  <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
    <div class="col-span-12 sm:col-span-6">
      <div class="card p-4 sm:p-5">
        <p class="text-base font-medium text-slate-700 dark:text-navy-100">
          Gia Hạn Dịch Vụ
        </p>
      
          <div class="mt-4 space-y-4" onchange="check()">

            <label class="block">
              <span> Tên Miền </span>
              <input class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" value="<?=inHoaString($query['domain']);?>" disabled>
            </label>

              <label class="block">
                <span>Hạn Dùng</span>
                <select class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent" id="hsd">
                  <option value="0">-- Chọn Hạn Sử Dụng --</option>
                      <option value="1">1 Tháng (<?=Monney($products['price'] * 1);?>đ)</option>
                      <option value="2">2 Tháng (<?=Monney($products['price'] * 2);?>đ)</option>
                      <option value="3">3 Tháng (<?=Monney($products['price'] * 3);?>đ)</option>
                      <option value="4">4 Tháng (<?=Monney($products['price'] * 4);?>đ)</option>
                      <option value="5">5 Tháng (<?=Monney($products['price'] * 5);?>đ)</option>
                      <option value="6">6 Tháng (<?=Monney($products['price'] * 6);?>đ)</option>
                      <option value="7">7 Tháng (<?=Monney($products['price'] * 7);?>đ)</option>
                      <option value="8">8 Tháng (<?=Monney($products['price'] * 8);?>đ)</option>
                  </select>
              </label>
              
            <div class="flex justify-end space-x-2">
              <button onclick="submit()" id="thanhtoan" class="btn space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                <span>Tạo Ngay - <strong id="pricex"> 0 </strong> <sup>đ</sup></span>
              </button>
            </div>
          </div>
     </div>
      
    </div>
    
    
    
  </div>
</main>

<script>
    function check(){
    var price = '<?=$products['price'];?>';
        var hsd = document.getElementById("hsd").value;
        
        let tongtien = price * hsd;
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
                type: '4',
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