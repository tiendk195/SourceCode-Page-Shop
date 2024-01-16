<?php
include('../system/header.php');
echo checkSession();


$querycard = $connect->query("SELECT * FROM DataCard WHERE username = '".$getUser['username']."' AND status = '1'");
foreach($querycard as $row){
    $cardMonney = $cardMonney + $row['amount'];
}

$getNameMomo = 'naptien_'.$getUser['username'];
$querymomo = $connect->query("SELECT * FROM TranIDMomo WHERE comment = '$getNameMomo' AND status = '1'");
foreach($querycard as $row){
    $momoMonney = $momoMonney + $row['amount'];
}

$historyMyMonney = $cardMonney + $momoMonney;


?>


<main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center space-x-4 py-5 lg:py-6">
          <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
          Profile
          </h2>
        </div>

        <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
          <div class="col-span-12 lg:col-span-4">
            <div class="card p-4 sm:p-5">
              <div class="flex items-center space-x-4">
                <div class="avatar h-14 w-14">
                  <img class="rounded-full" src="https://i.imgur.com/tsOVyFD.jpg" alt="avatar">
                </div>
                <div>
                  <h3 class="text-base font-medium text-slate-700 dark:text-navy-100"> 
                  <h3 class="text-base font-medium text-slate-700 dark:text-navy-100"> <?=$getUser['username'];?> </h3>
                  <p class="text-xs+"> <?=Monney($getUser['monney']);?><sup>đ</sup></p>
                </div>
              </div>
              <ul class="mt-6 space-y-1.5 font-inter font-medium">
                <li>
                  <a class="flex items-center space-x-2 rounded-lg bg-primary px-4 py-2.5 tracking-wide text-white outline-none transition-all dark:bg-accent" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>Thông tin tài khoản</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          
          
          <div class="col-span-12 lg:col-span-8">
            <div class="card">
              <div class="flex flex-col items-center space-y-4 border-b border-slate-200 p-4 dark:border-navy-500 sm:flex-row sm:justify-between sm:space-y-0 sm:px-5">
                <h2 class="text-lg font-medium tracking-wide text-slate-700 dark:text-navy-100">
                Thông Tin Tài Khoản
                </h2>
              </div>
              <div class="p-4 sm:p-5">
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                  <label class="block">
                    <span>Chức Vụ: </span>
                    <span class="relative mt-1.5 flex">
                    <input disabled="" class="form-input w-full rounded-lg bg-slate-150 px-3 py-2 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900" placeholder="<?php if($getUser['level'] == 'admin'){ echo 'Quản Trị Viên'; } else { echo 'Thành Viên'; } ;?> " type="text">
                    </span>
                  </label>
                  
                  <label class="block">
                    <span>Gmail: </span>
                    <span class="relative mt-1.5 flex">
                    <input disabled="" class="form-input w-full rounded-lg bg-slate-150 px-3 py-2 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900" placeholder="<?=$getUser['email'];?>" type="text">
                    </span>
                  </label>
                  <label class="block">
                    <span>Tên Tài Khoản: </span>
                    <span class="relative mt-1.5 flex">
                    <input disabled="" class="form-input w-full rounded-lg bg-slate-150 px-3 py-2 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900" placeholder="<?=$getUser['username'];?>" type="text">
                    </span>
                  </label>
                  
                  <label class="block">
                    <span>Số Dư Hiện Tại:</span>
                    <span class="relative mt-1.5 flex">
                    <input disabled="" class="form-input w-full rounded-lg bg-slate-150 px-3 py-2 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900" placeholder="<?=Monney($getUser['monney']);?>đ" type="text">
                    </span>
                  </label>
                  
                  <label class="block">
                    <span>Số Dư Đã Nạp:</span>
                    <span class="relative mt-1.5 flex">
                    <input disabled="" class="form-input w-full rounded-lg bg-slate-150 px-3 py-2 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900" placeholder="<?=Monney($historyMyMonney);?>đ" type="text">
                    </span>
                  </label>
                  <label class="block">
                    <span>ID:</span>
                    <span class="relative mt-1.5 flex">
                    <input disabled="" class="form-input w-full rounded-lg bg-slate-150 px-3 py-2 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900" placeholder="<?=Monney($getUser['id']);?>" type="text">
                    </span>
                  </label>
                </div>
                <div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
      
<?php 
include('../system/footer.php');
?>