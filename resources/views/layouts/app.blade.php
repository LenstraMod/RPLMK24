<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FotoDunia | @yield('title')</title>

    <!-- {{-- Font Setting --}} -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Honk&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .active{
            padding: 2px 12px;
            background: rgb(255,255,178);
            background: linear-gradient(180deg, rgba(255,255,178,1) 25%, rgba(255,132,93,1) 60%, rgba(255,80,147,1) 91%);
            border : 1px;
            border-radius: 20px;
            width: fit-content;
        }
        body{
            overflow-x: hidden;
        }
    </style>
</head>
<body>
    @yield('content')
</body>
<script src="https://kit.fontawesome.com/7ca5875fcd.js" crossorigin="anonymous"></script>
</html>