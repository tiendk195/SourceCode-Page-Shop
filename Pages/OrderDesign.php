<?php
include('../system/header.php');
CheckSession();
$query = $connect->query("SELECT * FROM MauLogo WHERE id = '".$_GET['id']."'")->fetch_array();
if($_GET['id'] != $query['id']){
    echo redirect('/');
}
?>

<main class="main-content w-full px-[var(--margin-x)] pb-8">
  <div class="flex items-center space-x-4 py-5 lg:py-6">
      <li class="flex items-center space-x-2">
        <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent" href="#"><?=($query['name']);?></a>
      </li>
  </div>

  <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
    <div class="col-span-12 sm:col-span-12">
      <div class="card p-4 sm:p-5">
       
          <div class="mt-4 space-y-4">
            <label class="block">
              <span>Tên Logo</span>
              <input class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" placeholder="Nhập tên logo" id="name" type="text">
            </label>
            
            <div class="flex justify-end space-x-2">
              
              <button onclick="submit()" id="thanhtoan" class="btn space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z">
      
  </path>
</svg><span>Tạo Ngay - <?=Monney($query['price']);?><sup>đ</sup></span>
              </button>
            </div>
          </div>
      </div>
      
    </div>

    <div class="col-span-12 sm:col-span-12">
      <div class="card p-4 lg:p-6">

        <div class="font-inter text-base text-slate-600 dark:text-navy-200">
          <img class="w-full rounded-lg object-cover object-center" src="<?=($query['image']);?>" alt="image">
        </div>

      </div>
    </div>

  </div>
</main>

<script>
    function submit(){
          $('#thanhtoan').html('Đang Xử Lí...').prop('disabled', true);
          $.ajax({
            url: "/assets/ajaxs/thanhtoan.php",
            method: "POST",
            data: {
                type: '3',
                name: $("#name").val(),
                id: '<?=$query['id'];?>'
            },
            success: function(response) {
                var data = JSON.parse(response);
                swal('Thông Báo', data.message, data.status);
                $('#thanhtoan').html('<span>Tạo ngay - <?=Monney($query['price']);?>đ </span>').prop('disabled', false);
            }
        });
      }
</script>

<?php
include('../system/footer.php');
?>