<header class="site-navbar site-navbar-target" role="banner">

    <div class="container">
        <div class="row align-items-center position-relative">

            <div class="col-3">
                <div class="site-logo">
                    <a href="index.html"><strong>CarRental</strong></a>
                </div>
            </div>

            <div class="col-9  text-right">

                <span class="d-inline-block d-lg-none"><a href="#"
                        class=" site-menu-toggle js-menu-toggle py-5 "><span
                            class="icon-menu h3 text-black"></span></a></span>

                <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                    <ul class="site-menu main-menu js-clone-nav ml-auto ">
                        <li class="active"><a href="{{ url('/') }}" class="nav-link">Home</a></li>
                        <li><a href="{{ url('/about') }}" class="nav-link">About</a></li>
                        <li><a href="{{ url('/rantals') }}" class="nav-link">Rentals</a></li>
                        <li><a href="{{ url('/contact') }}" class="nav-link">Contact</a></li>
                        @if (isset($user))
                      

                        @else
                            <li><a href="{{ url('/signup-page') }}" class="nav-link">sign up</a></li>
                            <li><a href="{{ url('/login-page') }}" class="nav-link">login</a></li>
                        @endif
                    </ul>
                </nav>
            </div>


        </div>
    </div>

</header>
