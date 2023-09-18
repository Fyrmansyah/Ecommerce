
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row" >
      <div class="navbar-brand-wrapper bg-dark d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
          <a href="/admin/dashboard" class="text-decoration-none navbar-brand brand-logo">
              <span class="h4 text-uppercase text-warning bg-dark p-1 px-2 border border-warning border-1">koperasi</span>
              <span class="h4 text-uppercase text-dark bg-warning p-1 px-2 ">ku</span>
          </a>
          {{-- <a class="navbar-brand brand-logo" href="index.html"><img src="images/logo.svg" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg" alt="logo"/></a> --}}
          <button class="navbar-toggler navbar-toggler align-self-center text-light" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
        </div>  
      </div>
      <div style="background: hsla(80, 19%, 12%, 1);

      background: linear-gradient(0deg, hsla(80, 19%, 12%, 1) 14%, hsla(45, 100%, 51%, 1) 100%);
      
      background: -moz-linear-gradient(0deg, hsla(80, 19%, 12%, 1) 14%, hsla(45, 100%, 51%, 1) 100%);
      
      background: -webkit-linear-gradient(0deg, hsla(80, 19%, 12%, 1) 14%, hsla(45, 100%, 51%, 1) 100%);
      
      filter: progid: DXImageTransform.Microsoft.gradient( startColorstr="#212519", endColorstr="#FFC107", GradientType=1 );" class="navbar-menu-wrapper bg-dark d-flex align-items-center justify-content-end">
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
              <span class="nav-profile-name ">{{ Auth::user()->name }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
             
               <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                   <i class="mdi mdi-logout text-primary"></i>{{ __('Logout') }}
                  </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                    </form>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>