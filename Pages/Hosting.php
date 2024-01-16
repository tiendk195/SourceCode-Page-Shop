<?php
include('../system/header.php');
CheckSession();
?>

<main class="main-content container w-full place-items-center px-[var(--margin-x)] pb-12">

<br>

<div class="col-span-12 grid grid-cols-1 gap-4 sm:gap-5 lg:col-span-4 lg:gap-6">
            <div class="card pb-4">
              <div class="flex items-center justify-between px-4 py-3 sm:px-5">
                <h2 class="font-medium tracking-wide text-slate-700 dark:text-navy-100">
                  Danh Sách Máy Chủ
                </h2>
              </div>
              <div class="mx-4 my-3 h-px bg-slate-200 dark:bg-navy-500 sm:mx-5 gap-5"></div>
             
                <div class="inline-space mt-5 flex flex-wrap" style="padding-left: 15px;">
                    
                    <?php
                        $query = $connect->query("SELECT * FROM ServerName WHERE value = 'on'");
                        foreach($query as $row){
                        ?>
                        
                    <button onclick="ChangeServer('<?=$row['uname'];?>')" class="btn bg-secondary font-medium text-white shadow-lg shadow-secondary/50 hover:bg-secondary-focus focus:bg-secondary-focus active:bg-secondary-focus/90"> <?=inHoaString($row['name']);?> (<?=inHoaString($row['uname']);?>) </button>
                    
                    <?php } ?>
                    
                  </div>
                
            </div>
            
            
            
            
        <div class="mx-auto w-full grid max-w-5xl grid-cols-1 gap-4 sm:grid-cols-4 md:gap-4 2xl:gap-6">

        <?php 
              if(!isset($_GET['server'])){
                  $getName = $connect->query("SELECT * FROM ServerName")->fetch_array();
                  $query = $connect->query("SELECT * FROM CpanelPackage WHERE server = '".$getName['uname']."'");
              } else {
                  $getName = $connect->query("SELECT * FROM ServerName WHERE uname = '".$_GET['server']."'")->fetch_array();
                  $query = $connect->query("SELECT * FROM CpanelPackage WHERE server = '".$getName['uname']."'");
              }
              
              foreach($query as $row){
              ?>
              
          <div class="card">
            <div class="rounded-t-lg bg-slate-150 p-4 text-center dark:bg-navy-800 sm:p-5">
              <p class="text-xl font-medium text-slate-800 dark:text-navy-100">
                <?=inHoaString($row['package']);?>
              </p>
              
              <strong>
                <?=Monney($row['price']);?><sup>đ</sup>/Tháng
              </strong>
              
            </div>
            
            <style>
                .transparent-text {
                    color: rgba(255, 255, 255, 0.5); 
                }
            </style>
            
            <div class="p-4 sm:p-5">
              <p class="transparent-text"> Tạ Minh Phát & TAMINHPHAT.COM - Powered Hosting </p>
              <div class="mt-3 space-y-4 text-left">
                <div class="flex items-start space-x-3">
                  <div class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-primary/10 text-primary dark:bg-accent/10 dark:text-accent-light">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="h-4 w-4">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                    </svg>
                  </div>
                  <span class="font-medium"> Dung Lượng: <?=$row['disk'];?> </span>
                </div>
                <div class="flex items-start space-x-3">
                  <div class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-primary/10 text-primary dark:bg-accent/10 dark:text-accent-light">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="h-4 w-4">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                    </svg>
                  </div>
                  <span class="font-medium"> Băng Thông: <?=$row['bandwidth'];?> </span>
                </div>
                <div class="flex items-start space-x-3">
                  <div class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-primary/10 text-primary dark:bg-accent/10 dark:text-accent-light">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="h-4 w-4">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                    </svg>
                  </div>
                  <span class="font-medium"> Miền Khác: <?=$row['addondomain'];?> </span>
                </div>
                
                
                <div class="flex items-start space-x-3">
                  <div class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-primary/10 text-primary dark:bg-accent/10 dark:text-accent-light">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="h-4 w-4">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                    </svg>
                  </div>
                  <span class="font-medium"> Miền Con: <?=$row['subdomain'];?> </span>
                </div>
                
                
                <div class="flex items-start space-x-3">
                  <div class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-primary/10 text-primary dark:bg-accent/10 dark:text-accent-light">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="h-4 w-4">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                    </svg>
                  </div>
                  <span class="font-medium"> SSL: <?php if($getName['ssl_key'] == 'true_ssl'){ echo 'Miễn Phí Chứng Chỉ SSL'; } else { echo 'Không Có Sẵn'; } ;?> </span>
                </div>
                
                <div class="flex items-start space-x-3">
                  <div class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-primary/10 text-primary dark:bg-accent/10 dark:text-accent-light">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="h-4 w-4">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                    </svg>
                  </div>
                  <span class="font-medium"> Backup: <?=$getName['backup'];?> </span>
                </div>
              </div>
              <div class="mt-8">
              
                <button style="width:100%" onclick="getHost(<?=$row['id'];?>)" class="btn space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z">
      
  </path>
</svg><span> Mua Ngay </span>
              </button>
              </div>
            </div>
          </div>
          
          <?php } ?>
          
        </div>
        
      </main>
      
      
      <script>
      function ChangeServer(url){
          window.location.href="?server=" + url;
      }
      
      function getHost(url){
          window.location.href="/Order/Hosting/" + url;
      }
  </script>
  
      
<?php
include('../system/footer.php');
?>