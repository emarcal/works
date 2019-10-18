<nav
                class="navbar navbar-default navbar-transparent navbar-fixed-top navbar-color-on-scroll"
                color-on-scroll=" " id="sectionsNav" >
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
        		<button type="button" class="navbar-toggle" data-toggle="collapse">
            		<span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
        		</button>
				<a class="navbar-brand" href="./" style="width: 45%; margin-top:-10px"><img src="/img/logob.png" alt=""></a>
        	
        	</div>

                    <div class="collapse navbar-collapse" id="app-navbar-collapse" style="margin-top:20px">
                        <ul class="nav navbar-nav navbar-right">
                            
                          
                                @guest
                            <li>
                                <a href="{{ route('register') }}" >
                                  <i class="material-icons">account_circle</i> {{ __('Register') }}</a>
                            </li>
                            <li>
                                <a class="btn btn-primary btn-round btn-full-blue " href="{{ route('login') }}">
                                  <i class="material-icons">account_circle</i> {{ __('Login') }}</a>
                            </li>
                            @else
                            <li class="dropdown">
                                <a class="btn btn-primary btn-round btn-full-blue dropdown"
                                    href="#"
                                    role="button"
                                    data-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                    v-pre="v-pre">
                                    <i class="material-icons">account_circle</i>
                                    {{ Auth::user()->name }}
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-with-icons">
                               
                                    <li>
                                        <a href="{{ url('me/dashboard') }}">
                                            <i class="material-icons">dashboard</i>
                                            My Dashboard
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('me/account')}}">
                                            <i class="material-icons">account_circle</i>
                                            My Account
                                        </a>
                                    </li>
                              
                                    <li>
                                        <a
                                            href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
													document.getElementById('logout-form').submit();">
                                            <i class="material-icons">power_settings_new</i>
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
                            
                            @endguest
                            

                        </ul>
                    </div>
                </div>
            </div>
       		 </nav>