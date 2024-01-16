<?php
include('../system/config.php');

if(isset($_POST['login'])){
    $username = AntiXss($_POST['username']);
    $password = $_POST['password'];
    $checkLimit = $connect->query("SELECT * FROM Users WHERE username = '$username' AND password = '".md5($password)."'")->num_rows;
    
    if(empty($username) || empty($password)){
        echo swal('Vui lòng nhập đủ thông tin!','error');
    } else if($checkLimit >= 1){
        echo swal('Đăng nhập thành công!','success');
        $_SESSION['users'] = $username;
        echo redirect('/');
    } else {
        echo swal('Mật khẩu không đúng. Vui lòng nhập lại!','error');
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <!-- Meta tags  -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
    />
 <meta name="description" content="<?=$system32['desciption'];?>">
    <meta name="keywords" content="<?=$system32['desciption'];?>">
    <title> <?=$system32['title'];?> </title>
    <link rel="icon" type="image/png" href="<?=$system32['shortcut_icon'];?>" />

    <!-- CSS Assets -->
    <link rel="stylesheet" href="/css/app.css" />

    <!-- Javascript Assets -->
    <script src="/js/app.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.5/sweetalert2.all.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
     
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap"
      rel="stylesheet"
    />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

    
    <script>
      /**
       * THIS SCRIPT REQUIRED FOR PREVENT FLICKERING IN SOME BROWSERS
       */
      localStorage.getItem("_x_darkMode_on") === "true" &&
        document.documentElement.classList.add("dark");
    </script>
  </head>
 <body x-data class="is-header-blur" x-bind="$store.global.documentBody">
    <!-- App preloader-->
    <div
      class="app-preloader fixed z-50 grid h-full w-full place-content-center bg-slate-50 dark:bg-navy-900"
    >
      <div class="app-preloader-inner relative inline-block h-48 w-48"></div>
    </div>

    <!-- Page Wrapper -->
    <div
      id="root"
      class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900"
      x-cloak
    >
      <div class="fixed top-0 hidden p-6 lg:block lg:px-12">
        <a href="#" class="flex items-center space-x-2">
          <img class="h-12 w-12" src="images/app-logo.svg" alt="logo" />
          <p
            class="text-xl font-semibold uppercase text-slate-700 dark:text-navy-100"
          >
            <?=inHoaString($_SERVER['SERVER_NAME']);?>
          </p>
        </a>
      </div>
      <div class="hidden w-full place-items-center lg:grid">
        <div class="w-full max-w-lg p-6">
          <img
            class="w-full"
            x-show="!$store.global.isDarkModeEnabled"
            src="images/illustrations/dashboard-check.svg"
            alt="image"
          />
          <img
            class="w-full"
            x-show="$store.global.isDarkModeEnabled"
            src="images/illustrations/dashboard-check-dark.svg"
            alt="image"
          />
        </div>
      </div>
      <main
        class="flex w-full flex-col items-center bg-white dark:bg-navy-700 lg:max-w-md"
      >
        <div class="flex w-full max-w-sm grow flex-col justify-center p-5">
          <div class="text-center">
            <img
              class="mx-auto h-16 w-16 lg:hidden"
              src="images/app-logo.svg"
              alt="logo"
            />
            <div class="mt-4">
              <h2
                class="text-2xl font-semibold text-slate-600 dark:text-navy-100"
              >
              Đăng Nhập Tài Khoản
              </h2>
              <p class="text-slate-400 dark:text-navy-300">
             
Đăng Nhập Tài Khoản Để Đến Trang Khách Hàng Và Hoàn Thành Các Giao Dịch!              </p>
            </div>
          </div>
          <div class="mt-16">
                                            <label class="relative flex">
              <input
                class="form-input peer w-full rounded-lg bg-slate-150 px-3 py-2 pl-9 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                placeholder="Tên đăng nhập"
                id="username"
                type="text"
              />
              <span
                class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-5 w-5 transition-colors duration-200"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1.5"
                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                  />
                </svg>
              </span>
            </label>
            <label class="relative mt-4 flex">
              <input
                class="form-input peer w-full rounded-lg bg-slate-150 px-3 py-2 pl-9 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                placeholder="Mật khẩu"
                id="password"
                type="password"
              />
              <span
                class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-5 w-5 transition-colors duration-200"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1.5"
                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"
                  />
                </svg>
              </span>
            </label>
            <div class="mt-4 flex items-center justify-between space-x-2">
              <label class="inline-flex items-center space-x-2">
                <input
                  class="form-checkbox is-outline h-5 w-5 rounded border-slate-400/70 bg-slate-100 before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-500 dark:bg-navy-900 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent"
                  type="checkbox"
                />
                <span class="line-clamp-1">Nhớ tài khoản</span>
              </label>
              <a
                href="#"
                class="text-xs text-slate-400 transition-colors line-clamp-1 hover:text-slate-800 focus:text-slate-800 dark:text-navy-300 dark:hover:text-navy-100 dark:focus:text-navy-100"
                >Quên mật khẩu?</a
              >
            </div>
            <button id="Login" onclick="submit()"
              class="btn mt-10 h-10 w-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90" type="submit" name="login"
            >
             <i class="fa fa-fw fa-sign-in-alt opacity-50 me-1"></i> Đăng Nhập
            </button>
            <div class="mt-4 text-center text-xs+">
              <p class="line-clamp-1">
                <span>Chưa có tài khoản?</span>

                <a
                  class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"
                  href="/Register"
                  >Đăng kí tài khoản</a
                >
              </p>
            </div>
            <div class="my-7 flex items-center space-x-3">
              <div class="h-px flex-1 bg-slate-200 dark:bg-navy-500"></div>
              <p>OR</p>
              <div class="h-px flex-1 bg-slate-200 dark:bg-navy-500"></div>
            </div>
            <div class="flex space-x-4">
              <button
                id="google-login-btn"
                class="btn w-full space-x-3 border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90"
              >
                <img
                  class="h-5.5 w-5.5"
                  src="images/logos/google.svg"
                  alt="logo"
                />
                <span >Google</span>
              </button>
              <button
                class="btn w-full space-x-3 border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90"
              >
                <img
                  class="h-5.5 w-5.5"
                  src="https://i.imgur.com/odocAUV.png"
                  alt="logo"
                />
                <span>Facebook</span>
              </button>
            </div>
          </div>

        </div>
       
      </main>
    </div>
    
    
     <script>
      function submit(){
          $('#Login').html('Loading...').prop('disabled', true);
          $.ajax({
            url: "/assets/ajaxs/auth.php",
            method: "POST",
            data: {
                type: 'login',
                username: $("#username").val(),
                password: $("#password").val()
            },
            success: function(response) {
                var data = JSON.parse(response);
                
                swal('Thông Báo', data.message, data.status);
                
                if(data.status == 'success'){
                    window.location.href="/";
                }
                
                $('#Login').html('<i class="fa fa-fw fa-sign-in-alt opacity-50 me-1"></i> Đăng Nhập').prop('disabled', false);
            }
        });
      }
  </script>
  

    <div id="x-teleport-target"></div>
    <script>
    document.getElementById('google-login-btn').addEventListener('click', function() {
        window.location.href = 'google-auth.php';
    });
    </script>
    <script>
      window.addEventListener("DOMContentLoaded", () => Alpine.start());
    </script>
      <script src="/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/chart.js/chart.min.js"></script>
  <script src="/assets/vendor/echarts/echarts.min.js"></script>
  <script src="/assets/vendor/quill/quill.min.js"></script>
  <script src="/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="/assets/vendor/tinymce/tinymce.min.js"></script>
  </body>
</html>