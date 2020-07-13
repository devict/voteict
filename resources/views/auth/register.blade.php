@extends('layouts.base')

@section('content')
<div class="bg-gray-200 min-h-screen flex justify-center items-center sm:px-6 lg:px-8">
    <div class="w-full max-w-sm">
        <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}"
            class="mt-8 bg-white rounded-lg shadow-lg overflow-hidden"
        >
            <div class="px-4 py-5 sm:p-6">
                <h1 class="text-center font-bold text-3xl">{{ __('Register') }}</h1>
                <div class="mx-auto mt-6 w-24 border-b-2"></div>

                @include('partials.flash')
                @csrf

                <div class="mt-6 space-y-4">
                    <div>
                        <x-input :label="__('Name')" name="name" :value="old('name')" required autofocus />
                    </div>
                    <div>
                        <x-input :label="__('E-Mail Address')" type="email" name="email" :value="old('email')" required />
                    </div>
                    <div>
                        <x-text :label="__('Password')" type="password" name="password" required />
                    </div>
                    <div>
                        <x-text :label="__('Password')" type="password" name="password_confirmation" required />
                    </div>
                </div>
            </div>
            <div class="bg-gray-100 border-t border-gray-200 flex justify-end items-center px-4 py-4 sm:px-6">
                <button type="submit" class="btn">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
