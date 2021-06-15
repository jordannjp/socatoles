 <?php
     use App\Http\Controllers\Ecommerce\EcommerceController;
     $total = EcommerceController::cartitem();
     ?>
 <style>
   .active {
    background-color: white;
    color: white;
}
li a:hover {
    background-color: white;
}

</style>

 <!--StateNav-->
  <div class="site-wrap">
<div class="site-navbar bg-success py-2">


      <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between">

           <div class="icons">
            <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span
                class="icon-menu"></span></a>
          </div>

          <div class="logo">
            <div class="site-logo">
              <a class="js-logo-clone" href="{{ url('/') }}">
             <img src="../images/socatoles.JPG" width="150" height="85" alt="">
              </a>
            </div>
          </div>

          <div class="main-nav d-none d-lg-block">
            <nav class="site-navigation text-right text-md-center " role="navigation">
              <ul class="site-menu js-clone-nav d-none d-lg-block">
                 <li class="{{'/' == request()->path() ? 'active':''}}">
     <a class="icons-btn d-inline-block bag" href="/">Home</a>
 </li>

 <li class="{{'shop' == request()->path() ? 'active':''}}">
     <a class="icons-btn d-inline-block bag" href="/shop">Boutique</a>
 </li>

              </ul>

            </nav>
          </div>

           <div class="{{'cartlist' == request()->path() ? 'active':''}}">
            <a href="/cartlist" class="icons-btn d-inline-block bag ">
              <span><i class="fa fa-shopping-bag" style="color:black"></i></span>
              <span class="number bg-danger text-white">{{ $total }}</span>
            </a>
          </div>
        <div>

          @if(Auth::user())
                      <div class="{{'orders_show' == request()->path() ? 'active':''}}">
                        <a class="icons-btn d-inline-block bag" href="/orders_show/{{ Auth::user()->id }}">My Order</a>
                        </div>
                   @endif
                    </div>

         @if (Route::has('login'))
               <div class="top-right links" style="float:right;">
                   @auth


                    @if( Auth::user()->usertype=="admin")
                       <a class="px-1" href="{{ url('/admin/dashboard') }} ">{{ Auth::user()->name }}</a>
                       @else
                       <a class="px-1" href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                       <div class="dropdown-menu top-right links" style="float:right;">

						<a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
             </a>

             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
             </form>
					</div>
                       @endif
                   @else
                      <a class="px-1"href="{{ route('login') }}">Login</a>

                      <!-- @if (Route::has('register'))
                           <a class="px-1" href="{{ route('register') }}">Register</a>
                       @endif-->
                   @endauth
               </div>
           @endif
            </div>
      </div>
    </div>
    </div>

