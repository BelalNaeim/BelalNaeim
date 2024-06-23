@extends('layouts.app')
@section('title', 'تسجيل الدخول');
@section('content')
    <div class="container-fluid bg-color2 p-5">
        <div class="pt-5" style="min-height: 60vh;">
            <h2 class="text-light text-center">تسجيل الدخول</h2>
            <div id="form-phone" class="form-container" style="display: none;">
                <p class="text-secondary text-center pt-4">لتسجيل الدخول اضف رقم جوالك ادناه. وسيتم ارسال رسالة نصية
                    للتحق
                    من الرقم المضاف.</p>
                <form id="form-login" class="login form">
                    <div dir="ltr" class="form-group row short flex-row mb-3">
                        <div class="col col-4 col-md-3"><select required="required"
                                class="form-control shadow-none text-secondary" style="text-align: left; direction: ltr;">
                                <option value="+966">+966
                                </option>
                                <option value="+971">+971
                                </option>
                                <option value="+965">+965
                                </option>
                                <option value="+968">+968
                                </option>
                                <option value="+973">+973
                                </option>
                                <option value="+974">+974
                                </option>
                                <option value="+20">+20
                                </option>
                            </select></div>
                        <div class="col col-8 col-md-9 position-relative mb-2">
                            <input id="mobile" autofocus="autofocus" type="tel" required="required"
                                placeholder="5xxxxxxxx" class="phone form-control mb-0 shadow-none text-secondary">
                        </div>
                    </div>
                    <label class="text-secondary text-center">بالضغط على دخول الطلب فأنت توافق على سياسة
                        الخصوصية</label>
                    <button id="login-btn" href="#" class="btn btn-primary mx-1">دخول</button>

                </form>
            </div>

            <div id="form-email" class="form-container" style="display: none;">
                <p class="text-secondary text-center pt-4">لتسجيل الدخول ادخل ايميلك</p>
                <div id="form-login" class="login form">
                    <div dir="ltr" class="form-group row short flex-row mb-3">
                        <div class="col position-relative mb-2">
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                   placeholder="email@example.com" class="form-control mb-0 shadow-none text-secondary">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <button id="check-btn" onclick="checkEmail()" class="btn btn-primary mx-1">
                        <span id="check-btn-spinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                        دخول
                    </button>
                </div>
            </div>
            <div id="form-password" class="form-container" style="display: none;">
                <p class="text-secondary text-center pt-4">ادخل الباسورد</p>
                <form id="form-login" class="login form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div dir="ltr" class="form-group row short flex-row mb-3">
                        <div class="col position-relative mb-2">
                            <input id="log-email" type="email" name="email"
                                   class="d-none">
                            <input id="password" type="password" name="password"  required autofocus
                                   class="form-control mb-0 shadow-none text-secondary">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label text-secondary" for="remember">
                            {{ __('تذكرني') }}
                        </label>
                    </div>
                    <label class="text-secondary text-center">بالضغط على دخول الطلب فأنت توافق على سياسة
                        الخصوصية</label>
                    <button id="login-btn"  class="btn btn-primary mx-1">دخول</button>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link " href="{{ route('password.request') }}">
                            {{ __('نسيت كلمة السر') }}
                        </a>
                    @endif
                </form>
            </div>
            <form id="form-register" class="form-container" style="display: none;" method="POST" action="{{ route('register') }}">
                @csrf

                <div class="row mb-3">
                    <label for="name" class="text-secondary col-md-2 col-form-label text-md-end">{{ __('الاسم') }}</label>

                    <div class="col-md-10">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div id="row-re-email" class="row mb-3">
                    <label for="email" class="text-secondary col-md-2 col-form-label text-md-end">{{ __('الايميل') }}</label>

                    <div class="col-md-10">
                        <input id="re-email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div id="row-re-phone" class="row mb-3">
                    <label for="phone" class="text-secondary col-md-2 col-form-label text-md-end">{{ __('الهاتف') }}</label>

                    <div class="col-md-10">
                        <input id="re-phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password" class="text-secondary col-md-2 col-form-label text-md-end">{{ __('الباسورد') }}</label>

                    <div class="col-md-10">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password-confirm" class="text-secondary col-md-2 col-form-label text-md-end">{{ __('تأكيد الباسورد') }}</label>

                    <div class="col-md-10">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <button id="register-btn" type="submit" class="btn btn-primary">
                    {{ __('تسجيل') }}
                </button>
            </form>
            <div id="login-btns" class="col-md-4  mx-auto">
                <div class="row flex-column mt-5 gy-4 justify-content-center">
                    <button id="mycard-btn" href="#" class="btn btn-primary" onclick="loginWithPhone()"><img
                            class="float-end pe-2" src="{{ asset('assets/images/mobile-button 1.svg') }}" />عن طريق رقم
                        الجوال</button>
                    <button id="mycard-btn" href="#" class="btn btn-primary" onclick="loginWithEmail()"><img
                            class="float-end pe-2" src="{{ asset('assets/images/message-icon.svg') }}" />عن طريق البريد
                        الالكتروني</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
    function checkEmail() {
        $('#check-btn').prop('disabled', true);
        $('#check-btn-spinner').removeClass('d-none');
        var email = $('#email').val();
        $.ajax({
            url: '/check-email',
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                "email": email,
            },
            success: function(response) {
                $('#check-btn').prop('disabled', false);
                $('#check-btn-spinner').addClass('d-none');
                if (response.errors) {
                    $('#email').addClass('is-invalid');
                    $('#email').next('.invalid-feedback').html(response.errors.email);
                } else {
                    if(response.message === 'not'){
                        $('#form-email').css("display", "none");
                        $('#form-register').fadeIn();
                        $('#re-email').val($('#email').val());
                        $('#row-re-email').css("display", "none");
                    } else if(response.message === 'exist'){
                        $('#form-email').css("display", "none");
                        $('#form-password').fadeIn();
                        $('#log-email').val($('#email').val());
                    }
                }
            },
            error: function(xhr, status, error) {
                $('#check-btn').prop('disabled', false);
                $('#check-btn-spinner').addClass('d-none');
                var errorMessage = xhr.responseText;
                alert(errorMessage);
            }
        });

    }
</script>
@endsection
