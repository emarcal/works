<header id="header">
            <div class="logo">
                <a href="index.html" class="hidden-xs">
                    <img
                        class="logo-img"
                        style="width: 90%; margin-left: -15px"
                        src="../Blockchain City/assets/img/logo.png"
                        alt="">

                </a>
                <i
                    class="logo__trigger zmdi zmdi-menu"
                    data-mae-action="block-open"
                    data-mae-target="#navigation"></i>
            </div>

            <ul class="top-menu">
                <li class="top-menu__trigger hidden-lg hidden-md">
                    <a href="">
                        <i class="zmdi zmdi-search"></i>
                    </a>
                </li>

                <li
                    class="top-menu__alerts"
                    data-mae-action="block-open"
                    data-mae-target="#notifications"
                    data-toggle="tab"
                    data-target="#notifications__messages">
                    <a href="">
                        <i class="zmdi zmdi-notifications"></i>
                    </a>
                </li>
                <li class="top-menu__profile dropdown">
                    <a data-toggle="dropdown" href="">
                        <img src="admin/demo/img/profile-pics/user.jpg" alt="">
                        
                    </a>
                    
                    <ul class="dropdown-menu pull-right dropdown-menu--icon">
                        <li>
                            <a href="#">
                                <i class="zmdi zmdi-account"></i>
                                My Account</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="zmdi zmdi-settings"></i>
                                Settings</a>
                        </li>
                        <li>
                            <a
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                <i class="fa fa-power-off"></i>
                                <i class="zmdi zmdi-power-off"></i>
                                {{ __('Logout') }}
                            </a>

                            <form
                                id="logout-form"
                                action="{{ route('logout') }}"
                                method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>

            <form class="top-search">
                <input
                    type="text"
                    class="top-search__input"
                    placeholder="Search for people, files & reports">
                <i class="zmdi zmdi-search top-search__reset"></i>
            </form>
        </header>