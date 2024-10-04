<!-- Start Header Area -->
<header class="header navbar-area">
    <!-- Toolbar Start -->
    <div class="toolbar-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-6 col-12">
                    <div class="toolbar-social">
                        <ul>
                            <li><span class="title"> </span></li>
                            <li><a href="javascript:void(0)"><i class="lni lni-facebook-original"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="lni lni-instagram"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="lni lni-linkedin-original"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="lni lni-google"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="toolbar-login">
                        <div class="button">
                            {{--  <a href="registration.html">Create an Account</a>  --}}
                            <a href="/login" class="btn">Connexion</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Toolbar End -->
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
            <div class="nav-inner">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="{{url('/')}}">
                        <img src="assets/images/logo/Logos.png" alt="Logo">
                    </a>
                    <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="toggler-icon"></span>
                        <span class="toggler-icon"></span>
                        <span class="toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                        <ul id="nav" class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="" href="{{url('/')}}"

                                    aria-expanded="false"
                                    >Accueil</a>

                            </li>
                            {{--  <li class="nav-item">
                                <a class=" " href="{{url('/cours')}}"

                                    aria-controls="navbarSupportedContent" aria-expanded="false"
                                   >Cours</a>

                            </li>  --}}
                            <li class="nav-item"><a href="{{url('/formation')}}">Formations</a></li>
                            <li class="nav-item"><a href="{{url('/forums')}}">Forums</a></li>

                            {{--  <li class="nav-item">
                                <a class="page-scroll dd-menu collapsed" href="javascript:void(0)"
                                    data-bs-toggle="collapse" data-bs-target="#submenu-1-4"
                                    aria-controls="navbarSupportedContent" aria-expanded="false"
                                    aria-label="Toggle navigation">Forums</a>
                                <ul class="sub-menu collapse" id="submenu-1-4">
                                    <li class="nav-item"><a href="about-us.html">About Us</a></li>
                                    <li class="nav-item"><a href="teachers.html">Teachers</a></li>
                                    <li class="nav-item"><a href="teacher-details.html">Teacher Details</a></li>
                                    <li class="nav-item"><a href="our-gallery.html">Our Gallery</a></li>
                                    <li class="nav-item"><a href="faq.html">FAQ</a></li>
                                    <li class="nav-item"><a href="login.html">Login</a></li>
                                    <li class="nav-item"><a href="registration.html">Register</a></li>
                                    <li class="nav-item"><a href="coming-soon.html">Coming Soon</a></li>
                                    <li class="nav-item"><a href="404.html">404 Error</a></li>
                                    <li class="nav-item"><a href="mail-success.html">Mail Success</a></li>
                                </ul>
                            </li>  --}}
                            {{--  <li class="nav-item">
                                <a class="page-scroll dd-menu collapsed" href="javascript:void(0)"
                                    data-bs-toggle="collapse" data-bs-target="#submenu-1-5"
                                    aria-controls="navbarSupportedContent" aria-expanded="false"
                                    aria-label="Toggle navigation">Documents</a>
                                <ul class="sub-menu collapse" id="submenu-1-5">
                                    <li class="nav-item"><a href="blog-grid-sidebar.html">Blog Grid Sidebar</a></li>
                                    <li class="nav-item"><a href="blog-single.html">Blog Single</a></li>
                                    <li class="nav-item"><a href="blog-single-sidebar.html">Blog Single Sibebar</a></li>
                                </ul>
                            </li>  --}}


                            <li class="nav-item"><a href="{{url('/documents')}}">Documents</a></li>
                            <li class="nav-item"><a href="{{url('/video')}}">Videos</a></li>

                            <li class="nav-item"><a href="{{url('/contact')}}">Contact</a></li>
                        </ul>

                        {{--  <div class="toolbar-login">
                            <div class="button ">
                                {{--  <a href="registration.html">Create an Account</a>
                                <a href="login.html" class="btn">Connexion</a>
                            </div>
                        </div>  --}}
                        {{--  <form class="d-flex search-form">
                            <input class="form-control me-2" type="search" placeholder="Search"
                                aria-label="Search">
                            <button class="btn btn-outline-success" type="submit"><i
                                    class="lni lni-search-alt"></i></button>
                        </form>  --}}
                    </div> <!-- navbar collapse -->
                </nav> <!-- navbar -->
            </div>
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</header>
