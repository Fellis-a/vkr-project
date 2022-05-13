@extends('layouts.app')

@section('content')
<div id="wrapper">
        <header>
            <div class="container page-title">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Password Retrieval</h1>
                    </div>
                </div>
            </div>
        </header>

        <!-- Top Rounded Divider -->
        <svg class="topLeftRounded" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100"
             viewBox="50 20 50 80" preserveAspectRatio="none">
            <path d="M0,100 C15,100 35,50 50,50 L50,50 C65,50 85,100 100,100 Z"></path>
        </svg>

        <section class="auth">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">

                        <form method="post" class="auth-form forgotme" action="/darkseid/account/forgot-password">

                            <div class="row">
                                <div class="col-md-12">
                                    <p>Enter your email address below and we will send you a link to reset your password.</p>
                                    <label for="eee">Email Address</label>
                                    <input id="eee" name="eee" type="email" value="" size="30" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb50">
                                    <input type="submit" value="Send" class="btn">
                                    <a class="cancel-link gry" href="/login">Cancel</a>
                                </div>
                            </div>
                        </form>

                        <div class="fpwd">
                            <p class="fphelp">Important: If you registered for AddThis by connecting via Facebook or Google, please <a href="/login">Sign In</a> via that service before retrieving your password. <a href="/academy/category/addthis-account" target="_blank">Help with account questions</a></p>
                            <p>
                                <small>
                                    <a class="auth-login" href="/login" title="Sign In">Sign In</a>
                                    <a class="auth-reg" href="/register" title="Sign Up">Sign Up</a>
                                </small>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
    <script type="text/javascript" src="//www.addthis.com/js/shared/core-1.1.1.js"></script>
        <script type="text/javascript" src="//www.addthis.com/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="//www.addthis.com/js/site.footer.js"></script>
@endsection
