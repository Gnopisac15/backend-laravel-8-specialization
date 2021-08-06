@extends('layouts.app')

<style>
    #leftHalf {
   background: url(images/bg-1.jpg);
   width: 45%;
   position: absolute;
   z-index:5;
}
#center {
   background-color:#c5a884;
   width: 70%;
   margin-left: 30% !important;
   height: 87%;
   position: absolute;
   z-index:2;
   clip-path: ellipse(85% 62% at 85% 67%);
}

#rightHalf{
   margin-left: 50% !important;
   margin-top: 5% !important;
   position: absolute;
   z-index:4;
}
</style>

@section('content')
<div class="container">
    <br><br><br>
    <div id="leftHalf">
            <br><br><br><br>
            <div class="border-form ml-5">
                    <br><br>
                <center><h1 style="color:#c77a29; font-size:bold">LOG IN HERE</h1></center>
                    <br><br><br>
                <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">
                                <strong>
                               Email Address
                                </strong>
                            </label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror color brdr" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                            <br>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">
                                <strong>
                                    Password
                                </strong>
                            </label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror color brdr" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                            <br>
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                            
                        </div>

                        <div class="form-group">
                            <center>
                                <button type="submit" class="btn btn-dark m-4 w-75 hover1">
                                   <strong> L O G  I N </strong>
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                </center>
                        </div>
                </form>
            </div>              
    </div>
    <div id="center">
        
    </div>
    <div id="rightHalf">
        <img src="img/share.png" alt="">
    </div>
</div>

@endsection
