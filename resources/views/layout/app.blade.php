<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>SRVE LINK | Agen BRI</title>
    <link type="image/x-icon" href="{{ secure_asset('/favicon.ico') }}" rel="icon" />
    <link href="{{ secure_asset('css/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ secure_asset('css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ secure_asset('css/fontawesome.css') }}" rel="stylesheet" />
    <link href="{{ secure_asset('css/style.css') }}" rel="stylesheet" />
    <link href="{{ secure_asset('css/toastify.min.css') }}" rel="stylesheet" />
    <script src="{{ secure_asset('js/toastify-js.js') }}"></script>
    <script src="{{ secure_asset('js/axios.min.js') }}"></script>
    <script src="{{ secure_asset('js/config.js') }}"></script>

    {{-- For The Client Side Auth --}}
    <script src=" https://cdn.jsdelivr.net/npm/js-cookie@3.0.5/dist/js.cookie.min.js "></script>
</head>

<body>

    <div class="LoadingOverlay d-none" id="loader">
        <div class="Line-Progress">
            <div class="indeterminate"></div>
        </div>
    </div>

    <div>
        @yield('content')
    </div>

    <script src="{{ secure_asset('js/bootstrap.bundle.js') }}"></script>

    {{-- Client side Auth --}}
    <script src="{{ secure_asset('js/auth.js') }}"></script>
</body>

</html>
