<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'User Manager System - ID') }}</title>

    <link rel="stylesheet" href="/css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="/css/app.css?_<?=time()?>" rel="stylesheet">
</head>
<body>
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="/js/jquery-form.js"></script>
<script src="/js/bootstrap.js"></script>
<script src="/js/Api.js?_<?=time()?>"></script>
<script src="/js/Users.js?_<?=time()?>"></script>
<script src="/js/Permissions.js?_<?=time()?>"></script>
<script src="/js/Roles.js?_<?=time()?>"></script>
<script src="/js/Inactives.js?_<?=time()?>"></script>
<script src="/js/History.js?_<?=time()?>"></script>
</html>
