<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <title>Dashboard | User</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- App favicon -->
      <link rel="shortcut icon" href="favicon.png">
      <!-- plugin css -->
      <link href="{{ asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />
      <!-- preloader css -->
      <link rel="stylesheet" href="{{ asset('assets/css/preloader.min.css') }}" type="text/css" />
      <!-- Bootstrap Css -->
      <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
      <!-- Icons Css -->
      <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
      <!-- App Css-->
      <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.min.css" integrity="sha512-cyIcYOviYhF0bHIhzXWJQ/7xnaBuIIOecYoPZBgJHQKFPo+TOBA+BY1EnTpmM8yKDU4ZdI3UGccNGCEUdfbBqw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.all.min.js" integrity="sha512-IZ95TbsPTDl3eT5GwqTJH/14xZ2feLEGJRbII6bRKtE/HC6x3N4cHye7yyikadgAsuiddCY2+6gMntpVHL1gHw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="https://unpkg.com/feather-icons"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   </head>
   <style>
   body {
       background-color: #141722 !important;
   }

   .vertical-menu,
   .navbar-header,
   .footer,
   .rightbar-overlay {
       background-color: #141722 !important;
   }

   .card {
    background-color: #141722 !important;
    color: white !important;
   }

   .card .text-muted {
      color: #dcdcdc !important;
   }
   </style>
   <header id="page-topbar">
      <div class="navbar-header">
         <div class="d-flex">
            <!-- LOGO -->
            
            <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
            <i class="fa fa-fw fa-bars"></i>
            </button>
            
         </div>


         
         <div class="d-flex">
            <div class="mt-3  d-sm-inline-block">
               <div id="google_translate_element"></div>
            </div>
            <div class="dropdown d-inline-block  ms-2">
               <button type="button" class="btn header-item" id="mode-setting-btn">
               {{-- <i data-feather="moon" class="icon-lg layout-mode-dark"></i>
               <i data-feather="sun" class="icon-lg layout-mode-light"></i> --}}
               </button>
            </div>
            <div class="dropdown d-inline-block">
               <button type="button" class="btn header-item bg-soft-light border-start border-end" id="page-header-user-dropdown"
                  data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <img class="rounded-circle header-profile-user" src="{{ asset('assets/images/users/avatar-1.png') }}"
                  alt="Header Avatar">
               <span class="d-none d-xl-inline-block ms-1 fw-medium">{{ Auth::user()->fullname }}</span>
               <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
               </button>
               <div class="dropdown-menu dropdown-menu-end">
                  <!-- item-->
                  <a class="dropdown-item" href="{{ route('profile') }}"><i class="mdi mdi-face-profile font-size-16 align-middle me-1"></i> Profile</a>
                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                     Logout
                  </a>

                  
               </div>
            </div>
         </div>
      </div>
      <div class="vertical-menu">
         <div data-simplebar class="h-100">
            <!--- Sidemenu -->
            <div id="sidebar-menu">
               <!-- Left Menu Start -->
               <ul class="metismenu list-unstyled" id="side-menu">
                  <li class="menu-title" data-key="t-menu">Menu</li>
                  <li>
                     <a href="{{ route('dashboard') }}">
                     <i data-feather="home"></i>
                     <span data-key="t-dashboard">Dashboard</span>
                     </a>
                  </li>
                  {{-- <li>
                     <a href="{{ route('Investments') }}">
                     <i class="fa fa-tags" style="font-size: 15px"></i>
                     <span data-key="t-dashboard">Plans</span>
                     </a>
                  </li> --}}
                  {{-- <li>
                     <a href="{{ route('Transactions') }}">
                     <i data-feather="credit-card"></i>
                     <span data-key="t-dashboard">Transactions</span>
                     </a>
                  </li> --}}

                  {{-- <li>
                     <a href="{{ route('Transactions') }}">
                     <i data-feather="credit-card"></i>
                     <span data-key="t-dashboard">Deposit</span>
                     </a>
                  </li> --}}

                  <li>
                     <a href="{{ route('profile') }}">
                     <i data-feather="user"></i>
                     <span data-key="t-dashboard">My Profile</span>
                     </a>
                  </li>

                   <li>
                     <a href="{{ route('kyc_upload') }}">
                     <i data-feather="user"></i>
                     <span data-key="t-dashboard">Account Upgrade</span>
                     </a>
                  </li>

                  <li>
                     <a href="{{ route('portfolio') }}">
                     <i class="fa fa-rocket" style="font-size: 15px"></i>
                     <span data-key="t-dashboard">Portfolio</span>
                     </a>
                  </li>


                  <!--<li class="menu-title mt-2" data-key="t-components">Finances</li>-->
                  <li>
                     <a href="{{ route('deposit') }}">
                     <i data-feather="credit-card"></i>
                     <span data-key="t-dashboard">Deposit</span>
                     </a>
                  </li>
                  
                 
                  <li>
                     <a href="{{ route('withdrawal') }}">
                     <i data-feather="briefcase"></i>
                     <span data-key="t-dashboard">Withdraw Funds</span>
                     </a>
                  </li>

                  {{-- <li>
                     <a href="{{ route('copy_trade') }}">
                     <i class="fa fa-users" style="font-size: 15px;"></i>
                     <span data-key="t-dashboard">Copy Experts</span>
                     </a>
                  </li> --}}


                  {{-- <li>
                     <a href="{{ route('purchase_signals') }}">
                     <i class="fa fa-users" style="font-size: 15px;"></i>
                     <span data-key="t-dashboard">Purchase Signals</span>
                     </a>
                  </li> --}}



                  {{-- <li>
                     <a href="{{ route('copy_trade') }}">
                     <i class="fa fa-users" style="font-size: 15px;"></i>
                     <span data-key="t-dashboard">Loans</span>
                     </a>
                  </li> --}}

                  <li class="menu-title mt-2" data-key="t-components">Extras</li>
                  <li>
                     <a href="{{ route('referral') }}">
                     <i data-feather="users"></i>
                     <span data-key="t-dashboard">Manage Referrals</span>
                     </a>
                  </li>
                  <li>
                     <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                         <i data-feather="log-out"></i>
                         <span data-key="t-logout">Logout</span>
                     </a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                         @csrf
                     </form>
                  </li>
                  
                  
                  
               </ul>
            </div>
         </div>
      </div>
   </header>
   {{-- Logout Script --}}
   <script>
      document.querySelector('a[href="{{ route('logout') }}"]').addEventListener('click', function(event) {
          event.preventDefault();
          document.getElementById('logout-form').submit();
      });
   </script>
   <body data-sidebar-size="lg" data-layout-mode="dark" data-topbar="dark" data-sidebar="dark">



      @yield('content')
      






   
      <!-- FOOTER -->
      <footer class="footer">
         <div class="container-fluid">
         <div class="row">
            <div class="col-sm-6">
               <script>document.write(new Date().getFullYear())</script> © TRADEZELLA MARKETS
               <div class="col-sm-6">
                  <div class="text-sm-end d-none d-sm-block">
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <script type="text/javascript">
         function googleTranslateElementInit() {
           new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
         }
      </script>
      <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
      <!-- Right bar overlay-->
      <div class="rightbar-overlay"></div>
       <!-- JAVASCRIPT -->
        <script>
            feather.replace()
        </script>
        <script src=" {{asset('assets/libs/jquery/jquery.min.js')}} "></script>
        <script src=" {{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}} "></script>
        <script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}} "></script>
        <script src="{{asset('assets/libs/simplebar/simplebar.min.js')}} "></script>
        <script src="{{asset('assets/libs/node-waves/waves.min.js')}} "></script>


        
        <!-- Plugins js-->
        <script src="{{asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js')}} "></script>
        <script src="{{asset('assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js')}} "></script>
        <!-- dashboard init -->
        <script src="{{asset('assets/js/pages/dashboard.init.js')}} "></script>
        <script src="{{asset('assets/js/app.js')}} "></script> 

                <!-- Smartsupp Live Chat script -->
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = '9dfd5bffea5780754909da7857454dcd26d7bed2';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>
<noscript>Powered by <a href="https://www.smartsupp.com" target="_blank">Smartsupp</a></noscript>
        
        
 <div id="ssa-activity-notification-root">
        <div class="ssa-activity-toast" aria-live="polite">
            <div class="ssa-activity-icon" aria-hidden="true"></div>

            <div class="ssa-activity-content">
                <div class="ssa-activity-top">
                    <span class="ssa-activity-name"></span>
                    <span class="ssa-activity-country">
                        from <span class="ssa-activity-country-value"></span>
                    </span>
                </div>

                <div class="ssa-activity-action">
                    just <span class="ssa-activity-action-value"></span>
                </div>

                <div class="ssa-activity-amount"></div>
            </div>

            <button type="button" class="ssa-activity-close" aria-label="Close notification">&times;</button>
        </div>
    </div>

    <script>
        (() => {
            "use strict";

            /* Prevent duplicate initialization if the snippet is injected twice. */
            if (window.__SSA_ACTIVITY_NOTIFICATION_LOADED__) return;
            window.__SSA_ACTIVITY_NOTIFICATION_LOADED__ = true;

            const root = document.getElementById("ssa-activity-notification-root");
            if (!root) return;

            /* =========================================================
               SCOPED STYLES
               Everything is prefixed with "ssa-" to avoid conflicts.
            ========================================================= */
            const style = document.createElement("style");
            style.textContent = `
        #ssa-activity-notification-root {
          all: initial;
          font-family: Arial, Helvetica, sans-serif;
        }
    
        #ssa-activity-notification-root .ssa-activity-toast {
          position: fixed;
          left: 14px;
          bottom: 14px;
          width: min(320px, calc(100vw - 28px));
          min-height: 72px;
          padding: 10px 38px 10px 12px;
          display: flex;
          align-items: center;
          gap: 10px;
          background: #363636;
          color: #fff;
          border-radius: 12px;
          box-shadow:
            0 12px 35px rgba(0, 0, 0, 0.25),
            0 2px 8px rgba(0, 0, 0, 0.12);
          transform: translateY(120px);
          opacity: 0;
          transition:
            transform 0.45s cubic-bezier(0.2, 0.8, 0.2, 1),
            opacity 0.45s ease;
          z-index: 999999;
          overflow: hidden;
          box-sizing: border-box;
        }
    
        #ssa-activity-notification-root .ssa-activity-toast.ssa-show {
          transform: translateY(0);
          opacity: 1;
        }
    
        #ssa-activity-notification-root .ssa-activity-icon {
          width: 32px;
          height: 32px;
          min-width: 32px;
          flex-shrink: 0;
          display: flex;
          align-items: center;
          justify-content: center;
          border: 1px solid #555;
          border-radius: 9px;
          box-sizing: border-box;
          transition:
            color 0.25s ease,
            border-color 0.25s ease,
            background 0.25s ease;
        }
    
        #ssa-activity-notification-root .ssa-activity-icon svg {
          width: 17px;
          height: 17px;
          fill: none;
          stroke: currentColor;
          stroke-width: 2;
          stroke-linecap: round;
          stroke-linejoin: round;
        }
    
        #ssa-activity-notification-root .ssa-activity-toast.ssa-deposit
          .ssa-activity-icon {
          color: #3b9cff;
          border-color: rgba(59, 156, 255, 0.45);
          background: rgba(59, 156, 255, 0.06);
        }
    
        #ssa-activity-notification-root .ssa-activity-toast.ssa-deposit
          .ssa-activity-action-value {
          color: #3b9cff;
        }
    
        #ssa-activity-notification-root .ssa-activity-toast.ssa-invested
          .ssa-activity-icon {
          color: #22c55e;
          border-color: rgba(34, 197, 94, 0.45);
          background: rgba(34, 197, 94, 0.06);
        }
    
        #ssa-activity-notification-root .ssa-activity-toast.ssa-invested
          .ssa-activity-action-value {
          color: #22c55e;
        }
    
        #ssa-activity-notification-root .ssa-activity-toast.ssa-withdrawn
          .ssa-activity-icon {
          color: #ff5b5b;
          border-color: rgba(255, 91, 91, 0.45);
          background: rgba(255, 91, 91, 0.06);
        }
    
        #ssa-activity-notification-root .ssa-activity-toast.ssa-withdrawn
          .ssa-activity-action-value {
          color: #ff5b5b;
        }
    
        #ssa-activity-notification-root .ssa-activity-content {
          flex: 1;
          min-width: 0;
          overflow: hidden;
        }
    
        #ssa-activity-notification-root .ssa-activity-top {
          width: 100%;
          font-size: 12px;
          line-height: 16px;
          white-space: nowrap;
          overflow: hidden;
          text-overflow: ellipsis;
        }
    
        #ssa-activity-notification-root .ssa-activity-name {
          font-weight: 700;
          color: #fff;
        }
    
        #ssa-activity-notification-root .ssa-activity-country {
          color: #bdbdbd;
          font-weight: 400;
        }
    
        #ssa-activity-notification-root .ssa-activity-action {
          margin-top: 2px;
          font-size: 12px;
          line-height: 15px;
          color: #d0d0d0;
          white-space: nowrap;
        }
    
        #ssa-activity-notification-root .ssa-activity-action-value {
          font-weight: 700;
          transition: color 0.25s ease;
        }
    
        #ssa-activity-notification-root .ssa-activity-amount {
          margin-top: 4px;
          font-size: 16px;
          line-height: 19px;
          font-weight: 700;
          letter-spacing: 0.1px;
          color: #fff;
          white-space: nowrap;
          overflow: hidden;
          text-overflow: ellipsis;
        }
    
        #ssa-activity-notification-root .ssa-activity-close {
          position: absolute;
          right: 8px;
          top: 8px;
          width: 21px;
          height: 21px;
          padding: 0;
          display: flex;
          align-items: center;
          justify-content: center;
          border: none;
          border-radius: 50%;
          background: #4b4b4b;
          color: #aaa;
          cursor: pointer;
          font-family: Arial, Helvetica, sans-serif;
          font-size: 16px;
          line-height: 21px;
          transition:
            background 0.2s ease,
            color 0.2s ease;
          box-sizing: border-box;
        }
    
        #ssa-activity-notification-root .ssa-activity-close:hover {
          background: #555;
          color: #fff;
        }
    
        @media (max-width: 360px) {
          #ssa-activity-notification-root .ssa-activity-toast {
            left: 10px;
            bottom: 10px;
            width: calc(100vw - 20px);
            min-height: 68px;
            padding: 9px 34px 9px 10px;
            gap: 8px;
            border-radius: 11px;
          }
    
          #ssa-activity-notification-root .ssa-activity-icon {
            width: 30px;
            height: 30px;
            min-width: 30px;
          }
    
          #ssa-activity-notification-root .ssa-activity-icon svg {
            width: 16px;
            height: 16px;
          }
    
          #ssa-activity-notification-root .ssa-activity-top {
            font-size: 11px;
            line-height: 15px;
          }
    
          #ssa-activity-notification-root .ssa-activity-action {
            font-size: 11px;
            line-height: 14px;
          }
    
          #ssa-activity-notification-root .ssa-activity-amount {
            margin-top: 3px;
            font-size: 15px;
            line-height: 18px;
          }
    
          #ssa-activity-notification-root .ssa-activity-close {
            right: 7px;
            top: 7px;
            width: 20px;
            height: 20px;
          }
        }
    
        @media (max-width: 300px) {
          #ssa-activity-notification-root .ssa-activity-toast {
            left: 8px;
            bottom: 8px;
            width: calc(100vw - 16px);
            padding-left: 8px;
            padding-right: 32px;
            gap: 7px;
          }
    
          #ssa-activity-notification-root .ssa-activity-icon {
            width: 28px;
            height: 28px;
            min-width: 28px;
          }
    
          #ssa-activity-notification-root .ssa-activity-top {
            font-size: 10px;
          }
    
          #ssa-activity-notification-root .ssa-activity-action {
            font-size: 10px;
          }
    
          #ssa-activity-notification-root .ssa-activity-amount {
            font-size: 14px;
          }
        }
      `;

            document.head.appendChild(style);

            /* =========================================================
               DATA
            ========================================================= */
            const ssaUsers = [
                { name: "Peter Olson", country: "Norway" },
                { name: "James Carter", country: "United States" },
                { name: "Emma Wilson", country: "United Kingdom" },
                { name: "Daniel Smith", country: "Canada" },
                { name: "Sofia Martin", country: "France" },
                { name: "Liam Anderson", country: "Australia" },
                { name: "Anna Schmidt", country: "Germany" },
                { name: "David Brown", country: "Ireland" },
                { name: "Oliver Johnson", country: "Sweden" },
                { name: "Lucas Silva", country: "Brazil" },
                { name: "Noah Williams", country: "Netherlands" },
                { name: "Mia Rossi", country: "Italy" }
            ];

            const ssaActivities = [
                {
                    text: "deposited",
                    className: "ssa-deposit",
                    icon: `
            <svg viewBox="0 0 24 24" aria-hidden="true">
              <path d="M12 4v15"></path>
              <path d="M6 13l6 6 6-6"></path>
            </svg>
          `
                },
                {
                    text: "invested",
                    className: "ssa-invested",
                    icon: `
            <svg viewBox="0 0 24 24" aria-hidden="true">
              <path d="M5 19L19 5"></path>
              <path d="M10 5h9v9"></path>
            </svg>
          `
                },
                {
                    text: "withdrew",
                    className: "ssa-withdrawn",
                    icon: `
            <svg viewBox="0 0 24 24" aria-hidden="true">
              <path d="M12 20V5"></path>
              <path d="M6 11l6-6 6 6"></path>
            </svg>
          `
                }
            ];

            const ssaAmounts = [
                500,
                750,
                1250,
                2500,
                5000,
                7500,
                8500,
                10000,
                12500,
                15000,
                25000,
                50000,
                75000,
                100000,
                250000,
                446325
            ];

            /* =========================================================
               ELEMENTS
            ========================================================= */
            const ssaToast = root.querySelector(".ssa-activity-toast");
            const ssaName = root.querySelector(".ssa-activity-name");
            const ssaCountry = root.querySelector(".ssa-activity-country-value");
            const ssaAction = root.querySelector(".ssa-activity-action-value");
            const ssaAmount = root.querySelector(".ssa-activity-amount");
            const ssaIcon = root.querySelector(".ssa-activity-icon");
            const ssaClose = root.querySelector(".ssa-activity-close");

            let ssaHideTimer = null;
            let ssaLastUser = null;
            let ssaLastActivity = null;

            function ssaRandomItem(array) {
                return array[Math.floor(Math.random() * array.length)];
            }

            function ssaGetRandomUser() {
                let user;

                do {
                    user = ssaRandomItem(ssaUsers);
                } while (ssaUsers.length > 1 && user === ssaLastUser);

                ssaLastUser = user;
                return user;
            }

            function ssaGetRandomActivity() {
                let activity;

                do {
                    activity = ssaRandomItem(ssaActivities);
                } while (
                    ssaActivities.length > 1 &&
                    activity === ssaLastActivity
                );

                ssaLastActivity = activity;
                return activity;
            }

            function ssaShowActivity() {
                const user = ssaGetRandomUser();
                const activity = ssaGetRandomActivity();
                const amount = ssaRandomItem(ssaAmounts);

                ssaName.textContent = user.name;
                ssaCountry.textContent = user.country;
                ssaAction.textContent = activity.text;
                ssaAmount.textContent = "$" + amount.toLocaleString();
                ssaIcon.innerHTML = activity.icon;

                ssaToast.classList.remove(
                    "ssa-deposit",
                    "ssa-invested",
                    "ssa-withdrawn"
                );

                ssaToast.classList.add(activity.className);
                ssaToast.classList.add("ssa-show");

                clearTimeout(ssaHideTimer);

                ssaHideTimer = setTimeout(() => {
                    ssaToast.classList.remove("ssa-show");
                }, 4500);
            }

            ssaClose.addEventListener("click", () => {
                clearTimeout(ssaHideTimer);
                ssaToast.classList.remove("ssa-show");
            });

            /* First notification after 1.5 seconds. */
            const ssaInitialTimer = setTimeout(ssaShowActivity, 1500);

            /* New notification every 7 seconds. */
            const ssaInterval = setInterval(ssaShowActivity, 7000);

            /* Optional cleanup if the injected component is removed. */
            window.__SSA_ACTIVITY_NOTIFICATION_CLEANUP__ = () => {
                clearTimeout(ssaInitialTimer);
                clearTimeout(ssaHideTimer);
                clearInterval(ssaInterval);
                style.remove();
                root.remove();
                delete window.__SSA_ACTIVITY_NOTIFICATION_LOADED__;
                delete window.__SSA_ACTIVITY_NOTIFICATION_CLEANUP__;
            };
        })();
    </script>
        
        
       


   </body>
</html>