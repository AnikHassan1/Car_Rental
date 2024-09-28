<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <title></title>

    <link rel="icon" type="image/x-icon" href="{{asset('/favicon.ico')}}" />
    <link href="{{asset('admin/css/bootstrap.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/css/animate.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/css/fontawesome.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/css/style.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/css/toastify.min.css')}}" rel="stylesheet" />


    <link href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css')}}" rel="stylesheet" />

    <link href="{{asset('admin/css/jquery.dataTables.min.css')}}" rel="stylesheet" />
    <script src="{{asset('admin/js/jquery-3.7.0.min.js')}}"></script>
    <script src="{{asset('admin/js/jquery.dataTables.min.js')}}"></script>


    <script src="{{asset('admin/js/toastify-js.js')}}"></script>
    <script src="{{asset('admin/js/axios.min.js')}}"></script>
    <script src="{{asset('admin/js/config.js')}}"></script>
    <script src="{{asset('admin/js/bootstrap.bundle.js')}}"></script>




</head>

<body>

<div id="loader" class="LoadingOverlay d-none">
    <div class="Line-Progress">
        <div class="indeterminate"></div>
    </div>
</div>

<nav class="navbar fixed-top px-0 shadow-sm bg-white">
    <div class="container-fluid">

        <a class="navbar-brand" href="#">
            <span class="icon-nav m-0 h5" onclick="MenuBarClickHandler()">
                <img class="nav-logo-sm mx-2"  src="{{asset('images/menu.svg')}}" alt="logo"/>
            </span>
            <img class="nav-logo  mx-2"  src="{{asset('images/carRent.png')}}" alt="logo"/>
        </a>

        <div class="float-right h-auto d-flex">
            <div class="user-dropdown">
                <img class="icon-nav-img" src="{{asset('images/user.webp')}}" alt=""/>
                <div class="user-dropdown-content ">
                    <div class="mt-4 text-center">
                        <img class="icon-nav-img" src="{{asset('images/user.webp')}}" alt=""/>
                        <h6>User Name</h6>
                        <hr class="user-dropdown-divider  p-0"/>
                    </div>
                    <a href="{{url('/ProfilePage')}}" class="side-bar-item">
                        <span class="side-bar-item-caption">Profile</span>
                    </a>
                    <a href="{{url("/userLogOut")}}" class="side-bar-item">
                        <span class="side-bar-item-caption">Logout</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>


<div id="sideNav" class="side-nav-open">

    <a href="{{url('/dashboard')}}" class="side-bar-item">
        <i class="bi bi-graph-up"></i>
        <span class="side-bar-item-caption">Dashboard</span>
    </a>

    <a href="{{url('/customerPages')}}" class="side-bar-item">
        <i class="bi bi-people"></i>
        <span class="side-bar-item-caption">Customer</span>
    </a>

    <a href="{{url('/car')}}" class="side-bar-item">
        <i class="bi bi-ev-front"></i>
        <span class="side-bar-item-caption">Car</span>
    </a>

    <a href="{{url('/productPages')}}" class="side-bar-item">
        <i class="bi bi-ev-front-fill"></i>
        <span class="side-bar-item-caption">Rentals</span>
    </a>

 


</div>


<div id="content" class="content">
    @yield('content')
</div>



<script>
    function MenuBarClickHandler() {
        let sideBar = document.getElementById('sideNav');
        let content = document.getElementById('content');
        if (sideBar.classList.contains("side-nav-open")) {
            sideBar.classList.add("side-nav-close");
            sideBar.classList.remove("side-nav-open");
            content.classList.add("content-expand");
            content.classList.remove("content");
        } else {
            sideBar.classList.remove("side-nav-close");
            sideBar.classList.add("side-nav-open");
            content.classList.remove("content-expand");
            content.classList.add("content");
        }
    }
</script>

</body>
</html>
