<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>My Orphan</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CMuli:400,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="/css/bootstrap.min.css">

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="/css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="/css/style.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<!-- HEADER -->
<header id="header">
    <!-- NAV -->
    <div id="nav">
        <!-- Top Nav -->
        <div id="nav-top">
            <div class="container">
                <!-- social -->

                <!-- /social -->

                <!-- logo -->
                <div class="nav-logo">
                    <a href="/" class="logo">My Orphan</a>
                </div>
                <!-- /logo -->

                <!-- search & aside toggle -->
                <div class="nav-btns">
                    <button class="aside-btn"><i class="fa fa-bars"></i></button>
                </div>
                <!-- /search & aside toggle -->
            </div>
        </div>
        <!-- /Top Nav -->

        <!-- Main Nav -->
        <div id="nav-bottom">
            <div class="container">
                <!-- nav -->

                <!-- /nav -->
            </div>
        </div>
        <!-- /Main Nav -->

        <!-- Aside Nav -->
        <div id="nav-aside">
            <ul class="nav-aside-menu">
                @guest
                    <li><a href="/login">Login</a></li>
                    <li><a href="/register">Register</a></li>
                @endguest
                @auth
                    <li><a href="{{route("dashboard")}}">Dashboard</a></li>
                @endauth
            </ul>

            <button class="nav-close nav-aside-close"><span></span></button>
        </div>
        <!-- /Aside Nav -->
    </div>
    <!-- /NAV -->

    <!-- PAGE HEADER -->
    <div id="post-header" class="page-header">
        <div class="page-header-bg" style="background-image: url({{asset("storage/{$orphan->image}")}}); background-position: 0px 498px;" data-stellar-background-ratio="0.5"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <h1>{{$orphan->name}}</h1>
                    <ul class="post-meta">
                        <li><a href="{{route("orphan.my",['profileId' => $orphan->user_id])}}">{{$orphan->user->name}}</a></li>
                        <li>{{$orphan->created_at}}</li>


                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /PAGE HEADER -->
</header>
<!-- /HEADER -->

<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-8">
                <!-- post share -->
                <div class="section-row">

                </div>
                <!-- /post share -->

                <!-- post content -->
                <div class="section-row">
                    <h3>Age : {{$orphan->age}}</h3>
                    <p>Location : {{$orphan->location}}</p>
                    @if($orphan->other_details)
                    <p>{{$orphan->other_details}}</p>
                    @endif
                    @auth
                        @if(auth()->id() != $orphan->user_id)
                        <form action="{{route("adoption.adopt",['orphanId' => $orphan->id])}}" method="post">
                            <button class="btn btn-secondary" type="submit">Adopt</button>
                        </form>
                            @endif
                        @elseauth
                            To Adopt sign in
                    @endauth
                </div>
                <!-- /post content -->


            </div>

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- FOOTER -->
<footer id="footer">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="footer-bottom row">
            <div class="col-md-6">
                <div class="footer-copyright">
                   Project lincide Under Code for Iraq
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</footer>
<!-- /FOOTER -->

<!-- jQuery Plugins -->
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/jquery.stellar.min.js"></script>
<script src="/js/main.js"></script>




</body></html>
