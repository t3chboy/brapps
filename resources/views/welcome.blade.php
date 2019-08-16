@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    <div class="header bg-gradient-primary py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mt-7 mb-7">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h1 style="font-weight: bold; font-size: 59px; color:#F2BB16;padding-bottom:90px;"><span style="background-color: #FF0000;color: #fff;opacity: 0.5">WELCOME TO HOMERUN MEDIA.</span></h1>
                    </div>
                </div>
            </div>
            <div class="header-body text-center mt-7 mb-7">
                <div class="row justify-content-center">
                    <div class="col">
                        <a href="{{url("/register/production")}}"><h1 style="font-weight: bold; font-size: 38px; color:#F2BB16;">PRODUCTION HOUSE REGISTER</h1>
                    </div>
                    <div class="col">
                        <h1></h1>
                    </div>
                    <div class="col">
                        <a href="{{url("/register/brand")}}"><h1 style="font-weight: bold; font-size: 38px; color:#000;">BRAND REGISTER</h1>
                    </div></a>
                </div>
            </div>
        </div>
<!--         <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div> -->
    </div>
@endsection
