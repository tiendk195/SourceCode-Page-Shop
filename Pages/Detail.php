<?php
include('../system/header.php');
CheckSession();
$query = $connect->query("SELECT * FROM DanhMuc WHERE id = '".$_GET['id']."'")->fetch_array();
if($_GET['id'] != $query['id']){
    echo redirect('/');
}
?>

<main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center justify-between py-5 lg:py-6">
          <div class="flex items-center space-x-1">
            <h2 class="text-xl font-medium text-slate-700 line-clamp-1 dark:text-navy-50 lg:text-2xl">
              <?=AntiXss($query['name']);?>
            </h2></div></div>
       
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:grid-cols-3 lg:gap-6 xl:grid-cols-4">
            
            <?php
                $query = $connect->query("SELECT * FROM Products WHERE danhmuc = '".$query['id']."'");
                foreach($query as $row){
                    $id+=1;
                ?>
            
                  <div class="card">
            <img data-src="<?=$row['image'];?>" class="w-full rounded-t-lg object-cover object-center" alt="Templates">
            <div class="flex grow flex-col p-4">

              <div class="pt-2 line-clamp-2">
                <a href="/Order/CreateWeb/<?=$row['id'];?>" class="text-base font-medium text-slate-700 hover:text-primary focus:text-primary dark:text-navy-100 dark:hover:text-accent-light dark:focus:text-accent-light"> <?=$row['name'];?>
                              </div>
      
              

<div class="mt-3 text-right space-x-2 badge bg-primary/10 text-primary dark:bg-accent-light/15 dark:text-accent-light">
                       <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z">
                          
                      </path>
                    </svg>

                        <span><?=Monney($row['price']);?><sup>đ</sup>/tháng</span>
                      </div>

              <div class="mt-3 text-right">
              <a style="width:100%" href="/Order/CreateWeb/<?=$row['id'];?>" class="btn space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z">
      
  </path>
</svg><span> Tạo Ngay </span>
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