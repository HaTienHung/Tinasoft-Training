<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body>
    <div class="text-3xl font-medium text-primary-600 flex justify-center md:h-screen items-center flex-col gap-y-6">
        <div>
            <h1>This app to test API</h1>
        </div>
        <div>
            <a href="{{route('login_form')}}" class=" text-white bg-primary-600 hover:bg-primary-700  focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 shadow-md">Login</a>
            <a href="{{route('register_form')}}" class=" text-white bg-primary-600 hover:bg-primary-700  focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 shadow-md">Register</a>
        </div>
    </div>
</body>

</html>