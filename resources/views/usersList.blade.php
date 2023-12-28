<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>

<body>
  <section class="bg-gray-50">
    <div class="flex flex-col items-center justify-center px-6 md:h-screen">
      <div class="bg-white px-8 py-8 rounded-lg shadow-lg sm:max-w-5xl">
        <h1 class="text-2xl font-bold mb-4 text-primary-600">USERS LIST</h1>
        <table class="table-auto">
          <thead class="font-bold text-lg">
            <tr>
              <td class="px-4 py-2">ID</td>
              <td class="px-4 py-2">Name</td>
              <td class="px-4 py-2">Email</td>
              <td class="px-4 py-2">Phone</td>
            </tr>
          </thead>
          <tbody>
            @foreach($allUsers as $user)
            <tr>
              <td class="px-4 py-2">{{$user->id}}</td>
              <td class="px-4 py-2 flex items-center">
                <img src="https://th.bing.com/th/id/OIG.gq_uOPPdJc81e_v0XAei" class="w-8 h-8 mr-2 object-fill rounded-full">
                {{$user->name}}
              </td>
              <td class="px-4 py-2">{{$user->email}}</td>
              <td class="px-4 py-2">{{$user->phone_number}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </section>
</body>

</html>