 <!--
//////////////////////////////////////////////////////////////////////
//Thế gian không nợ ta điều gì, nhân quả báo ứng không chừa một ai!///
//                   ĐỪNG COPY CODE EM =)))                       ////
//                          _ooOoo_                               ////
//                         o8888888o                              ////
//                         88" . "88                              ////
//                         (| ^_^ |)                              ////
//                         O\  =  /O                              ////
//                      ____/`---'\____                           ////
//                    .'  \\|     |//  `.                         ////
//                   /  \\|||  :  |||//  \                        ////
//                  /  _||||| -:- |||||-  \                       ////
//                  |   | \\\  -  /// |   |                       ////
//                  | \_|  ''\---/''  |   |                       ////
//                  \  .-\__  `-`  ___/-. /                       ////
//                ___`. .'  /--.--\  `. . ___                     ////
//              ."" '<  `.___\_<|>_/___.'  >'"".                  ////
//            | | :  `- \`.;`\ _ /`;.`/ - ` : | |                 ////
//            \  \ `-.   \_ __\ /__ _/   .-` /  /                 ////
//      ========`-.____`-.___\_____/___.-`____.-'========         ////
//                           `=---='                              ////
//      ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^        ////
//          Quay đầu là bờ , mau tắt f12 đi !!                    ////
//                      facebook.com/mphatdz                      ////
/////////////////////////////////////////////////////////////////////-->
<?php
include('config.php');
?>

<!DOCTYPE html>
<html lang="en">
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
    <script src="/js/app.js" defer>
        
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10">
        
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.5/sweetalert2.all.js">
        
    </script>
    <script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous">
        
    </script>
    <script src="https://unpkg.com/sweetalert%402.1.2/dist/sweetalert.min.js">
        
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js">
        
    </script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap"
      rel="stylesheet"
    />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js">
        
    </script>

    
    <script>
      localStorage.getItem("_x_darkMode_on") === "true" &&
        document.documentElement.classList.add("dark");
    </script>
    
  </head>

<body x-data class="is-header-blur" x-bind="$store.global.documentBody">
    <!-- App preloader-->
    <div
      class="app-preloader fixed z-50 grid h-full w-full place-content-center bg-slate-50 dark:bg-navy-900"
    >
      <div class="app-preloader-inner relative inline-block h-48 w-48">
          
      </div>
    </div>

    <!-- Page Wrapper -->
    <div
      id="root"
      class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900"
      x-cloak
    >
      <!-- Sidebar -->
      <div class="sidebar print:hidden">
        <!-- Main Sidebar -->
        <div class="main-sidebar">
          <div
            class="flex h-full w-full flex-col items-center border-r border-slate-150 bg-white dark:border-navy-700 dark:bg-navy-800"
          >
            <!-- Application Logo -->
            <div class="flex pt-4">
              <a href="/">
                <img
                  class="h-11 w-11 transition-transform duration-500 ease-in-out hover:rotate-[360deg]"
                  src="/images/app-logo.svg"
                  alt="logo"
                />
              </a>
            </div>

            <!-- Main Sections Links -->
            <div
              class="is-scrollbar-hidden flex grow flex-col space-y-4 overflow-y-auto pt-6"
            >
              <!-- Dashobards -->
              <a
                href="/"
                class="flex h-11 w-11 items-center justify-center rounded-lg bg-primary/10 text-primary outline-none transition-colors duration-200 hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-navy-600 dark:text-accent-light dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
                x-tooltip.placement.right="'Trang Chủ'"
              >
                <svg
                  class="h-7 w-7"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                >
                  <path
                    fill="currentColor"
                    fill-opacity=".3"
                    d="M5 14.059c0-1.01 0-1.514.222-1.945.221-.43.632-.724 1.453-1.31l4.163-2.974c.56-.4.842-.601 1.162-.601.32 0 .601.2 1.162.601l4.163 2.974c.821.586 1.232.88 1.453 1.31.222.43.222.935.222 1.945V19c0 .943 0 1.414-.293 1.707C18.414 21 17.943 21 17 21H7c-.943 0-1.414 0-1.707-.293C5 20.414 5 19.943 5 19v-4.94Z"
                  />
                  <path
                    fill="currentColor"
                    d="M3 12.387c0 .267 0 .4.084.441.084.041.19-.04.4-.204l7.288-5.669c.59-.459.885-.688 1.228-.688.343 0 .638.23 1.228.688l7.288 5.669c.21.163.316.245.4.204.084-.04.084-.174.084-.441v-.409c0-.48 0-.72-.102-.928-.101-.208-.291-.355-.67-.65l-7-5.445c-.59-.459-.885-.688-1.228-.688-.343 0-.638.23-1.228.688l-7 5.445c-.379.295-.569.442-.67.65-.102.208-.102.448-.102.928v.409Z"
                  />
                  <path
                    fill="currentColor"
                    d="M11.5 15.5h1A1.5 1.5 0 0 1 14 17v3.5h-4V17a1.5 1.5 0 0 1 1.5-1.5Z"
                  />
                  <path
                    fill="currentColor"
                    d="M17.5 5h-1a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5Z"
                  />
                </svg>
              </a>
              
              
                <a href="/Webdesign"
                class="flex h-11 w-11 items-center justify-center rounded-lg outline-none transition-colors duration-200 hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                x-tooltip.placement.right="'Tạo Trang Web '"
              >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
</svg>
              </a>
               <a href="/Source"
                class="flex h-11 w-11 items-center justify-center rounded-lg outline-none transition-colors duration-200 hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                x-tooltip.placement.right="'Mã Nguồn '"
              >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5" />
</svg>
              </a>
              
                <a href="/Design"
                class="flex h-11 w-11 items-center justify-center rounded-lg outline-none transition-colors duration-200 hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                x-tooltip.placement.right="'Thiết Kế Ảnh'"
              >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
</svg>

              </a>
             <a href="/Recharge"
                class="flex h-11 w-11 items-center justify-center rounded-lg outline-none transition-colors duration-200 hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                x-tooltip.placement.right="'Nạp Tiền '"
              >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />
</svg>
              </a>
 
            </div>


  
            <?php
            if(isset($_SESSION['users'])){
            ?>
            
<div class="flex flex-col items-center space-y-3 py-3">
              <!-- Profile -->
              <div x-data="usePopper({placement:'right-end',offset:12})" @click.outside="isShowPopper &amp;&amp; (isShowPopper = false)" class="flex">
                <button @click="isShowPopper = !isShowPopper" x-ref="popperRef" class="avatar h-12 w-12">
                  <img class="rounded-full" src="https://i.imgur.com/tsOVyFD.jpg" alt="avatar">
                  <span class="absolute right-0 h-3.5 w-3.5 rounded-full border-2 border-white bg-success dark:border-navy-700"></span>
                </button>

                <div :class="isShowPopper &amp;&amp; 'show'" class="popper-root fixed" x-ref="popperRoot" style="position: fixed; inset: auto auto 0px 0px; margin: 0px; transform: translate(76px, -12px);" data-popper-placement="right-end">
                  <div class="popper-box w-64 rounded-lg border border-slate-150 bg-white shadow-soft dark:border-navy-600 dark:bg-navy-700">
                    <div class="flex items-center space-x-4 rounded-t-lg bg-slate-100 py-5 px-4 dark:bg-navy-800">
                      <div class="avatar h-14 w-14">
                        <img class="rounded-full" src="https://i.imgur.com/RPral0U.jpg" alt="avatar">
                      </div>
                      <div>
                        <a href="#" class="text-base font-medium text-slate-700 hover:text-primary focus:text-primary dark:text-navy-100 dark:hover:text-accent-light dark:focus:text-accent-light">
                          <?=$getUser['username'];?>                        </a>
                        <p class="text-xs text-slate-400 dark:text-navy-300">
                        <?=Monney($getUser['monney']);?>đ
                        </p>
                      </div>
                    </div>
                    <div class="flex flex-col pt-2 pb-5">
                      <a href="/Profile" class="group flex items-center space-x-3 py-2 px-4 tracking-wide outline-none transition-all hover:bg-slate-100 focus:bg-slate-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                        <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-warning text-white">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                          </svg>
                        </div>

                        <div>
                          <h2 class="font-medium text-slate-700 transition-colors group-hover:text-primary group-focus:text-primary dark:text-navy-100 dark:group-hover:text-accent-light dark:group-focus:text-accent-light">
                            Thông tin tài khoản
                          </h2>
                        </div>
                      </a>
                      
                      <div class="mt-3 px-4">
                        <a href="/Logout" class="btn h-9 w-full space-x-2 bg-primary text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                          </svg>
                          <span>Đăng xuất</span>
                        </a>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            
            <?php } ?>
            
            
                      </div>
        </div>

        <!-- Sidebar Panel -->
        <div class="sidebar-panel">
          <div
            class="flex h-full grow flex-col bg-white pl-[var(--main-sidebar-width)] dark:bg-navy-750"
          >
            <!-- Sidebar Panel Header -->
            <div
              class="flex h-18 w-full items-center justify-between pl-4 pr-1"
            >
              <img style="width: 90%" src="<?=$system32['sitename'];?>">
              <button
                @click="$store.global.isSidebarExpanded = false"
                class="btn h-7 w-7 rounded-full p-0 text-primary hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-accent-light/80 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 xl:hidden"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-6 w-6"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M15 19l-7-7 7-7"
                  />
                </svg>
              </button>
            </div>

            <!-- Sidebar Panel Body -->
            
            <?php
            if(isset($_SESSION['users'])){
            ?>
            
            
            <div x-data="{expandedItem:null}" class="h-[calc(100%-4.5rem)] overflow-x-hidden pb-6" x-init="$el._x_simplebar = new SimpleBar($el);" data-simplebar="init">
                <div class="simplebar-wrapper" style="margin: 0px 0px -24px;">
                <div class="simplebar-height-auto-observer-wrapper">
                <div class="simplebar-height-auto-observer">
                
            </div>
            </div>
            <div class="simplebar-mask">
                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: 100%; overflow: hidden;">
                <div class="simplebar-content" style="padding: 0px 0px 24px;">
                          <ul class="flex flex-1 flex-col px-4 font-inter">
                                  <div class="my-3 mx-4 h-px bg-slate-200 dark:bg-navy-500">
                                      
                                  </div>
                
                <button class="btn border border-primary/30 bg-primary/10 font-medium text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:border-accent-light/30 dark:bg-accent-light/10 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25">
                <li>
                  <a x-data="navLink" href="/Profile" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50">
                  <?=$getUser['username'];?> - <?=Monney($getUser['monney']);?>đ
                  </a>
                </li>
                </button>
              </ul>
              
              <div class="my-3 mx-4 h-px bg-slate-200 dark:bg-navy-500">
                  
              </div>
            
            <ul class="flex flex-1 flex-col px-4 font-inter">
                
               
              
              <li x-data="accordionItem('menu-item-1')">
                <a :class="expanded ? 'text-slate-800 font-semibold dark:text-navy-50' : 'text-slate-600 dark:text-navy-200  hover:text-slate-800  dark:hover:text-navy-50'" @click="expanded = !expanded" class="flex items-center justify-between py-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out text-slate-600 dark:text-navy-200 hover:text-slate-800 dark:hover:text-navy-50" href="javascript:void(0);">
                         <div class="flex items-center space-x-2">
                                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9">
                          
                      </path>
                    </svg>
                  <span class="font-semibold">Tạo Trang Web</span>
                  </div>
                  <button class="btn h-6 w-6 rounded-full bg-primary p-0 font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                  <svg :class="expanded &amp;&amp; 'rotate-90'" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-400 transition-transform ease-in-out" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                        
                    </path>
                  </svg>
                  </button>
                </a>
                <ul x-collapse="" x-show="expanded" style="display: none; height: 0px; overflow: hidden;" hidden="">
                  <li>
                    <a x-data="navLink" href="/Webdesign" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex items-center justify-between p-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4 text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50">
                      <div class="flex items-center space-x-2 badge bg-primary/10 text-primary dark:bg-accent-light/15 dark:text-accent-light">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 15l3-3m0 0l-3-3m3 3h-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                              
                          </path>
                        </svg>

                        <span>Tạo Trang Web</span>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a x-data="navLink" href="/Service/Web" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex items-center justify-between p-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4 text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50">
                      <div class="flex items-center space-x-2 badge bg-primary/10 text-primary dark:bg-accent-light/15 dark:text-accent-light">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 15l3-3m0 0l-3-3m3 3h-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                          
                      </path>
                    </svg>
                        <span>Lịch Sử Tạo Web</span>
                      </div>
                    </a>
                  </li>
                </ul>
              </li>
              
              
               <li x-data="accordionItem('menu-item-2')">
                <a :class="expanded ? 'text-slate-800 font-semibold dark:text-navy-50' : 'text-slate-600 dark:text-navy-200  hover:text-slate-800  dark:hover:text-navy-50'" @click="expanded = !expanded" class="flex items-center justify-between py-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out text-slate-600 dark:text-navy-200 hover:text-slate-800 dark:hover:text-navy-50" href="javascript:void(0);">
                         <div class="flex items-center space-x-2">
                       <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-opacity="0.5" d="M14.2498 16C14.2498 17.5487 13.576 18.9487 12.4998 19.9025C11.5723 20.7425 10.3473 21.25 8.99976 21.25C6.10351 21.25 3.74976 18.8962 3.74976 16C3.74976 13.585 5.39476 11.5375 7.61726 10.9337C8.22101 12.4562 9.51601 13.6287 11.1173 14.0662C11.5548 14.1887 12.0185 14.25 12.4998 14.25C12.981 14.25 13.4448 14.1887 13.8823 14.0662C14.1185 14.6612 14.2498 15.3175 14.2498 16Z" fill="currentColor"></path>
                  <path d="M17.75 9.00012C17.75 9.68262 17.6187 10.3389 17.3825 10.9339C16.7787 12.4564 15.4837 13.6289 13.8825 14.0664C13.445 14.1889 12.9813 14.2501 12.5 14.2501C12.0187 14.2501 11.555 14.1889 11.1175 14.0664C9.51625 13.6289 8.22125 12.4564 7.6175 10.9339C7.38125 10.3389 7.25 9.68262 7.25 9.00012C7.25 6.10387 9.60375 3.75012 12.5 3.75012C15.3962 3.75012 17.75 6.10387 17.75 9.00012Z" fill="currentColor"></path>
                  <path fill-opacity="0.3" d="M21.25 16C21.25 18.8962 18.8962 21.25 16 21.25C14.6525 21.25 13.4275 20.7425 12.5 19.9025C13.5763 18.9487 14.25 17.5487 14.25 16C14.25 15.3175 14.1187 14.6612 13.8825 14.0662C15.4837 13.6287 16.7787 12.4562 17.3825 10.9337C19.605 11.5375 21.25 13.585 21.25 16Z" fill="currentColor"></path>
                </svg>
                  <span class="font-semibold"> Mua Hosting </span>
                  </div>
                  <button class="btn h-6 w-6 rounded-full bg-primary p-0 font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                  <svg :class="expanded &amp;&amp; 'rotate-90'" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-400 transition-transform ease-in-out" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                        
                    </path>
                  </svg>
                  </button>
                </a>
                
                <ul x-collapse="" x-show="expanded" style="display: none; height: 0px; overflow: hidden;" hidden="">
                  <li>
                    <a x-data="navLink" href="/Hosting" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex items-center justify-between p-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4 text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50">
                      <div class="flex items-center space-x-2 badge bg-primary/10 text-primary dark:bg-accent-light/15 dark:text-accent-light">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 15l3-3m0 0l-3-3m3 3h-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                              
                          </path>
                        </svg>

                        <span> Mua Hosting </span>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a x-data="navLink" href="/Service/Hosting" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex items-center justify-between p-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4 text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50">
                      <div class="flex items-center space-x-2 badge bg-primary/10 text-primary dark:bg-accent-light/15 dark:text-accent-light">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 15l3-3m0 0l-3-3m3 3h-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                          
                      </path>
                    </svg>
                        <span> Quản Lý Hosting </span>
                      </div>
                    </a>
                  </li>
                </ul>
              </li>
              
              
              
              <li x-data="accordionItem('menu-item-3')">
                <a :class="expanded ? 'text-slate-800 font-semibold dark:text-navy-50' : 'text-slate-600 dark:text-navy-200  hover:text-slate-800  dark:hover:text-navy-50'" @click="expanded = !expanded" class="flex items-center justify-between py-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out text-slate-600 dark:text-navy-200 hover:text-slate-800 dark:hover:text-navy-50" href="javascript:void(0);">
                         <div class="flex items-center space-x-2">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5">
                          
                      </path>
                    </svg>

                  <span class="font-semibold">Mã Nguồn</span>
                  </div>
                  <button class="btn h-6 w-6 rounded-full bg-primary p-0 font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                  <svg :class="expanded &amp;&amp; 'rotate-90'" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-400 transition-transform ease-in-out" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                        
                    </path>
                  </svg>
                  </button>
                </a>
                <ul x-collapse="" x-show="expanded" style="display: none; height: 0px; overflow: hidden;" hidden="">
                  <li>
                    <a x-data="navLink" href="/Source" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex items-center justify-between p-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4 text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50">
                      <div class="flex items-center space-x-2 badge bg-primary/10 text-primary dark:bg-accent-light/15 dark:text-accent-light">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 15l3-3m0 0l-3-3m3 3h-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
      
  </path>
</svg>
                        <span>Mua Mã Nguồn</span>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a x-data="navLink" href="/Service/Source" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex items-center justify-between p-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4 text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50">
                      <div class="flex items-center space-x-2 badge bg-primary/10 text-primary dark:bg-accent-light/15 dark:text-accent-light">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 15l3-3m0 0l-3-3m3 3h-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
      
  </path>
</svg>
                        <span>Lịch Sử Mua Mã Nguồn</span>
                      </div>
                    </a>
                  </li>
                </ul>
                
              </li>
              <li x-data="accordionItem('menu-item-4')">
                <a :class="expanded ? 'text-slate-800 font-semibold dark:text-navy-50' : 'text-slate-600 dark:text-navy-200  hover:text-slate-800  dark:hover:text-navy-50'" @click="expanded = !expanded" class="flex items-center justify-between py-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out text-slate-600 dark:text-navy-200 hover:text-slate-800 dark:hover:text-navy-50" href="javascript:void(0);">
                         <div class="flex items-center space-x-2">
                                       <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z">
      
  </path>
</svg>
                  <span class="font-semibold">Thiết Kế Logo</span>
                  </div>
                  <button class="btn h-6 w-6 rounded-full bg-primary p-0 font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                  <svg :class="expanded &amp;&amp; 'rotate-90'" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-400 transition-transform ease-in-out" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                        
                    </path>
                  </svg>
                  </button>
                </a>
                <ul x-collapse="" x-show="expanded" style="display: none; height: 0px; overflow: hidden;" hidden="">
                  <li>
                    <a x-data="navLink" href="/Design" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex items-center justify-between p-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4 text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50">
                      <div class="flex items-center space-x-2 badge bg-primary/10 text-primary dark:bg-accent-light/15 dark:text-accent-light">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 15l3-3m0 0l-3-3m3 3h-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                              
                          </path>
                        </svg>
                        <span>Tạo Thiết Kế</span>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a x-data="navLink" href="/Service/Design" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex items-center justify-between p-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4 text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50">
                      <div class="flex items-center space-x-2 badge bg-primary/10 text-primary dark:bg-accent-light/15 dark:text-accent-light">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 15l3-3m0 0l-3-3m3 3h-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
      
  </path>
</svg>

                        <span>Lịch Sử Thiết Kế</span>
                      </div>
                    </a>
                  </li>
                </ul>
                
                     </li>
                     
                     
                <li x-data="accordionItem('menu-item-5')">
                  <a :class="expanded ? 'text-slate-800 font-semibold dark:text-navy-50' : 'text-slate-600 dark:text-navy-200  hover:text-slate-800  dark:hover:text-navy-50'" @click="expanded = !expanded" class="flex items-center justify-between py-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out text-slate-600 dark:text-navy-200 hover:text-slate-800 dark:hover:text-navy-50" href="javascript:void(0);">
                      <div class="flex items-center space-x-2">
                          
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z">
                          
                      </path>
                    </svg>
                    <span class="font-semibold">Nạp Tiền</span>
                    </div>
                    <button class="btn h-6 w-6 rounded-full bg-primary p-0 font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                    <svg :class="expanded &amp;&amp; 'rotate-90'" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-400 transition-transform ease-in-out" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                          
                      </path>
                    </svg>
                    </button>
                  </a>
                     <ul x-collapse="" x-show="expanded" style="display: none; height: 0px; overflow: hidden;" hidden="">
                    <li>
                      <a x-data="navLink" href="/Recharge" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex items-center justify-between p-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4 text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50">
                        <div class="flex items-center space-x-2 badge bg-primary/10 text-primary dark:bg-accent-light/15 dark:text-accent-light">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 15l3-3m0 0l-3-3m3 3h-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                              
                          </path>
                        </svg>
                          <span>Nạp Thẻ Cào</span>
                        </div>
                      </a>
                    </li>
                    
                    <li>
                      <a x-data="navLink" href="/Banks" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex items-center justify-between p-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4 text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50">
                        <div class="flex items-center space-x-2 badge bg-primary/10 text-primary dark:bg-accent-light/15 dark:text-accent-light">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 15l3-3m0 0l-3-3m3 3h-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                              
                          </path>
                        </svg>
                          <span>Chuyển Khoản</span>
                        </div>
                      </a>
                    </li>
                  </ul>
                </li>
              
                     <li x-data="accordionItem('menu-item-6')">
                <a href="/Giftcode" :class="expanded ? 'text-slate-800 font-semibold dark:text-navy-50' : 'text-slate-600 dark:text-navy-200  hover:text-slate-800  dark:hover:text-navy-50'" @click="expanded = !expanded" class="flex items-center justify-between py-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out text-slate-600 dark:text-navy-200 hover:text-slate-800 dark:hover:text-navy-50" href="javascript:void(0);">
                         <div class="flex items-center space-x-2">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z">
      
  </path>
</svg>

                  <span class="font-semibold"> Mã Giảm Giá </span>
                  </div>
                  <button class="btn h-6 w-6 rounded-full bg-primary p-0 font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                  <svg :class="expanded &amp;&amp; 'rotate-90'" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-400 transition-transform ease-in-out" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                        
                    </path>
                  </svg>
                  </button>
                </a>
                
                 </li>
                 
                 
                 
                <li x-data="accordionItem('menu-item-7')">
              <a :class="expanded ? 'text-slate-800 font-semibold dark:text-navy-50' : 'text-slate-600 dark:text-navy-200  hover:text-slate-800  dark:hover:text-navy-50'" @click="expanded = !expanded" class="flex items-center justify-between py-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out text-slate-600 dark:text-navy-200 hover:text-slate-800 dark:hover:text-navy-50" href="javascript:void(0);">
                       <div class="flex items-center space-x-2">
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
<path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z">
      
  </path>
</svg>
              <span class="font-semibold">Liên Hệ</span>
                 </div>
                <button class="btn h-6 w-6 rounded-full bg-primary p-0 font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                <svg :class="expanded &amp;&amp; 'rotate-90'" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-400 transition-transform ease-in-out" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                        
               </path>
   </svg>
          </button>
              </a>
           <ul x-collapse="" x-show="expanded" style="display: none; height: 0px; overflow: hidden;" hidden="">
               <li>
                   <a x-data="navLink" href="https://www.facebook.com/mphatdz" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex items-center justify-between p-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4 text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50">
                    <div class="flex items-center space-x-2 badge bg-primary/10 text-primary dark:bg-accent-light/15 dark:text-accent-light"> 
                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
 <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 15l3-3m0 0l-3-3m3 3h-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
      
  </path>
</svg>
                       <span>Facebook</span>                    </div>
                  </a>
              </li>
             <li>
                   <a x-data="navLink" href="https://zalo.me/Taminhphat9569" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex items-center justify-between p-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4 text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50">
                    <div class="flex items-center space-x-2 badge bg-primary/10 text-primary dark:bg-accent-light/15 dark:text-accent-light"> 
                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
 <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 15l3-3m0 0l-3-3m3 3h-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
      
  </path>
</svg>
                       <span>Zalo</span>                    </div>
                  </a>
              </li>
                <li>
                   <a x-data="navLink" href="https://www.youtube.com/@mphatdz" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex items-center justify-between p-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4 text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50">
                     <div class="flex items-center space-x-2 badge bg-primary/10 text-primary dark:bg-accent-light/15 dark:text-accent-light">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 15l3-3m0 0l-3-3m3 3h-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
      
 </path>
</svg>
            <span>Youtube</span>
         </div>
            </a>
                  </li>
     <li>
                 <a x-data="navLink" href="https://zalo.me/g/ikywze265" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex items-center justify-between p-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4 text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50">
                <div class="flex items-center space-x-2 badge bg-primary/10 text-primary dark:bg-accent-light/15 dark:text-accent-light">
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
 <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 15l3-3m0 0l-3-3m3 3h-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
      
</path>
</svg>

                     <span>Nhóm Zalo</span>
                      </div>
                   </a>
                </li>
              </ul>  
           </li>


<?php if ($getUser['level'] == admin):?>

 <li x-data="accordionItem('menu-item-6')">
                <a href="/admin" :class="expanded ? 'text-slate-800 font-semibold dark:text-navy-50' : 'text-slate-600 dark:text-navy-200  hover:text-slate-800  dark:hover:text-navy-50'" @click="expanded = !expanded" class="flex items-center justify-between py-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out text-slate-600 dark:text-navy-200 hover:text-slate-800 dark:hover:text-navy-50" href="javascript:void(0);">
                         <div class="flex items-center space-x-2">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z">
      
  </path>
</svg>

                  <span class="font-semibold"> Quản Trị Viên </span>
                  </div>
                  <button class="btn h-6 w-6 rounded-full bg-primary p-0 font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                  <svg :class="expanded &amp;&amp; 'rotate-90'" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-400 transition-transform ease-in-out" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                        
                    </path>
                  </svg>
                  </button>
                </a>
                
                 </li>
                 
<?php endif?>



            </ul>
            <div class="my-3 mx-4 h-px bg-slate-200 dark:bg-navy-500">
                
            </div>
            
            <ul class="flex flex-1 flex-col px-4 font-inter">
                  <button class="btn border border-primary/30 bg-primary/10 font-medium text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:border-accent-light/30 dark:bg-accent-light/10 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25">
                <li>
                  <a x-data="navLink" href="/Logout" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50">
                  Đăng Xuất
                  </a>
                </li>
                </button>
              </ul>
                        
            </div>
            </div>
            </div>
            </div>
            <div class="simplebar-placeholder" style="width: 240px; height: 443px;">
                
            </div>
            </div>
            <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                <div class="simplebar-scrollbar" style="width: 0px; display: none;">
                
            </div>
            </div>
            <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                <div class="simplebar-scrollbar" style="height: 0px; display: none;">
                
            </div>
            </div>
            </div> 
            
            
            <?php } else { ?>
            
            <div
              x-data="{expandedItem:null}"
              class="h-[calc(100%-4.5rem)] overflow-x-hidden pb-6"
              x-init="$el._x_simplebar = new SimpleBar($el);"
            >
                        <ul class="flex flex-1 flex-col px-4 font-inter">
              <li>
                <a x-data="navLink" href="/Login" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50 font-semibold">
                  Đăng Nhập
                </a>
              </li>
              <li>
                <a x-data="navLink" href="/Register" :class="isActive ? 'font-medium text-primary dark:text-accent-light' : 'text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50'" class="flex py-2 text-xs+ tracking-wide outline-none transition-colors duration-300 ease-in-out text-slate-600 hover:text-slate-900 dark:text-navy-200 dark:hover:text-navy-50 font-semibold">
                  Đăng Ký
                </a>
              </li>
            </ul>
                        
            </div>
            
            <?php } ?>
            
            
          </div>
        </div>
      </div>

      <!-- App Header Wrapper-->
      <nav class="header before:bg-white dark:before:bg-navy-750 print:hidden">
        <!-- App Header  -->
        <div
          class="header-container relative flex w-full bg-white dark:bg-navy-750 print:hidden"
        >
          <!-- Header Items -->
          <div class="flex w-full items-center justify-between">
            <!-- Left: Sidebar Toggle Button -->
            <div class="h-7 w-7">
              <button
                class="menu-toggle ml-0.5 flex h-7 w-7 flex-col justify-center space-y-1.5 text-primary outline-none focus:outline-none dark:text-accent-light/80"
                :class="$store.global.isSidebarExpanded && 'active'"
                @click="$store.global.isSidebarExpanded = !$store.global.isSidebarExpanded"
              >
                <span>
                    
                </span>
                <span>
                    
                </span>
                <span>
                    
                </span>
              </button>
            </div>

            <!-- Right: Header buttons -->
            <div class="-mr-1.5 flex items-center space-x-2">

              <!-- Main Searchbar -->
              <template x-if="$store.breakpoints.smAndUp">
                <div
                  class="flex"
                  x-data="usePopper({placement:'bottom-end',offset:12})"
                  @click.outside="isShowPopper && (isShowPopper = false)"
                >
                  <div class="relative mr-4 flex h-8">
                    <input
                      placeholder="Search here..."
                      class="form-input peer h-full rounded-full bg-slate-150 px-4 pl-9 text-xs+ text-slate-800 ring-primary/50 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:text-navy-100 dark:placeholder-navy-300 dark:ring-accent/50 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                      :class="isShowPopper ? 'w-80' : 'w-60'"
                      @focus="isShowPopper= true"
                      type="text"
                      x-ref="popperRef"
                    />
                    <div
                      class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"
                    >
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-4.5 w-4.5 transition-colors duration-200"
                        fill="currentColor"
                        viewBox="0 0 24 24"
                      >
                        <path
                          d="M3.316 13.781l.73-.171-.73.171zm0-5.457l.73.171-.73-.171zm15.473 0l.73-.171-.73.171zm0 5.457l.73.171-.73-.171zm-5.008 5.008l-.171-.73.171.73zm-5.457 0l-.171.73.171-.73zm0-15.473l-.171-.73.171.73zm5.457 0l.171-.73-.171.73zM20.47 21.53a.75.75 0 101.06-1.06l-1.06 1.06zM4.046 13.61a11.198 11.198 0 010-5.115l-1.46-.342a12.698 12.698 0 000 5.8l1.46-.343zm14.013-5.115a11.196 11.196 0 010 5.115l1.46.342a12.698 12.698 0 000-5.8l-1.46.343zm-4.45 9.564a11.196 11.196 0 01-5.114 0l-.342 1.46c1.907.448 3.892.448 5.8 0l-.343-1.46zM8.496 4.046a11.198 11.198 0 015.115 0l.342-1.46a12.698 12.698 0 00-5.8 0l.343 1.46zm0 14.013a5.97 5.97 0 01-4.45-4.45l-1.46.343a7.47 7.47 0 005.568 5.568l.342-1.46zm5.457 1.46a7.47 7.47 0 005.568-5.567l-1.46-.342a5.97 5.97 0 01-4.45 4.45l.342 1.46zM13.61 4.046a5.97 5.97 0 014.45 4.45l1.46-.343a7.47 7.47 0 00-5.568-5.567l-.342 1.46zm-5.457-1.46a7.47 7.47 0 00-5.567 5.567l1.46.342a5.97 5.97 0 014.45-4.45l-.343-1.46zm8.652 15.28l3.665 3.664 1.06-1.06-3.665-3.665-1.06 1.06z"
                        />
                      </svg>
                    </div>
                  </div>
                
                </div>
              </template>
              <button @click="$store.global.isDarkModeEnabled = !$store.global.isDarkModeEnabled" class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                <svg x-show="$store.global.isDarkModeEnabled" x-transition:enter="transition-transform duration-200 ease-out absolute origin-top" x-transition:enter-start="scale-75" x-transition:enter-end="scale-100 static" class="h-6 w-6 text-amber-400" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M11.75 3.412a.818.818 0 01-.07.917 6.332 6.332 0 00-1.4 3.971c0 3.564 2.98 6.494 6.706 6.494a6.86 6.86 0 002.856-.617.818.818 0 011.1 1.047C19.593 18.614 16.218 21 12.283 21 7.18 21 3 16.973 3 11.956c0-4.563 3.46-8.31 7.925-8.948a.818.818 0 01.826.404z">
                      
                  </path>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" x-show="!$store.global.isDarkModeEnabled" x-transition:enter="transition-transform duration-200 ease-out absolute origin-top" x-transition:enter-start="scale-75" x-transition:enter-end="scale-100 static" class="h-6 w-6 text-amber-400" viewBox="0 0 20 20" fill="currentColor" style="display: none;">
                  <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd">
                      
                  </path>
                </svg>
              </button>
              
              
              <?php
              if(!isset($_SESSION['users'])){
              ?>
              
                 <div class="flex -space-x-px">
                 <a href="/Login" class="btn space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>                     </svg> Đăng nhập / Đăng kí
              </a>
                  </div>
                  
                  <?php } else { ?>
                  
                  <div class="flex -space-x-px">
                    <a href="/Profile" class="avatar h-12 w-12">
                  <img class="rounded-full" src="https://i.imgur.com/tsOVyFD.jpg" alt="avatar">
                  <span class="absolute right-0 h-3.5 w-3.5 rounded-full border-2 border-white bg-success dark:border-navy-700"></span>
                </a>
                  </div>
                  
                  <?php } ?>
                  
              </div>
          </div>
        </div>
      </nav>
      
      
      
      
      <!-- Mobile Searchbar -->
      <div
        x-show="$store.breakpoints.isXs && $store.global.isSearchbarActive"
        x-transition:enter="easy-out transition-all"
        x-transition:enter-start="opacity-0 scale-105"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="easy-in transition-all"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="fixed inset-0 z-[100] flex flex-col bg-white dark:bg-navy-700 sm:hidden"
      >
        <div
          class="flex items-center space-x-2 bg-slate-100 px-3 pt-2 dark:bg-navy-800"
        >
          <button
            class="btn -ml-1.5 h-7 w-7 shrink-0 rounded-full p-0 text-slate-600 hover:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-100 dark:hover:bg-navy-300/20 dark:active:bg-navy-300/25"
            @click="$store.global.isSearchbarActive = false"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-5 w-5"
              fill="none"
              stroke-width="1.5"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M15 19l-7-7 7-7"
              />
            </svg>
          </button>
          <input
            x-effect="$store.global.isSearchbarActive && $nextTick(() => $el.focus() );"
            class="form-input h-8 w-full bg-transparent placeholder-slate-400 dark:placeholder-navy-300"
            type="text"
            placeholder="Tìm kiếm..."
          />
        </div>

      </div>
