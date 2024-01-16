<?php
include('../system/header.php');
CheckSession();
?>

<main class="main-content w-full px-[var(--margin-x)] pb-8">
  <div class="flex items-center space-x-4 py-5 lg:py-6">
    <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
      <li class="flex items-center space-x-2">
        <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent" href="#">Trang chủ</a>
        <svg x-ignore="" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
      </li>
      <li>Nạp Thẻ Cào</li>
    </ul>
  </div>

  <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
    <div class="col-span-12 sm:col-span-12">
      <div class="card p-4 sm:p-5">
        <p class="text-base font-medium text-slate-700 dark:text-navy-100">
        Nạp Thẻ Cào 
        </p>
          <div class="mt-4 space-y-4">
          <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
              <label class="block">
                <span>Loại thẻ</span>
                <select class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent" id="type">
                <option value="">-- Chọn loại thẻ --</option>
                            <option value="VIETTEL">Viettel</option>
                            <option value="MOBIFONE">Mobifone</option>
                            <option value="VINAPHONE">Vinaphone</option>
                           
                </select>
              </label>
              <label class="block">
                <span>Mệnh giá</span>
                <select class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent" id="amount">
                <option value="">-- Chọn mệnh giá --</option>
							<option value="10000">10.000</option>
							<option value="20000">20.000</option>
							<option value="50000">50.000</option>
							<option value="100000">100.000</option>
							<option value="200000">200.000</option>
							<option value="500000">500.000</option>
						    <option value="1000000">1.000.000</option>
                                  </select>
              </label>
            </div>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
              <label class="block">
                <span>Seri</span>
                <input class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" placeholder="Nhập seri" id="serial" type="number">
              </label>
              <label class="block">
                <span>Mã Thẻ</span>
                <input class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" placeholder="Nhập mã thẻ" id="pin" type="number">
              </label>
            </div>

            <div class="flex justify-end space-x-2">
              <button onclick="submit()" id="napthe" class="btn space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                <span>Nạp Thẻ</span>
              </button>
            </div>
          </div>
    </div>
      
    </div>


          <!-- Basic Table -->
          <div class="col-span-12 sm:col-span-12">
              <div class="card p-4 sm:p-5">
            <div class="my-3 flex h-8 items-center justify-between">
              <h2 class="font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100 lg:text-base">
              Lịch Sử Nạp Thẻ
              </h2>
            </div>
            <div>
              <div class="mt-5">
                <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                  <table class="w-full text-left">
                    <thead>
                      <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                        <th class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5 ">
                        ID
                        </th>
                        <th class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                        Serial
                        </th>
                        <th class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                        Mã Thẻ
                        </th>
                        <th class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                        Mệnh Giá Thẻ
                        </th>
                        <th class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                        Loại Thẻ
                        </th>
                        <th class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">
                        Trang Thái
                        </th>
                      </tr>
                    </thead>
                    <tbody  class="dark:bg-slate-800">
                        
                        <?php
                          $query = $connect->query("SELECT * FROM DataCard WHERE username = '".$getUser['username']."' ORDER BY id DESC");
                          foreach($query as $row){
                              $id+=1;
                          ?>
                          
                          <tr>
                          <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">#<?=$row['id'];?></td>
                          <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400"><?=$row['serial'];?></td>
                          <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400"><?=$row['pin'];?></td>
                          <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400"><?=Monney($row['amount']);?><sup>đ</sup></td>
                          <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400"><?=$row['type'];?></td>
                          <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400"><?=StatusCard($row['status']);?></td>
                          </tr>
                          <?php
                          }
                          ?>
                          
                      </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>

        </div>
        </div>
</main>


  <script>
      function submit(){
          $('#napthe').html('Loading...').prop('disabled', true);
          $.ajax({
            url: "/assets/ajaxs/nthe.php",
            method: "POST",
            data: {
                pin: $("#pin").val(),
                serial: $("#serial").val(),
                amount: $("#amount").val(),
                type: $("#type").val()
            },
            success: function(response) {
                var data = JSON.parse(response);
                
                swal('Thông Báo', data.message, data.status);
                
                if(data.status == 'success'){
                    window.location.href="";
                }
                
                $('#napthe').html('<span>Nạp Thẻ</span>').prop('disabled', false);
            }
        });
      }
      </script>



<?php
include('../system/footer.php');
?>