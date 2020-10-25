<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Have fun</title>
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
  </head>
  <body style="background-image: URL(<?php echo asset('storage/img/mauro-abde-castillo.png'); ?>);">
      <div class="login">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group row">
                <label for="username">{{ __('username') }}</label>

                <div class="col-md-6">
                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong><br>{{ $message }}<br></strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" >{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong><br>{{ $message }}<br></strong>
                        </span>
                    @enderror
                </div>
            </div>
            <a class ="change" href="{{route('register')}}">Register</a>
            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>
                </div>
            </div>
        </form>
      </div>
      <pre>
      </pre>
  </body>
</html>
