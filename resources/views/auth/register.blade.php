@extends('layouts.auth')

@section('content')

<div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
    <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
        <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
            Sign Up
        </h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="intro-x mt-8">
                <x-text-input id="name" class="intro-x login__input form-control py-3 px-4 block mt-4" type="text" name="name" placeholder="Full Name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />

                <x-text-input id="email" class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="Enter Email" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />

                <x-text-input id="password" class="intro-x login__input form-control py-3 px-4 block mt-4"
                    type="password"
                    name="password"
                    placeholder="Enter Password"
                    required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />

                <x-text-input id="password_confirmation" class="intro-x login__input form-control py-3 px-4 block mt-4"
                    type="password"
                    placeholder="Confirm Password"
                    name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
            <p class="text-primary mt-3 dark:text-slate-200">Already have an account? <a href="{{ route('login') }}" class="text-blue-500 hover:text-blue-300">Login</a> </p>
            <div class="intro-x mt-3 xl:mt-3 text-center xl:text-left">
                <button class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Register</button>
            </div>
        </form>
    </div>
</div>

@endsection
