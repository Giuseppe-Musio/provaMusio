<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                UTAssistant
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->

                @guest
                    <li>
                        <a href="{{ route('login') }}">Login</a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}">Registrati</a>
                    </li>

                @else

                    <li>
                        @if(Auth::user()->role() == 'tester')
                            <a href="{{ route('partecipante.home')}}">Home partecipante</a>
                        @endif @if(Auth::user()->role() == 'expert')
                            <a href="{{ route('esperto.home')}}">Home esperto</a>
                        @endif
                    </li>

                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
												document.getElementById('logout-form').submit();"><span class="glyphicon glyphicon-log-out"></span>
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>