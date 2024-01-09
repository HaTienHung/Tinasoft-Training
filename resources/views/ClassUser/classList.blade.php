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
      <a href="{{route('dashboard')}}" class=" text-white bg-primary-600 hover:bg-primary-700 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 absolute left-2 top-2 shadow-md">Back</a>
      @can('add-user-list')
      <a href="{{route('addClassUserForm')}}" class="text-white bg-primary-600 hover:bg-primary-700 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 shadow-md absolute left-24 top-2">Add user</a>
      @endcan
      <div class="bg-white px-8 py-8 rounded-lg shadow-lg sm:max-w-5xl">
        <h1 class="text-2xl font-bold mb-4 text-primary-600 uppercase">CLASS LIST</h1>
        <table class="table-auto">
          <thead class="font-bold text-lg">
            <tr>
              <td class="px-4 py-2">ID</td>
              <td class="px-4 py-2">TeacherID</td>
              <td class="px-4 py-2">ClassName</td>
              <td class="px-4 py-2">Actions</td>
            </tr>
          </thead>
          <tbody>
            @foreach($classes as $class)
            <tr>
              <td class="px-4 py-2">{{$class->id}}</td>
              <td class="px-4 py-2">{{$class->teacher_id}}</td>
              <td class="px-4 py-2">{{$class->class_name}}</td>
              <td class="px-4 py-2">
                <div class="flex justify-between items-center">
                  <a href="{{route('class_info',['id'=>$class->id])}}">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" viewBox="0 0 100 100" class="w-6 h-6 cursor-pointer deleteButton">
                      <path fill="#ee3e54" d="M13 27A2 2 0 1 0 13 31A2 2 0 1 0 13 27Z"></path>
                      <path fill="#f1bc19" d="M77 12A1 1 0 1 0 77 14A1 1 0 1 0 77 12Z"></path>
                      <path fill="#fce0a2" d="M50 13A37 37 0 1 0 50 87A37 37 0 1 0 50 13Z"></path>
                      <path fill="#f1bc19" d="M83 11A4 4 0 1 0 83 19A4 4 0 1 0 83 11Z"></path>
                      <path fill="#ee3e54" d="M87 22A2 2 0 1 0 87 26A2 2 0 1 0 87 22Z"></path>
                      <path fill="#fbcd59" d="M81 74A2 2 0 1 0 81 78 2 2 0 1 0 81 74zM15 59A4 4 0 1 0 15 67 4 4 0 1 0 15 59z"></path>
                      <path fill="#ee3e54" d="M25 85A2 2 0 1 0 25 89A2 2 0 1 0 25 85Z"></path>
                      <path fill="#fff" d="M18.5 51A2.5 2.5 0 1 0 18.5 56A2.5 2.5 0 1 0 18.5 51Z"></path>
                      <path fill="#f1bc19" d="M21 66A1 1 0 1 0 21 68A1 1 0 1 0 21 66Z"></path>
                      <path fill="#fff" d="M80 33A1 1 0 1 0 80 35A1 1 0 1 0 80 33Z"></path>
                      <g>
                        <path fill="#78a2d2" d="M35,72.3c-4,0-7.3-3.3-7.3-7.3V35c0-4,3.3-7.3,7.3-7.3h30c4,0,7.3,3.3,7.3,7.3v30c0,4-3.3,7.3-7.3,7.3H35z"></path>
                        <path fill="#472b29" d="M65,28.4c3.6,0,6.6,3,6.6,6.6v30c0,3.6-3,6.6-6.6,6.6H35c-3.6,0-6.6-3-6.6-6.6V35c0-3.6,3-6.6,6.6-6.6H65 M65,27H35c-4.4,0-8,3.6-8,8v30c0,4.4,3.6,8,8,8h30c4.4,0,8-3.6,8-8V35C73,30.6,69.4,27,65,27L65,27z"></path>
                      </g>
                      <g>
                        <path fill="#472b29" d="M68.5,47.4c-0.3,0-0.5-0.2-0.5-0.5V43c0-0.3,0.2-0.5,0.5-0.5S69,42.7,69,43v3.9C69,47.2,68.8,47.4,68.5,47.4z"></path>
                      </g>
                      <g>
                        <path fill="#472b29" d="M68.5,40.5c-0.3,0-0.5-0.2-0.5-0.5v-2c0-0.3,0.2-0.5,0.5-0.5S69,37.7,69,38v2C69,40.3,68.8,40.5,68.5,40.5z"></path>
                      </g>
                      <g>
                        <path fill="#472b29" d="M64,69H36c-2.8,0-5-2.2-5-5V36c0-2.8,2.2-5,5-5h25.4c0.3,0,0.5,0.2,0.5,0.5S61.7,32,61.4,32H36 c-2.2,0-4,1.8-4,4v28c0,2.2,1.8,4,4,4h28c2.2,0,4-1.8,4-4V49.6c0-0.3,0.2-0.5,0.5-0.5s0.5,0.2,0.5,0.5V64C69,66.8,66.8,69,64,69z"></path>
                      </g>
                      <g>
                        <path fill="#fdfcee" d="M52.3,58.2c0,0.9,1,1.4,3,1.4v1.8H44.7v-1.8c2,0,3-0.5,3-1.4v-9.6c0-1-1-1.5-3-1.5v-1.8h7.7V58.2z M52.8,40.1 c0,0.7-0.3,1.4-0.8,1.9s-1.3,0.8-2.1,0.8c-0.4,0-0.8-0.1-1.2-0.2c-0.4-0.1-0.7-0.3-0.9-0.6s-0.5-0.5-0.6-0.9 c-0.2-0.3-0.2-0.7-0.2-1.1c0-0.8,0.3-1.4,0.9-1.9c0.6-0.5,1.3-0.8,2.1-0.8c0.8,0,1.5,0.3,2.1,0.8C52.5,38.7,52.8,39.3,52.8,40.1z"></path>
                        <path fill="#472b29" d="M55.8,62H44.2v-2.8h0.5c1.1,0,2.5-0.2,2.5-0.9v-9.6c0-0.8-1.3-1-2.5-1h-0.5v-2.8h8.7l0,13.4 c0,0.2,0,0.3,0.1,0.4c0.2,0.2,0.7,0.5,2.4,0.5h0.5V62z M45.2,61h9.7v-0.8c-1.3-0.1-2.1-0.3-2.6-0.8c-0.3-0.3-0.4-0.7-0.4-1.1V45.9 h-6.7v0.8c2,0.1,3,0.7,3,1.9v9.6c0,1.2-1,1.8-3,1.9V61z M49.8,43.3c-0.5,0-0.9-0.1-1.3-0.3c-0.4-0.2-0.8-0.4-1.1-0.7 c-0.3-0.3-0.6-0.6-0.7-1c-0.2-0.4-0.3-0.8-0.3-1.3c0-0.9,0.4-1.7,1-2.3c0.7-0.6,1.5-0.9,2.4-0.9c0.9,0,1.7,0.3,2.4,0.9 c0.7,0.6,1,1.4,1,2.3c0,0.9-0.3,1.6-1,2.3C51.6,43,50.8,43.3,49.8,43.3z M49.8,37.9c-0.7,0-1.3,0.2-1.8,0.6 c-0.5,0.4-0.7,0.9-0.7,1.5c0,0.3,0.1,0.6,0.2,0.8c0.1,0.3,0.3,0.5,0.5,0.7c0.2,0.2,0.5,0.4,0.8,0.5c0.3,0.1,0.6,0.2,1,0.2 c0.7,0,1.3-0.2,1.7-0.7c0.5-0.4,0.7-0.9,0.7-1.5c0-0.6-0.2-1.1-0.7-1.5C51.1,38.1,50.5,37.9,49.8,37.9z"></path>
                      </g>
                    </svg>
                  </a>
                  @can('view-instructor-list')
                  <form action="{{route('delete_class',['id'=>$class->id])}}" method="POST" class="deleteForm">
                    @csrf
                    @method('delete')
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="64" height="64" viewBox="0 0 64 64" class="w-6 h-6 cursor-pointer deleteButton">
                      <radialGradient id="SrYuS0MYDGH9m0SRC6_noa_Pvblw74eluzR_gr1" cx="31.417" cy="-1098.083" r="28.77" gradientTransform="translate(0 1128)" gradientUnits="userSpaceOnUse">
                        <stop offset="0" stop-color="#f4e09d"></stop>
                        <stop offset=".226" stop-color="#f8e8b5"></stop>
                        <stop offset=".513" stop-color="#fcf0cd"></stop>
                        <stop offset=".778" stop-color="#fef4dc"></stop>
                        <stop offset="1" stop-color="#fff6e1"></stop>
                      </radialGradient>
                      <path fill="url(#SrYuS0MYDGH9m0SRC6_noa_Pvblw74eluzR_gr1)" d="M7.5,64L7.5,64c1.933,0,3.5-1.567,3.5-3.5l0,0c0-1.933-1.567-3.5-3.5-3.5l0,0 C5.567,57,4,58.567,4,60.5l0,0C4,62.433,5.567,64,7.5,64z"></path>
                      <radialGradient id="SrYuS0MYDGH9m0SRC6_nob_Pvblw74eluzR_gr2" cx="31.5" cy="-1096" r="31.751" gradientTransform="translate(0 1128)" gradientUnits="userSpaceOnUse">
                        <stop offset="0" stop-color="#f4e09d"></stop>
                        <stop offset=".226" stop-color="#f8e8b5"></stop>
                        <stop offset=".513" stop-color="#fcf0cd"></stop>
                        <stop offset=".778" stop-color="#fef4dc"></stop>
                        <stop offset="1" stop-color="#fff6e1"></stop>
                      </radialGradient>
                      <path fill="url(#SrYuS0MYDGH9m0SRC6_nob_Pvblw74eluzR_gr2)" d="M62,20.5L62,20.5c0-2.485-2.015-4.5-4.5-4.5H49c-2.209,0-4-1.791-4-4l0,0 c0-2.209,1.791-4,4-4h2c2.209,0,4-1.791,4-4l0,0c0-2.209-1.791-4-4-4H20c-2.209,0-4,1.791-4,4l0,0c0,2.209,1.791,4,4,4h2 c1.657,0,3,1.343,3,3l0,0c0,1.657-1.343,3-3,3H7.5C5.567,14,4,15.567,4,17.5l0,0C4,19.433,5.567,21,7.5,21H9c1.657,0,3,1.343,3,3 l0,0c0,1.657-1.343,3-3,3H5c-2.761,0-5,2.239-5,5l0,0c0,2.761,2.239,5,5,5h2.5c1.933,0,3.5,1.567,3.5,3.5l0,0 c0,1.933-1.567,3.5-3.5,3.5H6c-2.209,0-4,1.791-4,4l0,0c0,2.209,1.791,4,4,4h11.5c1.381,0,2.5,1.119,2.5,2.5l0,0 c0,1.381-1.119,2.5-2.5,2.5l0,0c-1.933,0-3.5,1.567-3.5,3.5l0,0c0,1.933,1.567,3.5,3.5,3.5h35c1.933,0,3.5-1.567,3.5-3.5l0,0 c0-1.933-1.567-3.5-3.5-3.5H52c-1.105,0-7-0.895-7-2l0,0c0-1.105,0.895-2,2-2h12c2.209,0,4-1.791,4-4l0,0c0-2.209-1.791-4-4-4h-2.5 c-1.381,0-2.5-1.119-2.5-2.5l0,0c0-1.381,1.119-2.5,2.5-2.5H57c2.209,0,4-1.791,4-4l0,0c0-2.209-1.791-4-4-4h-4.5 c-1.933,0-3.5-1.567-3.5-3.5l0,0c0-1.933,1.567-3.5,3.5-3.5h5C59.985,25,62,22.985,62,20.5z"></path>
                      <g>
                        <linearGradient id="SrYuS0MYDGH9m0SRC6_noc_Pvblw74eluzR_gr3" x1="32" x2="32" y1="53" y2="8" gradientTransform="matrix(1 0 0 -1 0 64)" gradientUnits="userSpaceOnUse">
                          <stop offset="0" stop-color="#def9ff"></stop>
                          <stop offset=".282" stop-color="#cff6ff"></stop>
                          <stop offset=".823" stop-color="#a7efff"></stop>
                          <stop offset="1" stop-color="#99ecff"></stop>
                        </linearGradient>
                        <path fill="url(#SrYuS0MYDGH9m0SRC6_noc_Pvblw74eluzR_gr3)" d="M15.211,11h33.578c3.024,0,5.356,2.663,4.956,5.661l-4.667,35 C48.747,54.145,46.628,56,44.122,56H19.878c-2.506,0-4.625-1.855-4.956-4.339l-4.667-35C9.855,13.663,12.187,11,15.211,11z"></path>
                        <linearGradient id="SrYuS0MYDGH9m0SRC6_nod_Pvblw74eluzR_gr4" x1="32" x2="32" y1="46" y2="56" gradientTransform="matrix(1 0 0 -1 0 64)" gradientUnits="userSpaceOnUse">
                          <stop offset="0" stop-color="#41bfec"></stop>
                          <stop offset=".232" stop-color="#4cc5ef"></stop>
                          <stop offset=".644" stop-color="#6bd4f6"></stop>
                          <stop offset="1" stop-color="#8ae4fd"></stop>
                        </linearGradient>
                        <path fill="url(#SrYuS0MYDGH9m0SRC6_nod_Pvblw74eluzR_gr4)" d="M53,18H11c-1.105,0-2-0.895-2-2v-6c0-1.105,0.895-2,2-2h42c1.105,0,2,0.895,2,2v6 C55,17.105,54.105,18,53,18z"></path>
                      </g>
                      <g>
                        <linearGradient id="SrYuS0MYDGH9m0SRC6_noe_Pvblw74eluzR_gr5" x1="52" x2="52" y1="-1064" y2="-1088" gradientTransform="translate(0 1128)" gradientUnits="userSpaceOnUse">
                          <stop offset="0" stop-color="#ff5840"></stop>
                          <stop offset=".007" stop-color="#ff5840"></stop>
                          <stop offset=".989" stop-color="#fa528c"></stop>
                          <stop offset="1" stop-color="#fa528c"></stop>
                        </linearGradient>
                        <path fill="url(#SrYuS0MYDGH9m0SRC6_noe_Pvblw74eluzR_gr5)" d="M52,40c-6.627,0-12,5.373-12,12s5.373,12,12,12s12-5.373,12-12S58.627,40,52,40z"></path>
                        <path fill="#fff" d="M57.417,49.412l-8.005,8.005c-0.778,0.778-2.051,0.778-2.828,0l0,0 c-0.778-0.778-0.778-2.051,0-2.828l8.005-8.005c0.778-0.778,2.051-0.778,2.828,0l0,0C58.194,47.361,58.194,48.634,57.417,49.412z"></path>
                        <path fill="#fff" d="M46.583,49.412l8.005,8.005c0.778,0.778,2.051,0.778,2.828,0l0,0c0.778-0.778,0.778-2.051,0-2.828 l-8.005-8.005c-0.778-0.778-2.051-0.778-2.828,0l0,0C45.806,47.361,45.806,48.634,46.583,49.412z"></path>
                      </g>
                    </svg>
                  </form>
                  @endcan
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </section>
  <script>
    document.querySelectorAll('.deleteButton').forEach(function(button) {
      button.addEventListener('click', function() {
        button.closest('form.deleteForm').submit();
      });
    });
  </script>
</body>


</html>