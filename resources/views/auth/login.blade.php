@extends('layouts.auth')
@section('content')
                <!-- BEGIN: Login Form -->
                <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                    <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                        <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                            Sign In
                        </h2>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="intro-x mt-8">
                                <x-text-input id="email" class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="Enter Email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                <x-text-input id="password" class="intro-x login__input form-control py-3 px-4 block mt-4"
                                    type="password"
                                    name="password"
                                    placeholder="Enter Password"
                                    required autocomplete="current-password" />
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                            <div class="intro-x flex text-slate-600 dark:text-slate-500 text-xs sm:text-sm mt-4 space-x-8">
                                @if (Route::has('password.request'))
                                    <a class="text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif
                                <p class="text-primary dark:text-slate-200">Don't have an account? <a href="{{ route('register') }}" class="text-blue-500 hover:text-blue-300">Register</a> </p>
                            </div>
                            <div class="flex intro-x mt-5 xl:mt-8 text-center xl:text-left space-x-3">
                                <button class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Login</button>

                            </div>
                        </form>
                    </div>
                </div>
                <!-- END: Login Form -->
@endsection
