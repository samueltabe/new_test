<!DOCTYPE html>
<html lang="en" class="light">
    <!-- BEGIN: Head -->

    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <head>
        <meta charset="utf-8">
        <link href="{{ asset('dist/images/logo.svg') }}" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Enigma admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Enigma Admin Template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="LEFT4CODE">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <!-- for trix -->
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
        <title>Dashboard</title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}" />
        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
    <body class="py-5 md:py-0">
        <!-- BEGIN: Mobile Menu -->
        <div class="mobile-menu md:hidden">
            <div class="mobile-menu-bar">
                <a href="#" class="flex mr-auto">
                    <img alt="Midone - HTML Admin Template" class="w-6" src="{{ asset('dist/images/logo.svg') }}">
                </a>
                <a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
            </div>
             @include('layouts.inc.mobilesidebar')
        </div>
        <!-- END: Mobile Menu -->
        <!-- BEGIN: Top Bar -->
        <div class="top-bar-boxed h-[70px] md:h-[65px] z-[51] border-b border-white/[0.08] mt-12 md:mt-0 -mx-3 sm:-mx-8 md:-mx-0 px-3 md:border-b-0 relative md:fixed md:inset-x-0 md:top-0 sm:px-8 md:px-10 md:pt-10 md:bg-gradient-to-b md:from-slate-100 md:to-transparent dark:md:from-darkmode-700">
            <div class="h-full flex items-center">
                <!-- BEGIN: Logo -->
                <a href="#" class="logo -intro-x hidden md:flex xl:w-[180px] block">
                    <img alt="Midone - HTML Admin Template" class="logo__image w-6" src="{{ asset('dist/images/logo.svg') }}">
                    <span class="logo__text text-white text-lg ml-3"> Test </span>
                </a>
                <!-- END: Logo -->
                <!-- BEGIN: Breadcrumb -->
                <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
                    <ol class="breadcrumb breadcrumb-light">
                        <li class="breadcrumb-item"><a href="#">Application</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>

                <!-- BEGIN: Account Menu -->
                <div class="intro-x dropdown w-8 h-8">
                    <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110" role="button" aria-expanded="false" data-tw-toggle="dropdown">
                        <img alt="Midone - HTML Admin Template" src="{{ asset('dist/images/profile-6.jpg') }}">
                    </div>
                    <div class="dropdown-menu w-56">
                        <ul class="dropdown-content bg-primary/80 before:block before:absolute before:bg-black before:inset-0 before:rounded-md before:z-[-1] text-white">
                            <li class="p-2">
                                <div class="font-medium">{{ Auth::user()->name }}</div>
                                <div class="text-xs text-white/60 mt-0.5 dark:text-slate-500">{{ Auth::user()->email }}</div>
                            </li>
                            <li>
                                <hr class="dropdown-divider border-white/[0.08]">
                            </li>
                            <li>
                                <a href="{{ route('logout') }}" class="dropdown-item hover:bg-white/5"> <i data-lucide="toggle-right" class="w-4 h-4 mr-2"></i>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <p :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="">
                                            Logout
                                        </p>
                                    </form>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
                <!-- END: Account Menu -->
            </div>
        </div>
        <!-- END: Top Bar -->
        <div class="flex overflow-hidden">
            <!-- BEGIN: Side Menu -->
             @include('layouts.inc.sidebar')
            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
             @yield('content')
             @if (session()->has('success'))
             <div id="flash-message" class="absolute left-1/2 transform -translate-x-1/2 bg-green-600 bg-opacity-75 p-4 max-w-sm text-white">
                     {{ session()->get('success') }}
                 </div>
             @endif
             @if (session()->has('error'))
             <div id="flash-message" class="absolute left-1/2 transform -translate-x-1/2 bg-red-600 bg-opacity-75 p-4 max-w-sm text-white">
                     {{ session()->get('error') }}
                 </div>
             @endif
            <!-- END: Content -->
        </div>

        <!-- BEGIN: JS Assets-->

        <script src="{{ asset('dist/js/app.js') }}"></script>


        <script>
            $(document).ready(function() {
                setTimeout(function() {
                    // Fade out the flash message
                    $('#flash-message').fadeOut(1000);
                }, 2500); // 2 seconds
            });
        </script>
    </body>
</html>
