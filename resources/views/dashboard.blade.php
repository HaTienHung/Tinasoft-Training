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
      <h1>Dashboard</h1>
    </div>
    <div>
      @php
      $userRoleName = 'user';
      $instructorRoleName = 'instructor';
      @endphp
      <a href="{{ route('users_list', ['role_name' => $userRoleName]) }}" class="text-white bg-primary-600 hover:bg-primary-700 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 shadow-md">View users list</a>
      <a href="{{ route('class_list') }}" class="text-white bg-primary-600 hover:bg-primary-700 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 shadow-md">View class list</a>
      @can('view-instructor-list')
      <a href="{{ route('users_list', ['role_name' => $instructorRoleName]) }}" class="text-white bg-primary-600 hover:bg-primary-700 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 shadow-md">View instructors list</a>
      @endcan
      @can('add-user-list')
      <a href="{{ route('add_user')}}" class="text-white bg-primary-600 hover:bg-primary-700 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 shadow-md">Add user</a>
      @endcan
    </div>
    <div>
      <p>Welcome, {{ Auth::user()->name }}!</p>
      <p>Role: {{ Auth::user()->role->role_name }}</p>
    </div>
  </div>
  <div class="absolute top-2 right-2">
    <form action="{{ route('logout') }}" method="post">
      @csrf
      <button type="submit" class="text-white bg-primary-600 hover:bg-primary-700 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 shadow-md">Logout</button>
    </form>
  </div>
</body>

</html>