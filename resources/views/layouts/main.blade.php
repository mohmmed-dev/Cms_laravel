<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name')}}</title>
    <style>
        body {
            background-color: #f0f0f0;
        }
    </style>
    @yield('style')
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
    <x-create-new-post/>
    @livewire('navigation-menu')
    <div class="py-4 mb-10 ">
        <div class="container m-auto min-h-screen">
                @include('flash.success')
                <h2 class="text-3xl my-4 mx-2">
                    @yield('title')
                </h2>
                @yield('content')
        </div>
    </div>
    @include('partials.footer')
    <script type="importmap">
        {
            "imports": {
                "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.3.1/ckeditor5.js",
                "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.3.1/"
            }
        }
    </script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script >
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('2baa0dc9e98f7e9ce928', {
        cluster: 'mt1',
        });

        function showNotification() {
                let comment = document.querySelector('#main_box');
                comment.classList.toggle('hidden');
            }
    </script>

    @yield('script')
</body>
</html>
