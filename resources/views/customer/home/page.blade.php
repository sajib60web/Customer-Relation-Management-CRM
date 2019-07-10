<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Category Page!</title>
</head>
<body style="background-image: url({{ asset('/assets/') }}/Sunset.png);">
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-danger shadow-sm" style="height: 100px;">
        <div class="container">
            <a class="navbar-brand" style="font-size: 34px; color: #ffffff;" href="{{ url('/') }}">
                Customer RelationShip
            </a>
            @foreach($all_category_name as $page)
                <a class="navbar-brand btn btn-warning" style="font-size: 18px; color: black;" href="{{ url('/page/description/'.$page->id) }}">
                    {{ $page->name }}
                </a>
            @endforeach
            <form method="POST" action="{{ route('login') }}" style="margin-top: 50px;">
                @csrf
                <table class="table table-borderless" style="margin-left: 50px;">
                    <tr>
                        <td>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="email" placeholder="Enter Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="password" placeholder="Enter Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" style="color: white; margin-left: 10px; margin-top: 10px;">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td width="10%">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>
                        </td>
                    </tr>
                </table>
            </form>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        {{--                            <li class="nav-item">--}}
                        {{--                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
                        {{--                            </li>--}}
                        {{--                            @if (Route::has('register'))--}}
                        {{--                                <li class="nav-item">--}}
                        {{--                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
                        {{--                                </li>--}}
                        {{--                            @endif--}}
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h3>Page Description</h3>
                    <hr/>
                    @foreach($show_category_page as $description)
                        <p>{!! $description->description !!}</p>
                    @endforeach
                </div>
            </div>
        </div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>