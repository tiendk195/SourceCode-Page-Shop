<?php
include('../system/header.php');
CheckSession();
?>

<main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center space-x-4 py-5 lg:py-6">
          <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
          Lịch Sử Mua Hosting
          </h2>
          <div class="hidden h-full py-1 sm:flex">
            <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
          </div>
          <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
            <li class="flex items-center space-x-2">
              <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent" href="#">Home
              </a>
              <svg x-ignore="" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
              </svg>
            </li>
            <li> Lịch Sử Mua Hosting </li>
          </ul>
        </div>
        <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6">
          <!-- Basic Table -->
          <div class="card px-4 pb-4 sm:px-5">
            <div class="my-3 flex h-8 items-center justify-between">
              <h2 class="font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100 lg:text-base">
              DANH SÁCH HOSTING ĐÃ MUA
              </h2>
            </div>
            <div>
              <div class="mt-5">
                <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                  <table class="w-full text-left">
                  <thead>
                        <tr>
                          <th class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5"> STT </th>
                          <th class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5"> Tên Miền </th>
                          <th class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5"> Gói </th>
                          <th class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5"> Trạng Thái </th>
                          <th class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5"> Ngày Mua </th>
                          <th class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5"> Ngày Hết Hạn  </th>
                          <th class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5"> Thao Tác </th>
                        </tr>
                      </thead>
                      <tbody class="dark:bg-slate-800" class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                          
                          <?php
                          $query = $connect->query("SELECT * FROM Hostings WHERE username = '".$getUser['username']."' ORDER BY id DESC");
                          foreach($query as $row){
                              $id+=1;
                          ?>
                          
                       <tr>
                        <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400"> #<?=$id;?> </td>
                        <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400"><a style="color: blue;" href="https://<?=($row['domain']);?>" target="_blank"> <?=inHoaString($row['domain']);?> </a></td>
                        <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400"> <?=inHoaString($row['package']);?> </td>
                        <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400"> <?=StatusHost($row['status']);?> </td>
                        <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400"> <?=ToTime($row['time']);?>  </td>
                        <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400"><?=ToTime($row['orvertime']);?></td>
                        <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400"> <button class="badge space-x-2 bg-warning text-white shadow-soft shadow-warning/50"  onclick="window.location.href='/Clientarea/<?=$row['id'];?>';">
                          <span> Quản Lý </span>
                        </button> </td>
                      </tr>
                      
                      <?php } ?>
                      
                      </tbody>
                    </table>
                            
                </div>
              </div>
            </div>

          </div>

        
        </div>
      </main>
      
      
<?php
include('../system/footer.php');
?>