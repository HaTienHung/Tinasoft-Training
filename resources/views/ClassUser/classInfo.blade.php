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
      <a href="{{route('class_list')}}" class=" text-white bg-primary-600 hover:bg-primary-700 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 absolute left-2 top-2 shadow-md">Back</a>
      <div class="bg-white px-8 py-8 rounded-lg shadow-lg sm:max-w-5xl">
        <h1 class="text-2xl font-bold mb-4 text-primary-600 uppercase">Class Roste</h1>
        <table class="table-auto">
          <thead class="font-bold text-lg">
            <tr>
              <td class="px-4 py-2">ID</td>
              <td class="px-4 py-2">Name</td>
              <td class="px-4 py-2">Email</td>
              <td class="px-4 py-2">Phone</td>
              @can('add-user-list')
              <td class="px-4 py-2">Actions</td>
              @endcan
            </tr>
          </thead>
          <tbody>
            @foreach($enrolledUsers as $user)
            <tr>
              <td class="px-4 py-2">{{$user->id}}</td>
              <td class="px-4 py-2 flex items-center">
                <img src="{{ asset('storage/' . $user->avatar) }}" class="w-8 h-8 mr-2 object-cover rounded-full" alt="Avatar">
                {{$user->name}}
              </td>
              <td class="px-4 py-2">{{$user->email}}</td>
              <td class="px-4 py-2">{{$user->phone_number}}</td>
              <td class="px-4 py-2">
                <div class="flex justify-between items-center">
                  @can('add-user-list')
                  <a href="{{route('edit_user',['user'=>$user])}}">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="64" height="64" viewBox="0 0 64 64" class="w-6 h-6 cursor-pointer">
                      <radialGradient id="XxuzckEKxQAhu215VR7vra_118958_gr1" cx="36" cy="32" r="26.875" gradientUnits="userSpaceOnUse" spreadMethod="reflect">
                        <stop offset="0" stop-color="#afeeff"></stop>
                        <stop offset=".193" stop-color="#bbf1ff"></stop>
                        <stop offset=".703" stop-color="#d7f8ff"></stop>
                        <stop offset="1" stop-color="#e1faff"></stop>
                      </radialGradient>
                      <path fill="url(#XxuzckEKxQAhu215VR7vra_118958_gr1)" d="M5.5,61L5.5,61C3.015,61,1,58.985,1,56.5v0C1,54.015,3.015,52,5.5,52h0 c2.485,0,4.5,2.015,4.5,4.5v0C10,58.985,7.985,61,5.5,61z"></path>
                      <radialGradient id="XxuzckEKxQAhu215VR7vrb_118958_gr2" cx="32" cy="31.5" r="30.775" gradientUnits="userSpaceOnUse" spreadMethod="reflect">
                        <stop offset="0" stop-color="#afeeff"></stop>
                        <stop offset=".193" stop-color="#bbf1ff"></stop>
                        <stop offset=".703" stop-color="#d7f8ff"></stop>
                        <stop offset="1" stop-color="#e1faff"></stop>
                      </radialGradient>
                      <path fill="url(#XxuzckEKxQAhu215VR7vrb_118958_gr2)" d="M64,24L64,24c0-2.761-2.239-5-5-5h-5c-2.761,0-5-2.238-5-5v0c0-2.762,2.238-5,5-5h0.565 C56.48,9,58,7.48,58,5.605L58,5.5C58,3.567,56.433,2,54.5,2l-38,0c-1.926,0-3.49,1.556-3.5,3.483L13,5.5 C12.99,7.43,14.552,9,16.483,9H17c2.209,0,4,1.791,4,4v0c0,2.209-1.791,4-4,4H5c-2.761,0-5,2.239-5,5v0c0,2.761,2.239,5,5,5h1 c2.209,0,4,1.791,4,4v0c0,2.209-1.791,4-4,4H5.5C2.462,35,0,37.462,0,40.5v0C0,43.538,2.462,46,5.5,46H19c1.657,0,3,1.343,3,3v0 c0,1.657-1.343,3-3,3h-1.5c-2.485,0-4.5,2.015-4.5,4.5v0c0,2.485,2.015,4.5,4.5,4.5H33h22c2.209,0,4-1.791,4-4v0 c0-2.209-1.791-4-4-4h-6.5c-1.933,0-3.5-1.567-3.5-3.5v0c0-1.933,1.567-3.5,3.5-3.5H60c2.209,0,4-1.791,4-4v0c0-2.209-1.791-4-4-4 h-1.5c-2.485,0-4.5-2.015-4.5-4.5v0c0-2.485,2.015-4.5,4.5-4.5H59C61.761,29,64,26.761,64,24z"></path>
                      <linearGradient id="XxuzckEKxQAhu215VR7vrc_118958_gr3" x1="10.098" x2="10.098" y1="50.804" y2="57" gradientUnits="userSpaceOnUse" spreadMethod="reflect">
                        <stop offset="0" stop-color="#a4a4a4"></stop>
                        <stop offset=".63" stop-color="#7f7f7f"></stop>
                        <stop offset="1" stop-color="#6f6f6f"></stop>
                        <stop offset="1" stop-color="#6f6f6f"></stop>
                      </linearGradient>
                      <path fill="url(#XxuzckEKxQAhu215VR7vrc_118958_gr3)" d="M8.02,50.804l-1,5c-0.065,0.328,0.037,0.667,0.273,0.903C7.482,56.896,7.737,57,8,57 c0.065,0,0.131-0.007,0.196-0.02l5-1L8.02,50.804z"></path>
                      <linearGradient id="XxuzckEKxQAhu215VR7vrd_118958_gr4" x1="28.5" x2="28.5" y1="55" y2="16" gradientUnits="userSpaceOnUse" spreadMethod="reflect">
                        <stop offset="0" stop-color="#ff8b67"></stop>
                        <stop offset=".847" stop-color="#ffa76a"></stop>
                        <stop offset="1" stop-color="#ffad6b"></stop>
                        <stop offset="1" stop-color="#ffad6b"></stop>
                      </linearGradient>
                      <path fill="url(#XxuzckEKxQAhu215VR7vrd_118958_gr4)" d="M47.707,28.293l-12-12c-0.391-0.391-1.023-0.391-1.414,0l-25,25 c-0.391,0.391-0.391,1.023,0,1.414l12,12C21.488,54.902,21.744,55,22,55s0.512-0.098,0.707-0.293l25-25 C48.098,29.316,48.098,28.684,47.707,28.293z"></path>
                      <linearGradient id="XxuzckEKxQAhu215VR7vre_118958_gr5" x1="15.5" x2="15.5" y1="56" y2="41.001" gradientUnits="userSpaceOnUse" spreadMethod="reflect">
                        <stop offset="0" stop-color="#ffc662"></stop>
                        <stop offset=".004" stop-color="#ffc662"></stop>
                        <stop offset=".609" stop-color="#ffc582"></stop>
                        <stop offset="1" stop-color="#ffc491"></stop>
                        <stop offset="1" stop-color="#ffc491"></stop>
                      </linearGradient>
                      <path fill="url(#XxuzckEKxQAhu215VR7vre_118958_gr5)" d="M21.986,47.836C21.906,47.354,21.489,47,21,47h-4v-4c0-0.489-0.354-0.906-0.836-0.986l-6-1 c-0.271-0.043-0.548,0.023-0.768,0.188c-0.219,0.166-0.36,0.414-0.391,0.688l-1,9c-0.033,0.302,0.072,0.603,0.287,0.817l4,4 C12.481,55.896,12.736,56,13,56c0.037,0,0.073-0.002,0.11-0.006l9-1c0.273-0.03,0.521-0.172,0.688-0.391 c0.165-0.22,0.233-0.497,0.188-0.768L21.986,47.836z"></path>
                      <linearGradient id="XxuzckEKxQAhu215VR7vrf_118958_gr6" x1="49.736" x2="49.736" y1="23.5" y2="5.028" gradientUnits="userSpaceOnUse" spreadMethod="reflect">
                        <stop offset="0" stop-color="#ff634d"></stop>
                        <stop offset=".204" stop-color="#fe6464"></stop>
                        <stop offset=".521" stop-color="#fc6581"></stop>
                        <stop offset=".794" stop-color="#fa6694"></stop>
                        <stop offset=".989" stop-color="#fa669a"></stop>
                        <stop offset="1" stop-color="#fa669a"></stop>
                      </linearGradient>
                      <path fill="url(#XxuzckEKxQAhu215VR7vrf_118958_gr6)" d="M57.603,13.188l-6.791-6.791c-1.826-1.826-4.797-1.826-6.623,0l-3.396,3.396 c-0.391,0.391-0.391,1.023,0,1.414l12,12c0.195,0.195,0.451,0.293,0.707,0.293s0.512-0.098,0.707-0.293l3.396-3.396 C59.429,17.985,59.429,15.015,57.603,13.188z"></path>
                      <linearGradient id="XxuzckEKxQAhu215VR7vrg_118958_gr7" x1="44" x2="44" y1="9.026" y2="30.974" gradientUnits="userSpaceOnUse" spreadMethod="reflect">
                        <stop offset="0" stop-color="#b2b2b2"></stop>
                        <stop offset=".594" stop-color="#949494"></stop>
                        <stop offset="1" stop-color="#848484"></stop>
                        <stop offset="1" stop-color="#848484"></stop>
                      </linearGradient>
                      <path fill="url(#XxuzckEKxQAhu215VR7vrg_118958_gr7)" d="M53.957,21.543l-11.5-11.5c-1.355-1.355-3.559-1.355-4.914,0l-3.5,3.5 c-1.354,1.354-1.354,3.56,0,4.914l11.5,11.5c0.678,0.678,1.567,1.017,2.457,1.017s1.779-0.339,2.457-1.017l3.5-3.5 C55.312,25.103,55.312,22.897,53.957,21.543z"></path>
                    </svg>
                  </a>
                  <form action="{{route('delete_class_user',['user_id'=>$user->id,'class_id'=>$class_id])}}" method="POST" class="deleteForm">
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