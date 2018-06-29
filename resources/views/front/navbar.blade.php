<nav id="utnavbar" class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <!-- Branding Image -->
            @if(Auth::user()->role() == 'expert')
                <a class="navbar-brand" href="{{ route('esperto.home') }}">
                   UTAssistant
                </a>
            @elseif(Auth::user()->role() == 'tester')
                <a class="navbar-brand" href="{{ route('partecipante.home') }}">
                    UTAssistant
                </a>
            @endif
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @guest
                    <li>
                        <a href="{{ route('indexUser') }}">Login</a>
                    </li>
                @else @if(Auth::user()->role() == 'expert')
                        <li>
                            <a href="{{ route('esperto.home') }}">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('esperto.studio.newStudio') }}">Crea Studio</a>
                        </li>
                        <li>
                            <a href="{{ route('esperto.info') }}">Info</a>
                        </li>
                    @elseif(Auth::user()->role() == 'tester')
                        <li>
                            <a href="{{ route('partecipante.home') }}">Home</a>
                        </li>
                    @endif
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"><span class="glyphicon glyphicon-log-out"></span>
                            Logout ({{{Auth::user()->name}}})
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
