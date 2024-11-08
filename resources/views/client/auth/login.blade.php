@extends('client.layout.master')

@section('content')
<section class="eblog-sign-up-area tp-section-gap">
    <div class="container">
        <div class="section-inner">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-8">
                    <h2 class="heading-title text-center">Đăng nhập</h2>

                    <x-forms.form action="/login" method="post">
                        <div class="form-inner inner">
                            <x-forms.group class="single-input-wrapper" error="email">
                                <x-forms.input
                                    name="email"
                                    placeholder="Your email" />
                            </x-forms.group>

                            <x-forms.group class="single-input-wrapper" error="password">
                                <x-forms.input
                                    type="password"
                                    name="password"
                                    placeholder="Password" />
                            </x-forms.group>

                            <div class="single-input-wrapper check two">
                                <a href="reset-password.html" class="forgot-password text-primary">Forgot password?</a>
                            </div>
                            
                            <div class="single-input-wrapper">
                                <button type="submit" class="subscribe-btn tp-btn btn-primary bg-secondary">Log in</button>
                            </div>

                            <div class="form-separator-or">
                                <p class="text-center">OR</p>
                            </div>

                            <div class="single-input-wrapper">
                                <button type="submit" class="subscribe-btn tp-btn btn-email"> <i class="fal fa-envelope"></i> Login With Email</button>
                            </div>

                            <div class="single-input-wrapper">
                                <button type="submit" class="subscribe-btn tp-btn btn-facebook"> <i class="fab fa-facebook"></i> Login With Facebook</button>
                            </div>

                        </div>
                        <div class="form-bottom-text">
                            <p class="text-center">Have no account yet? <a class="text-primary" href="{{route('register')}}">Sign up</a> </p>
                        </div>
                    </x-forms.form>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection