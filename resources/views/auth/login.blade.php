@extends('layouts.base')

@section('content')
<div class="bg-gray-200 min-h-screen flex justify-center items-center sm:px-6 lg:px-8">
    <div class="w-full max-w-sm">
        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}"
            class="mt-8 bg-white rounded-lg shadow-lg overflow-hidden"
        >
            <div class="px-4 py-5 sm:p-6">
                <h1 class="text-center font-bold text-3xl">{{ __('Welcome Back!') }}</h1>
                <div class="mx-auto mt-6 w-24 border-b-2"></div>
                @include('partials.flash')
                @csrf
                <div class="mt-6 space-y-4">
                    <div>
                        <x-text :label="__('E-Mail Address')" type="email" name="email" :value="old('email')" required autofocus />
                    </div>
                    <div>
                        <x-text :label="__('Password')" type="password" name="password" :value="old('password')" required />
                    </div>
                    <div>
                        <x-checkbox :label="__('Remember Me')" name="remember" :value="old('remember')" />
                    </div>
                </div>
            </div>
            <div class="bg-gray-100 border-t border-gray-200 flex justify-between items-center px-4 py-4 sm:px-6">
                <a href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                <button type="submit" class="btn">
                    {{ __('Login') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
