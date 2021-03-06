@extends('auth-captcha::login_base')
@section('content')
    <div id="captchaError" class="form-group has-feedback {!! !$errors->has('captcha') ?: 'has-error' !!}"
         style="margin-bottom: 0;">
        @if($errors->has('captcha'))
            @foreach($errors->get('captcha') as $message)
                <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>{{ $message }}
                </label><br>
            @endforeach
        @endif
    </div>
    <div id="captchaContainer"></div>
    <div class="row">
        <div class="col-xs-8">
            @if(config('admin.auth.remember'))
                <div class="checkbox icheck">
                    <label>
                        <input type="checkbox" name="remember"
                               value="1" {{ (!old('username') || old('remember')) ? 'checked' : '' }}>
                        {{ trans('admin.remember_me') }}
                    </label>
                </div>
            @endif
        </div>
        <div class="col-xs-4">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" id="token" name="token" value="">
            <button type="button" class="btn btn-primary btn-block btn-flat" id="loginButton">
                {{ trans('admin.login') }}
            </button>
        </div>
    </div>
@endsection
@section('js')
    <script src="//cstaticdun.126.net/load.min.js?t={{ now()->format('YmdHi') }}"></script>
    <script>
        let captchaIns = null;
        initNECaptcha(Object.assign({
                captchaId: '{{ $captchaAppid }}',
                element: '#captchaContainer',
                mode: '{{ $captchaStyle }}',
                width: '320px',
                lang: '{{ config('app.locale') }}',
                feedbackEnable: false,
                onVerify: function (err, data) {
                    if (err) {
                        captchaIns.refresh();
                        return;
                    }
                    $('#token').attr('value', data.validate);
                    $('#auth-login').submit();
                }
            }, @json(config('admin.extensions.auth-captcha.ext_config', []))
            ), function onload(instance) {
                captchaIns = instance;
            },
            function onerror(err) {
                console.log(err);
            },
        );

        $('#loginButton').bind('click', function (event) {
            @if ($captchaStyle === 'popup')
                captchaIns && captchaIns.popUp();
            @else
                captchaIns && captchaIns.verify();
            @endif
        });

        $('#auth-login').bind('keyup', function (event) {
            if (event.keyCode === 13) {
                $('#loginButton').click();
            }
        });
    </script>
@endsection