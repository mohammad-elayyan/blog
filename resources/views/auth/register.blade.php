@extends('layout.layout')
@section('title', 'Register')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 col-md-6">
                <form id="register-form" class="form mt-5" action="{{ route('register') }}" method="post">
                    @csrf
                    <h3 class="text-center text-muted">{{ __('posts.register') }}</h3>

                    <div class="form-group">
                        <label for="name" class="text-muted">{{ __('posts.name') }}:</label><br>
                        <input type="name" name="name" id="name" class="form-control"
                            value="{{ old('name') }}">

                        <span class="text-danger" id="name-error"></span>

                    </div>
                    <div class="form-group mt-3">
                        <label for="email" class="text-muted">{{ __('posts.email') }}:</label><br>
                        <input type="email" name="email" id="email" class="form-control"
                            value="{{ old('email') }}">
                        <span class="text-danger" id="email-error"></span>

                    </div>
                    <div class="form-group mt-3">
                        <label for="password" class="text-muted">{{ __('posts.password') }}:</label><br>
                        <input type="password" name="password" id="password" class="form-control">
                        <span class="text-danger" id="password-error"></span>

                    </div>
                    <div class="form-group mt-3">
                        <label for="confirm-password" class="text-muted">{{ __('posts.confirm_password') }} :</label><br>
                        <input type="password" name="password_confirmation" id="confirm-password" class="form-control">

                        <span class="text-danger" id="confirm-password-error"></span>

                    </div>
                    <div class="form-group text-center">
                        <label for="remember-me" class="text-muted"></label><br>
                        <input type="submit" name="submit" class="btn btn-dark btn-md w-50 "
                            value="{{ __('posts.register') }}">
                    </div>
                    <div class="text-center mt-2">
                        <a href="/login" class="text-muted">{{ __('posts.login') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            let formSubmitting = false;
            $('#register-form').on('submit', function(e) {

                if (formSubmitting) return false

                let isValid = true;

                $('#name-error').text('');
                $('#email-error').text('');
                $('#password-error').text('');
                $('#confirm-password-error').text('');

                const name = $('#name').val();
                const namePattern = /^[a-zA-Z0-9\s\-]+$/;
                if (name == '') {
                    $('#name-error').text('Name is required')
                    isValid = false;
                } else if (!namePattern.test(name)) {
                    $('#name-error').text('Name contains invalid characters')
                    isValid = false;
                }

                const email = $('#email').val();
                const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
                if (email === '') {
                    $('#email-error').text('Email is required');
                    isValid = false;
                } else if (!emailPattern.test(email)) {
                    $('#email-error').text('Invalid email address');
                    isValid = false;
                }

                const password = $('#password').val();
                if (password === '') {
                    $('#password-error').text('Password is required');
                    isValid = false;
                } else if (password.length < 8) {
                    $('#password-error').text('Password must be at least 8 characters');
                    isValid = false;
                }

                const confirmPassword = $('#confirm-password').val();
                if (confirmPassword === '') {
                    $('#confirm-password-error').text('Confirm password is required');
                    isValid = false;
                } else if (confirmPassword !== password) {
                    $('#confirm-password-error').text('Passwords do not match');
                    isValid = false;
                }

                if (!isValid) {
                    e.preventDefault();
                } else {
                    formSubmitting = true;
                    $('#register-form').submit();
                }
            });
        });
    </script>
@endsection
