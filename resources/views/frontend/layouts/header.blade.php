<header class="header">
    <div class="container-fluid">
        {{-- topnav start here  --}}
        <div class="row topnav">
            <div class="col-lg-6 col-md-6 col-sm-6" style="display:flex;">
                <p class="text-light mail"><i aria-hidden="true" class="fas fa-envelope"></i>  info@zamzamtravelsbd.com</p><br>
                <p class="text-light phone" style="margin-left: 30px"><i aria-hidden="true" class="fas fa-phone-alt"></i> 
                    01733391826 </p> 
                
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 responsive" style="display:flex;justify-content:flex-end">
                
                
                    <li style="margin-right: 60px" class="time"><a href=""><i aria-hidden="true" class="fas fa-clock"></i> 
                         24 hours a day, 7 days a week</a></li>
                    <li>
                        <a href="{{route('login')}}" style="text-decoration:none;color:white">Login || </a>
                    </li>
                    <li style="margin-right: 30px">
                        <a href="{{route('register')}}" style="text-decoration:none;color:white">Register</a>
                    </li>
            </div>
        </div>
        {{-- topnav end here  --}}

        <nav class="navbar navbar-expand-lg header-nav ">
            <div class="navbar-header">
               
                <a id="mobile_btn" href="javascript:void(0);">
                    <span class="bar-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </a>
                <a href="{{url('/')}}" class="navbar-brand logo">
                    <img style="height: 85px;" src="{{asset('uploaded_files/setting/'. $setting->logo)}}" class="img-fluid" alt="Logo">
                </a>
                <a href="{{url('/')}}" class="navbar-brand logo-small">
                    <img src="{{asset('uploaded_files/setting/'. $setting->logo)}}" class="img-fluid" alt="Logo">
                </a>
            </div>

            <div class="main-menu-wrapper">
                <div class="menu-header">
                    <a href="{{url('/')}}" class="menu-logo">
                        <img src="{{asset('uploaded_files/setting/'. $setting->logo)}}" class="img-fluid" alt="Logo">
                    </a>
                    <a id="menu_close" class="menu-close" href="javascript:void(0);"> <i
                            class="fas fa-times"></i></a>
                </div>
                <ul class="main-nav">

                    

                    <li class="@if (Route::currentRouteName() === 'frontend.home') active  @endif"><a href="{{url('/')}}">Home</a></li>
                    @php
                        $menus = App\Models\Menu::select('id','title','url')->where('parent_menu_id', 0)->orderBY('serial', 'ASC')->where('is_active',1)->get();
                    @endphp
                    @foreach ($menus as $menu)
                        @php
                            $submenus = App\Models\Menu::where('parent_menu_id', $menu->id)->select('id','title','url')->where('is_active',1)->get();
                        @endphp
                        @if (count($submenus)>0)
                            <li class="has-submenu">
                                <a href="{{ route('dynamicUrl', ['content' => 'service', 'parameter' => $menu->id]) }}">{{$menu->title}} <i class="fas fa-chevron-down"></i> </a>
                                <ul class="submenu">
                                    @foreach ($submenus as $submenu)
                                    @php
                                        $subsubmenus = App\Models\Menu::where('parent_menu_id', $submenu->id)->select('id','title','url')->where('is_active',1)->get();
                                    @endphp
                                    @if (count($subsubmenus)>0)
                                        <li class="has-submenu">
                                            <a href="{{ route('dynamicUrl', ['content' => 'service', 'parameter' => $submenu->id]) }}">{{$submenu->title}} </a>
                                            <ul class="submenu">
                                                @foreach ($subsubmenus as $subsubmenu)
                                                    <li><a href="{{ route('dynamicUrl', ['content' => 'service', 'parameter' => $subsubmenu->id]) }}">{{$subsubmenu->title}}</a></li>
                                                @endforeach

                                            </ul>
                                        </li>
                                    @else
                                    
                                        <li ><a href="{{ route('dynamicUrl', ['content' => 'service', 'parameter' => $serviceCategory->id]) }}">{{$submenu->title}}</a></li>
                                    @endif
                                        
                                    @endforeach
                                    
                                </ul>
                            </li>
                        @else

                        @php
                            $currentUrl = request()->url();
                            $envUrl = config('app.env_url');
                            $fullUrl = $envUrl . $menu->url;
                        @endphp
                        <li class="@if (str_contains($currentUrl, $fullUrl)) active @endif">
                            <a href="{{ route('dynamic.url', $menu->url) }}">{{ $menu->title }}</a>
                        </li>
                        @endif
                    @endforeach
                    
                    <li class="has-submenu">
                        <a href>Services <i class="fas fa-chevron-down"></i></a>
                        <ul class="submenu">
                            @foreach ($serviceCategories as $serviceCategory)
                                @php
                                    $subCategories = App\Models\Service_Category::where('category_id',$serviceCategory->id)->get();
                                @endphp
                            <li class="{{ count($subCategories) > 0 ? 'has-submenu' : '' }}">
                                <a href="{{route('dynamic.url', $serviceCategory->url)}}">{{$serviceCategory->title }}</a>
                                
                                @if (count($subCategories)>0)
                                    <ul class="submenu">
                                        @foreach ($subCategories as $subCategory)
                                            <li><a href="#">{{$subCategory->title}}</a></li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    @php
                        $currentUrl = request()->url();
                        $envUrl = config('app.env_url');
                        $fullUrl = $envUrl . $menu->url;
                    @endphp
                    <li class="@if (str_contains($currentUrl, $envUrl . '/blog')) active @endif">

                        <a href ="{{route('dynamic.url', 'blog' )}}">Blog <i class=""></i></a>
                        
                    </li>
                    <li class="@if (str_contains($currentUrl, $envUrl . '/contact')) active @endif">
                        <a href="{{route('dynamic.url', 'contact' )}}">Contact</a>
                    </li>
                   
                </ul>
            </div>
            <ul class="nav header-navbar-rht">
                
                <li class="nav-item">
                    <a class="nav-link header-reg rounded-pill" href="{{route('register')}}"><span></span> Get Free Estimate </a>
                </li>
            </ul>
        </nav>
    </div>
</header>