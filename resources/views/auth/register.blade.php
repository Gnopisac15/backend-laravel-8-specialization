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
                <center><h1 style="color:#c77a29; font-size:bold">REGISTER HERE</h1></center>
                    <br><br><br>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-8 pr-5">
                                <input id="name" type="text" class=" color brdr form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-8 pr-5">
                                <input id="email" type="text" class="color brdr form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-8 pr-5">
                                <input id="username" type="text" class="color brdr form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}"  autocomplete="username">

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-8 pr-5">
                                <input id="password" type="password" class="color brdr form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-8 pr-5">
                                <input id="password-confirm" type="password" class="color brdr form-control" name="password_confirmation"  autocomplete="new-password">
                            </div>
                        </div>

                        <br><center>
                        <button type="submit" class="btn btn-dark m-4 w-75 hover1">
                            <strong> R E G I S T E R </strong>
                        </button>
                
                                </center>
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
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
            </div>
        </div>
    </div>
</div>
@endsection
