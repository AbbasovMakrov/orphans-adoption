<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Orphans And Adoptions</title>

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
    <div id="nav" class="">
        <!-- Top Nav -->
        <div id="nav-top">
            <div class="container">
                <!-- social -->

                <!-- /social -->

                <!-- logo -->
                <div class="nav-logo">
                    <a href="" class="logo">My Orphan</a>
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
        <div id="nav-aside" class="">
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
</header>
<!-- /HEADER -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div id="hot-post" class="row hot-post">
            <div class="col-md-8 hot-post-left">
                <div class="section-title">
                    <h2 class="title">Random Orphans</h2>
                </div>
                <!-- post -->
                @foreach($orphans->random($orphans->count() >= 4 ? 4 : $orphans->count()) as $random)
                    <div class="post post-thumb">
                        <a class="post-img" href="{{route("orphan.show",['id' => $random->id])}}"><img
                                src="{{asset("storage/{$random->image}")}}" alt=""></a>
                        <div class="post-body">
                            <h3 class="post-title title-lg"><a
                                    href="{{route("orphan.show",['id' => $random->id])}}">{{$random->name}}</a></h3>
                            <ul class="post-meta">
                                <li>
                                    <a href="{{route("orphan.my",['profileId' => $random->user->id])}}">{{$random->user->name}}</a>
                                </li>
                                <li>Created : {{$random->created_at}}</li>
                            </ul>
                        </div>
                    </div>
            @endforeach
            <!-- /post -->
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-8">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2 class="title">Recent posts</h2>
                        </div>
                    </div>

                @foreach($orphans->sortByDesc("created_at")->take(5)->values() as $recent)
                    <!-- post -->
                        <div class="col-md-6">
                            <div class="post">
                                <a class="post-img" href="{{route("orphan.show",['id' => $random->id])}}"><img
                                        src="{{asset("storage/{$random->image}")}}" alt=""></a>
                                <div class="post-body">
                                    <h3 class="post-title title-lg"><a
                                            href="{{route("orphan.show",['id' => $random->id])}}">{{$random->name}}</a>
                                    </h3>
                                    <ul class="post-meta">
                                        <li>
                                            <a href="{{route("orphan.my",['profileId' => $random->user->id])}}">{{$random->user->name}}</a>
                                        </li>
                                        <li>Created : {{$random->created_at}}</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /post -->
                            @endforeach


                        </div>
                        <!-- /row -->
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2 class="title">Adopted</h2>
                        </div>
                    </div>
                    <!-- post -->



                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->


<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->

        <!-- /row -->

        <!-- row -->
        <div class="row">
            @if($adopted)
                @foreach($adopted as $adopt)
                    <div class="col-md-4">
                        <div class="post post-widget">
                            <h3 class="post-img"><img src="{{asset("storage/{$adopt->orphan->image}")}}" alt="">
                            </h3>
                            <div class="post-body">
                                <h3 class="post-title title-sm">{{$adopt->orphan->name}}</h3>
                                <ul class="post-meta">
                                    <li>
                                        <a href="{{route("orphan.my",['profileId' => $adopt->user_id])}}">{{$adopt->user->name}}</a>
                                    </li>
                                    <li>{{$adopt->created_at}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /post -->
                @endforeach

            @endif
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
        <div class="row">
            <div class="col-md-12">
                <div class="footer-widget">
                    <div class="footer-logo">
                        <a href="/" class="logo">MY Orphan</a>
                    </div>
                    <p>This application owned by code for iraq</p>
                </div>
            </div>
        </div>


    </div>
    <!-- /row -->

    <!-- row -->

    <!-- /row -->
    <!-- /container -->
</footer>
<!-- /FOOTER -->

<!-- jQuery Plugins -->
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/jquery.stellar.min.js"></script>
<script src="/js/main.js"></script>

</body>
</html>
