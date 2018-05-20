<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords"
          content="business, corporate, corporate website, creative, html5, marketing, multipurpose, responsive, site templates">
    <link rel="shortcut icon" href="images/favicon.png">
    <title>Секции, Кружки, Студии</title>
    <link href="{{ asset('css/front.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
            integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
            crossorigin="anonymous"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body data-spy="scroll" data-target="#ha-header">

<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-fixed-top ha-header-large" id="ha-header">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span
                        class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>
            <a class="navbar-brand logo" href="/">Project name</a>
        </div>
        <div class="navbar-collapse collapse ">
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @guest
                    <li><a class="nav-link" href="{{ route('login') }}">{{ __('Вход') }}</a></li>
                    <li><a class="nav-link" href="{{ route('register') }}">{{ __('Регистрация') }}</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Выход') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#home">Главная</a></li>
                <li><a href="#sections">Кружки</a></li>
                <li><a href="#schedule">Расписание</a></li>
                <li><a href="#news">Новости</a></li>
            </ul>

        </div>
        <!--/.nav-collapse -->
    </div>
</div>
<!-- End Fixed navbar -->

<!-- Full Page Image Header Area -->
<div id="home" class="home">
    <div class="header_img">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="spacer"></div>
                <h1>Секции, студии, кружки</h1>
            </div>
        </div>
    </div>
</div>
<!-- /Full Page Image Header Area -->

<!-- Content. Contains page content -->
@yield('content')
<!-- /.content -->

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-9 col-sm-12">
                <p>Copyright &copy; 2018 Coyier. All rights reserved.</p>
            </div>
            <div class="col-xs-12 col-md-3 col-sm-12">
                <ul class=" footer_social clearfix">
                    <li><a href="#"><img src="./images/favicon.png" alt=""></a></li>
                    <li><a href="#"><img src="./images/favicon.png" alt=""></a></li>
                    <li><a href="#"><img src="./images/favicon.png" alt=""></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- /Footer -->
<!-- JavaScript -->
<script src="/js/jquery.min.js"></script>
<script src="/js/nicescroll.min.js"></script>
<!-- jquery nice scroll-->

<script src="/js/isotope.min.js"></script>
<!--Portfolio Filter-->

<script src="/js/waypoints.min.js"></script>
<!--Header Effect-->
<script src="/js/custom_min.js"></script>
<!-- Custom JavaScript  -->

<script src="/js/main.js"></script>
<!-- Resource jQuery -->

</body>

</html>
