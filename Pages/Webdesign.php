<?php
include('../system/header.php');
CheckSession();
?>

<main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center justify-between py-5 lg:py-6">
          <div class="flex items-center space-x-1">
            <h2 class="text-xl font-medium text-slate-700 line-clamp-1 dark:text-navy-50 lg:text-2xl">
              Thiết Kế Website
            </h2>
            
          </div>

        
        </div>
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:grid-cols-3 lg:gap-6 xl:grid-cols-4">
            
            <?php
                $query = $connect->query("SELECT * FROM DanhMuc");
                foreach($query as $row){
                    $id+=1;
                ?>
            
                  <div class="card">
            <img src="<?=$row['image'];?>" class="w-full rounded-t-lg object-cover object-center" alt="Detail">
            <div class="flex grow flex-col p-4">

              <div class="pt-2 line-clamp-2">
                <a href="" class="text-base font-medium text-slate-700 hover:text-primary focus:text-primary dark:text-navy-100 dark:hover:text-accent-light dark:focus:text-accent-light"> <?=$row['name'];?> </a>
              </div>

              <div class="mt-3 text-right">
              
                <a href="/Detail/<?=$row['id'];?>" class="btn space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                <svg xmlns="http://www.w3.org/2000/svg" class="inline h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                  </svg> Xem Chi Tiết
              </a>
              </div>
            </div>
          </div>
              
              <?php } ?>
      
                </div>
      </main>

<?php
include('../system/footer.php');
?>