@extends('layouts.app')

@section('content')
<div class="container">
    <div class="sign-in-sign-up">
        <!-- Sign-in Form -->
        <form method="POST" action="{{ route('login') }}" class="sign-in-form">
            @csrf
            <h2 class="title">Sign in</h2>
            <div class="input-field">
                <i class="fa fa-user"></i>
                <input type="text" name="username" placeholder="Username" required value="{{ old('username') }}" />
            </div>
            <div class="input-field">
                <i class="fa fa-lock"></i>
                <input type="password" name="password" id="password" placeholder="Password" required />
                <button type="button" class="toggle-password-btn" id="togglePassword">
                    <i class="fa fa-eye" id="eyeIcon"></i>
                </button>
            </div>
            <input type="submit" value="Login" class="btn" />
            <p class="account-text">Don't have an account? <a href="#" id="toggleForm">Sign up</a></p>
        </form>

        <!-- Sign-up Form -->
        <form method="POST" action="{{ route('register') }}" class="sign-up-form">
            @csrf
            <h2 class="title">Sign up</h2>
            <div class="input-field">
                <i class="fa fa-user"></i>
                <input type="text" name="username" placeholder="Username" required value="{{ old('username') }}" />
            </div>
            <div class="input-field">
                <i class="fa fa-envelope"></i>
                <input type="email" name="email" placeholder="Email" required value="{{ old('email') }}" />
            </div>
            <div class="input-field">
                <i class="fa fa-lock"></i>
                <input type="password" name="password" id="signupPassword" placeholder="Password" required />
                <button type="button" class="toggle-password-btn" id="toggleSignupPassword">
                    <i class="fa fa-eye" id="eyeSignupIcon"></i>
                </button>
            </div>
            <div class="input-field">
                <i class="fa fa-lock"></i>
                <input type="password" name="password_confirmation" id="confirmPassword" placeholder="Confirm Password" required />
                <button type="button" class="toggle-password-btn" id="toggleConfirmPassword">
                    <i class="fa fa-eye" id="eyeConfirmIcon"></i>
                </button>
            </div>
            <input type="submit" value="Sign up" class="btn" />
            <p class="account-text">Already have an account? <a href="#" id="toggleSignIn">Sign in</a></p>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Toggle password visibility for Sign-in
    const togglePassword = document.getElementById('togglePassword');
    const passwordField = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');
    
    togglePassword.addEventListener('click', function() {
        if (passwordField.type === "password") {
            passwordField.type = "text";
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        } else {
            passwordField.type = "password";
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        }
    });

    // Toggle password visibility for Sign-up
    const toggleSignupPassword = document.getElementById('toggleSignupPassword');
    const signupPasswordField = document.getElementById('signupPassword');
    const eyeSignupIcon = document.getElementById('eyeSignupIcon');

    toggleSignupPassword.addEventListener('click', function() {
        if (signupPasswordField.type === "password") {
            signupPasswordField.type = "text";
            eyeSignupIcon.classList.remove('fa-eye');
            eyeSignupIcon.classList.add('fa-eye-slash');
        } else {
            signupPasswordField.type = "password";
            eyeSignupIcon.classList.remove('fa-eye-slash');
            eyeSignupIcon.classList.add('fa-eye');
        }
    });

    // Toggle password visibility for Confirm password
    const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
    const confirmPasswordField = document.getElementById('confirmPassword');
    const eyeConfirmIcon = document.getElementById('eyeConfirmIcon');

    toggleConfirmPassword.addEventListener('click', function() {
        if (confirmPasswordField.type === "password") {
            confirmPasswordField.type = "text";
            eyeConfirmIcon.classList.remove('fa-eye');
            eyeConfirmIcon.classList.add('fa-eye-slash');
        } else {
            confirmPasswordField.type = "password";
            eyeConfirmIcon.classList.remove('fa-eye-slash');
            eyeConfirmIcon.classList.add('fa-eye');
        }
    });

    // Toggle between Sign-in and Sign-up forms
    document.getElementById('toggleForm').addEventListener('click', function() {
        document.querySelector('.sign-in-sign-up').classList.toggle('sign-up-mode');
    });
    document.getElementById('toggleSignIn').addEventListener('click', function() {
        document.querySelector('.sign-in-sign-up').classList.toggle('sign-up-mode');
    });
</script>
@endsection
