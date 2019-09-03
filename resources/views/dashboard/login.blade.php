<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>{{ settings('site_name_' . lang()) }} | {{ trans('site.login') }}</title>
    <link rel="shortcut icon" href="{{ Request::root() }}/design/site/img/logo.png">

    <link href="{{ Request::root() }}/design/site/css/all.min.css" rel="stylesheet" />
    <link href="{{ Request::root() }}/design/site/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ Request::root() }}/design/site/css/owl.carousel.css" rel="stylesheet" />
    <link href="{{ Request::root() }}/design/site/css/hover.css" rel="stylesheet" />
    <link href="{{ Request::root() }}/design/site/css/jquery.fancybox.min.css" rel="stylesheet" />
    <link href="{{ Request::root() }}/design/site/css/animate.css" rel="stylesheet" />
    <link href="{{ Request::root() }}/design/site/css/style.css" rel="stylesheet" />

    @if(App::isLocale('en'))
        <link rel="stylesheet" href="{{ Request::root() }}/design/site/css/styleLTR.css">
    @endif

</head>
<body >

<!-- Start Loading Page -->

<div class="layer-preloader">
    <img src="{{ Request::root() }}/design/site/img/splash.png" alt="logo">
    <div>موقع فاعليات دليلك لكل ما يحدث حولك</div>
</div>

<!-- End Loading Page -->

<!--  Start login  -->
<div class='loginDiv'>
    <h2 class=" wow fadeInDown " data-wow-delay=".1s">{{ trans('site.login') }}</h2>
    <img src="{{ Request::root() }}/design/site/img/apple.png" alt="fa3lyat" class="appleImg wow rightApple fadeIn " data-wow-delay=".5s">
    <img src="{{ Request::root() }}/design/site/img/apple_left.png" alt="fa3lyat" class="appleImg leftApple wow fadeIn " data-wow-delay=".5s">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">




                <form class="mainForm needs-validation" method="post" action="{{route('login')}}" novalidate>
                    {{csrf_field()}}

                    <img src="{{ Request::root() }}/design/site/img/logo.png" alt="logo" class="logoImg">
                    <div class="form-group has-float-label wow fadeInUp " data-wow-delay=".6s">
                        <div class="inputFocus"></div>
                        <input name="email" value="{{old('email')}}" type="email" class="form-control" id="phone" placeholder="{{ trans('site.email') }}" autocomplete="off" required>
                        <label for="phone">{{ trans('site.email') }}</label>
                        <i class="fas fa-mobile-alt formIcon"></i>
                        <div class="invalid-feedback">
                            {{ trans('site.email_validation') }}
                        </div>
                    </div>
                    <div class="form-group has-float-label wow fadeInUp " data-wow-delay=".8s">
                        <div class="inputFocus"></div>
                        <input type="password" name="password" type="password" class="form-control" id="password" placeholder="{{ trans('site.password') }}" autocomplete="off" required>
                        <label for="password">{{ trans('site.password') }}</label>
                        <i class="fas fa-lock formIcon"></i>
                        <div class="invalid-feedback">
                            {{ trans('site.pass_validation') }}
                        </div>
                    </div>
                    <div class="rememberDiv wow fadeInUp " data-wow-delay="1s">
                        <label class="custom-control overflow-checkbox">
                            <input type="checkbox" name="rememberme" value="1" class="overflow-control-input">
                            <span class="overflow-control-indicator"></span>
                            <span class="overflow-control-description">{{ trans('site.remember_me') }}</span>
                        </label>
                        <a href="#">{{ trans('site.forget_password') }}</a>
                    </div>
                    <button type="submit" class="btn btn-primary formBtn wow fadeInUp " data-wow-delay="1.2s">{{ trans('site.login') }}</button>
                    <div class="noAcc wow fadeInUp " data-wow-delay="1.4s" style="text-align: center">
                        <a href="{{ route('register') }}" style="color:#fff"><span style="color:#e51d6f">{{ trans('site.have_account') }}</span>{{ trans('site.create_new_account') }}</a>
                    </div>
                </form>



                {{--<form class="form-horizontal m-t-20" method="post" action="{{route('login')}}">--}}

                {{--{{csrf_field()}}--}}

                {{--<div class="form-group">--}}
                    {{--<div class="col-xs-12">--}}
                        {{--<input class="form-control" name="password" type="password" required="required" placeholder="كلمة السر">--}}
                    {{--</div>--}}
                    {{--@if(session()->has('error_password'))--}}
                        {{--<div class="invalid-feedback text-center" style="color: red">--}}
                            {{--{{session()->get('error_password')}}--}}
                        {{--</div>--}}
                    {{--@endif--}}
                {{--</div>--}}

                {{--<div class="form-group ">--}}
                    {{--<div class="col-xs-12">--}}
                        {{--<div class="checkbox checkbox-custom">--}}
                            {{--<input type="checkbox" name="rememberme" value="1" data-plugin="switchery" data-color="#3bafda" data-switchery="true" style="display: none;">--}}
                             {{--&nbsp; &nbsp;تذكرني--}}
                        {{--</div>--}}

                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="form-group text-center m-t-30">--}}
                    {{--<div class="col-xs-12">--}}
                        {{--<button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit">تسجيل الدخول</button>--}}
                    {{--</div>--}}
                {{--</div>--}}

            {{--</form>--}}


            </div>
        </div>
    </div>
</div>
<!--  end login  -->

<script>
	// Example starter JavaScript for disabling form submissions if there are invalid fields
	(function() {
		'use strict';
		window.addEventListener('load', function() {
			// Fetch all the forms we want to apply custom Bootstrap validation styles to
			var forms = document.getElementsByClassName('needs-validation');
			// Loop over them and prevent submission
			var validation = Array.prototype.filter.call(forms, function(form) {
				form.addEventListener('submit', function(event) {
					if (form.checkValidity() === false) {
						event.preventDefault();
						event.stopPropagation();
					}
					form.classList.add('was-validated');
				}, false);
			});
		}, false);
	})();
</script>
<script src="{{ Request::root() }}/design/site/js/jquery-3.3.1.min.js"></script>
<script src="{{ Request::root() }}/design/site/js/bootstrap.min.js"></script>
<script src="{{ Request::root() }}/design/site/js/jquery.nicescroll.min.js"></script>
<script src="{{ Request::root() }}/design/site/js/owl.carousel.min.js"></script>
<script src="{{ Request::root() }}/design/site/js/jquery.fancybox.min.js"></script>
<script src="{{ Request::root() }}/design/site/js/masonry-docs.min.js"></script>
<script src="{{ Request::root() }}/design/site/js/wow.min.js"></script>
<script src="{{ Request::root() }}/design/site/js/scripts.js"></script>
<script>
	new WOW().init();
</script>
</body>
</html>
