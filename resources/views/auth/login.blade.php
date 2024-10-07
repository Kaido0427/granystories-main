@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
     
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Mot de passe') }}</label>
                        
                            <div class="col-md-6 position-relative">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                <svg id="togglePassword" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16" style="cursor: pointer; position: absolute; right: 15px; top: 50%; transform: translateY(-50%);">
                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zm-8 4a4 4 0 1 1 0-8 4 4 0 0 1 0 8z"/>
                                    <path d="M8 3a5 5 0 0 0-5 5 .5.5 0 0 0 1 0 4 4 0 1 1 8 0 .5.5 0 0 0 1 0 5 5 0 0 0-5-5z"/>
                                </svg>
                        
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-warning">
                                    {{ __('Acceder au livre') }}
                                </button>
                            </div>
                        </div>
                    </form>
        </div>
    </div>
</div>
<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function () {
        // Toggle the password visibility
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);

        // Toggle the icon between an open eye and a closed eye
        this.innerHTML = type === 'password' 
            ? '<path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zm-8 4a4 4 0 1 1 0-8 4 4 0 0 1 0 8z"/><path d="M8 3a5 5 0 0 0-5 5 .5.5 0 0 0 1 0 4 4 0 1 1 8 0 .5.5 0 0 0 1 0 5 5 0 0 0-5-5z"/>' 
            : '<path d="M13.359 11.238C14.348 10.297 15 9.202 15 8s-3-5.5-7-5.5S1 8 1 8c0 1.201.652 2.296 1.641 3.238L0 12.999l.707.707 14-14L14.707 0l-4.786 4.786c.74.615 1.328 1.48 1.568 2.424A3 3 0 0 1 9.658 8H8.56l2.094 2.094c.52-.206.995-.52 1.405-.934zm-4.707 1.252A4.992 4.992 0 0 1 4.732 8c-.212.21-.417.43-.614.658a3 3 0 0 1 1.104-.658L5.651 8H6.56l2.094 2.094c-.52.206-.995.52-1.405.934l1.406 1.406zm1.944-1.945l-.012-.012-.012.012L8.812 9.12 6.719 7.026c-.687.408-1.26.9-1.705 1.384A3 3 0 0 1 6.342 8H7.34c.197 0 .394-.023.588-.068L9.241 5.77a2.971 2.971 0 0 1-1.42-.343c-.207-.087-.408-.189-.604-.304l-1.555 1.556-.012.012-.012-.012L.707 1.293 1.414 0l11.945 11.945-1.106 1.107z"/>';
    });
</script>
<style>
    body{
        color: black !important;
    }
</style>

@endsection

