<div class="header">
      <div class="header-left">
        <a href="{{ url('/') }}" class="logo">
          <img src="../images/socatoles.JPG" width="100" height="50" alt="">
        </a>
      </div>
       <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>

            <ul class="nav user-menu float-right">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        {{ Auth::user()->currentTeam->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        {{ __('Team Settings') }}
                                    </x-jet-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('Create New Team') }}
                                        </x-jet-dropdown-link>
                                    @endcan

                                    <div class="border-t border-gray-100"></div>

                                    <!-- Team Switcher -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Switch Teams') }}
                                    </div>

                                    @foreach (Auth::user()->allTeams() as $team)
                                        <x-jet-switchable-team :team="$team" />
                                    @endforeach
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                @endif

                <!-- Settings Dropdown -->
				<div class="ml-3 relative">
				
				 @if (Route::has('login'))
               <div class="top-right links" style="float:right;">
                   @auth
				   
                       <a  href="#" class="px-1  dropdown-toggle nav-link user-link text-white" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                       <div class="dropdown-menu top-right links" style="float:right;">
                         <a class="dropdown-item" href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </a>
						<a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
             </a>

             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
             </form>
					</div>
                       
                   @endauth
               </div>
           @endif
		   
					
                </div>
				
            </div>


{{-- ************************************************************for mobile phone******************************************************** --}}
<div class="dropdown mobile-user-menu float-right">
               <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    <div class="dropdown">
  <a  class=" pr-5 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    {{ Auth::user()->name }}
  </a>
  <div class="dropdown-menu top-right links" style="float:right;">
                         <a class="dropdown-item" href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </a>
						<a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
             </a>

             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
             </form>
					</div>
</div>

            </div>
            </ul>


        </div>

       <style>
          .sidebar ,ul{text-transform: uppercase; text-decoration: none;}

          .sidebar ,ul ,li ,a{text-decoration: none;}
        </style>

        <div class="sidebar" id="sidebar" >
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">

                     {{-- Admin side bar --}}
                    <ul>
                        <li class="menu-title" style="text-align: center; text-decoration:none;"><strong><span>Admin Dashboard</span></strong></li>
                             <hr>
                        <li class="{{'admin/dashboard' == request()->path() ? 'active':''}}">
                            <a href="/admin/dashboard">
                            <i class="fa fa-dashboard"></i>
                              <span>dashboard</span>
                           </a>
                         </li>

                        <li class="{{'category' == request()->path() ? 'active':''}}">
                        <a href="/category">
                         <i class="fa fa-registered"></i>
                              <span>Categories</span>
                        </a>
                        </li>

                        <li class="{{'product' == request()->path() ? 'active':''}}">
                        <a href="/product">
                           <i class="fa fa-product-hunt"></i>
                            <span>Products</span>
                        </a>
                        </li>

<li class="{{'admin_order' == request()->path() ? 'active':''}}">
                        <a href="/admin_order">
                        <i class="fa fa-shopping-basket"></i>
                            <span>Orders</span>
                        </a>
                        </li>

                        <li class="{{'user' == request()->path() ? 'active':''}}">
                        <a href="/user">
                        <i class="fa fa-users"></i>
                            <span>users</span>
                        </a>
                        </li>


                            </ul>
                </div>
            </div>
        </div>
       <!--End NavBar-->

