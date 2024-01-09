<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>

<body>
  <section class="bg-gray-50 dark:bg-gray-900">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <a href="{{route('class_list')}}" class=" text-white bg-primary-600 hover:bg-primary-700  focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 absolute left-2 top-2 shadow-md">Back</a>
      <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
          <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white flex justify-center items-center">
            ADD USER TO CLASS
          </h1>
          <form class="space-y-4 md:space-y-6" action="{{route('create_class_user')}}" method="POST">
            @csrf
            <div>
              <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">User</label>
              <select name="user_id" id="user_id" class="form-control focus:outline-none w-full rounded-lg px-2 py-2">
                @foreach($users as $user)
                @if($user->role_id===1)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endif
                @endforeach
              </select>
            </div>
            <div>
              <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Class</label>
              <select name="class_id" id="class_id" class="form-control focus:outline-none w-full rounded-lg px-2 py-2">
                @foreach($classes as $class)
                <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                @endforeach
              </select>
            </div>
            <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </section>
</body>

</html>