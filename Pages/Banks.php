<?php
include('../system/header.php');
CheckSession();
?>

<main class="main-content w-full px-[var(--margin-x)] pb-8">
    
        <div class="flex items-center space-x-4 py-5 lg:py-6">
          <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
          Chuyển Khoản
          </h2>
        </div>
        
        
        <div class="mt-3 grid grid-cols-1 gap-4 sm:grid-cols-1 sm:gap-5 lg:grid-cols-1 lg:gap-6">
            <div class="card space-y-6 p-4 sm:px-5">
             <div>
              <h2 class="text-lg font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
               Nội dung chuyển khoản
              </h2>
            </div>
            
<div class="alert rounded-lg bg-info px-4 py-4 text-white sm:px-5 text-center">
    <div class="flex items-center flex-col space-x-2">
        <h2 class="font-semibold lg:text-2xl">naptien_<?=AntiXss($getUser['username']);?></h2>
        <button onclick="copyText()" class="btn bg-success font-medium text-white hover:bg-success-focus focus:bg-success-focus active:bg-success-focus/90">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline-block align-middle mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 01-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 011.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 00-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 01-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5a3.375 3.375 0 00-3.375-3.375H9.75"></path>
            </svg>
            Sao chép
        </button>
    </div>
</div>

<script>
function copyText() {
    var alertText = document.querySelector(".alert h2").textContent.trim();
    var tempTextArea = document.createElement("textarea");
    tempTextArea.value = alertText;
    document.body.appendChild(tempTextArea);
    tempTextArea.select();
    document.execCommand("copy");
    document.body.removeChild(tempTextArea);
    alert("Đã sao chép: " + alertText);
}
</script>



            
            <div class="grid grid-cols-1 gap-2 sm:gap-5 lg:grid-cols-2 lg:gap-6 pt-4">
                
        <?php
        $query = $connect->query("SELECT * FROM Banks");
        foreach($query as $row){
        ?>
        
        <div class="rounded-lg bg-gradient-to-br from-purple-500 to-indigo-600 px-4 py-4 text-white sm:px-5">
            <div>
              <center><h2 class="text-lg font-medium"> <?=$row['name'];?> </h2></center>
            </div>
            <div class="pt-2">
                <center>
                <p>Số Tài Khoản: <?=$row['sotaikhoan'];?></p>
                <p>Chủ Tài Khoản: <?=$row['chutaikhoan'];?></p>
                </center>
            </div>
          </div>

            <?php } ?>

          </div>
          
            
            <div class="alert rounded-lg bg-info px-4 py-4 text-white sm:px-5">
        <p>- Nạp tối thiểu 10,000đ</p>
        <p>- Quá 5 - 10phút kể từ khi nạp, liên hệ Admin để được duyệt!
        <p>- Nhập sai ngân hàng, số tài khoản sẽ không được hỗ trợ!
        <p>- Nạp sai nội dung chuyển khoản sẽ bị trừ 20% phí giao dịch.</p>
        <p>- Cố tình nạp dưới mức nạp không hỗ trợ</p>
        </div>
             
             
            </div>
            
        </div>
        
        <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:grid-cols-12 lg:gap-6 pt-4">
                            <div class="col-span-12 sm:col-span-12">
                                <div class="card p-4 sm:p-5">
            <div class="my-3 flex h-8 items-center justify-between">
                
              <h2 class="font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100 lg:text-base">
              Lịch Sử Chuyển Khoản
              </h2>
            </div>
            <div>
              <div class="mt-5">
                <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                  <table class="w-full text-left">
                    <thead>
                      <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                        <th class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                        ID
                        </th>
                        <th class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                        Loại ngân hàng
                        </th>
                        
                        <th class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                        Số tiền nạp
                        </th>
                        
                        <th class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                        Thời Gian Nạp
                        </th>
                        
                        <th class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                        Trang Thái
                        </th>
                      </tr>
                    </thead>
                    <tbody class="dark:bg-slate-800">
                        
                        <?php
              $noidung = 'naptien_'.$getUser['username'];
              $queryMomo = $connect->query("SELECT * FROM TranIDMomo WHERE comment = '$noidung' ORDER BY id DESC");
              foreach($queryMomo as $row){
                  $id+=1;
              ?>
              
              <tr>
              <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">#<?=$row['id'];?></td>
              <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400"><?=$row['nameBank'];?></td>
              <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400"><?=$row['amount'];?></td>
              <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400"><?=ToTime($row['time']);?></td>
              <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400"><?=StatusMomo($row['status']);?></td>
              </tr>
              <?php } ?>
              
                   </tbody>
                  </table>
                </div>
              </div>
            </div>
            
</div>
          </div>
</div>
        
      </main>

<?php 
include('../system/footer.php');
?>