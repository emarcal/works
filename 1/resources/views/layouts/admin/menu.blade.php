<style>
    .zmdi{
    padding-top: 11px;
    }
    

</style>
<aside id="navigation">
                <div class="navigation__header">
                    <i class="zmdi zmdi-long-arrow-left" data-mae-action="block-close"></i>
                </div>

                <div class="navigation__toggles">
              
                   
                    <a
                        href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                       
                        <i class="zmdi zmdi-power-off"></i>

                    </a>

                    <form
                        id="logout-form"
                        action="{{ route('logout') }}"
                        method="POST"
                        style="display: none;">
                        @csrf
                    </form>

                </div>

                <div class="navigation__menu c-overflow">
                    <ul>
                        <li class="navigation__active">
                            <a href="{{ url('me/dashboard') }}">
                                <i class="zmdi zmdi-home"></i>
                                Dashboard</a>
                        </li>
            
                        <li>
                            <a href="{{ url('me/account') }}">
                                <i class="zmdi zmdi-settings"></i>
                                Settings</a>
                        </li> 
                        

                    </ul>
                </div>
            </aside>