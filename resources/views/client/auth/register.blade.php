@extends('client.layout.master')

@section('content')
<section class="eblog-sign-up-area tp-section-gap">
    <div class="container">
        <div class="section-inner">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-8">
                    <h2 class="heading-title text-center">Đăng ký</h2>

                    <x-forms.form action="/register" method="post">
                        <div class="form-inner inner">
                            <x-forms.group class="single-input-wrapper" error="name">
                                <x-forms.input
                                    name="name" 
                                    placeholder="Full name"/>
                            </x-forms.group>

                            <x-forms.group class="single-input-wrapper" error="email">
                                <x-forms.input
                                    name="email" 
                                    placeholder="Your email"/>
                            </x-forms.group>

                            <x-forms.group class="single-input-wrapper" error="password">
                                <x-forms.input
                                    type="password"
                                    name="password" 
                                    placeholder="Password"/>
                            </x-forms.group>

                            <x-forms.group class="single-input-wrapper" error="password_confirmation">
                                <x-forms.input
                                    type="password"
                                    name="password_confirmation" 
                                    placeholder="Re-enter password"/>
                            </x-forms.group>

                            <div class="single-input-wrapper">
                                <button type="submit" class="subscribe-btn tp-btn btn-primary bg-secondary">Create an account</button>
                            </div>
                        </div>
                        <div class="form-bottom-text">
                            <p class="text-center">You already have an account? <a class="text-primary" href="{{route('login')}}">Sign in</a> </p>
                        </div>
                    </x-forms.form>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection