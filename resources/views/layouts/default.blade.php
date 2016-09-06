<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css">
    <link href='https://fonts.googleapis.com/css?family=Miriam+Libre:400,700|Source+Sans+Pro:200,400,700,600,400italic,700italic' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
</head>
<body>

<nav class="navbar navbar-default navbar-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Navigáció átváltása</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/{{$version}}">Laravel {{$version}} dokumentáció</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="https://github.com/laravelhungary" target="_blank">Github</a></li>
                <li><a href="https://www.facebook.com/groups/laravelhungary">Laravel Hungary</a></li>
                <li><a href="https://github.com/laravelhungary/docs">Magyar dokumentáció</a></li>
                <li><a href="https://laravel.com/docs/{{ $version }}/" target="_blank">Eredeti dokumentáció</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container">

    @if (!empty($leftMenu))
        <div class=" col-xs-12 col-md-3 sidebar">
            <div class="panel panel-default">
                <div class="panel-body">
                    {!! $leftMenu !!}
                </div>
            </div>
        </div>
    @endif

    <div class=" col-xs-12 col-md-9">
        <div class="panel panel-default">
            <div class="panel-body article">
                @yield('content')

                <hr>

                <footer>
                    <p>
                        Ez a <a href="http://laravel.com" target="_blank">laravel.com</a> oldalon megtalálható hivatalos dokumentáció fordítása, melyet a Laravel Hungary közösség készített.<br>
                        Az eredeti tartalom <a href="http://laravel.com/docs/{{ $version }}/{{ $page }}" target="_blank">ezen az oldalon</a> található.</p>
                    <p>
                        Ha hibát találtál a fordításban akkor a <a href="https://github.com/laravelhungary/docs">github</a> -on javíthatod.<br>
                        <strong>Ezúton is köszönjük az összes fordító közreműködését!</strong>
                    </p>

                </footer>
            </div>
        </div>
    </div>




</div>

</body>
</html>