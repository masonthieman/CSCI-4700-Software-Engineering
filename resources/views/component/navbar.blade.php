<nav class="navbar navbar-expand-xl navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route("home") }}">
            <img src="/img/navbar_brand.png" alt="Renova">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-responsive" aria-controls="navbar-responsive"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-responsive">
            <ul class="navbar-nav ml-auto">
                {{--  Main navigation bar links, which require you to be logged in  --}}
                @if (Auth::check())
                    @foreach(config("navbar") as $key => $options)
                        @if (!isset($options["is_manager"]) && !isset($options["is_admin"])
                            || isset($options["is_manager"]) && $options["is_manager"] == Auth::user()->is_manager
                            || isset($options["is_admin"]) && $options["is_admin"] == Auth::user()->is_admin)
                            @php
                                // For convenience sake, let's just store the class name here if it's required.
                                $classes  = isset($options["dropdown"]) ? " dropdown" : "";
                                $classes .= isNavLinkActive($key) ? " active" : "";
                            @endphp
                            <li class="nav-item{{ $classes }}">
                                @if (isset($options["dropdown"]))
                                    <a class="nav-link dropdown-toggle" href="#" id="navbar-dropdown-iccm" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ __("navbar.$key") }}
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbar-dropdown-iccm">
                                        @foreach($options["dropdown"] as $dkey => $doptions)
                                            <a class="dropdown-item" href="{{ route($doptions["route"]) }}">
                                                {{ __("navbar.$key.$dkey") }}
                                            </a>
                                        @endforeach
                                    </div>
                                {{--  Otherwise, just create a normal link  --}}
                                @else
                                    <a class="nav-link" href="{{ route($options["route"]) }}">
                                        {{ __("navbar.$key") }}
                                    </a>
                                @endif
                            </li>
                        @endif
                    @endforeach
                @endif
                @auth
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle btn btn-nav" id="logout-dropdown" roles="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->email }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="logout-dropdown">
                            <a href="{{ route("logout") }}" class="dropdown-item">Sign Out</a>
                        </div>
                    </li>
                @endauth
                @guest
                    <li class="nav-item">
                        <a class="nav-link btn btn-nav" href="{{ route("login") }}" >Sign In</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
