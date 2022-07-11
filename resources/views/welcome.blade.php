<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dadiyu !! Task</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="icon" href="icon.png" type="image/x-icon">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">

    </head>
    <body class="antialiased ">

        <div class="">
            <div class="px-8 py-3 text-center md:flex justify-between items-center bg-gray-600  text-gray-300">
                <h1 class="md:mb-0 font-bold uppercase text-xl">Dadiyu Task</h1>
                {{-- <ul class="sm:mb-4 md:mb-0 md:flex gap-4">
                    <li class="cursor-pointer hover:underline">+250788877777</li>
                    <li class="md:border-2 border-red-500">  </li>
                    <li class="cursor-pointer hover:underline">alain@taskcatalyst.com</li>
                </ul> --}}
                @if (Route::has('login'))
                    <ul class="md:flex gap-4">
                        @auth
                            <li class="mt-4 mb-4 md:mt-0 md:mb-0"><a href="{{ url('/dashboard') }}" class="text-gray-900 bg-gray-200 py-1 px-4 rounded-lg hover:bg-gray-200 hover:text-gray-500 cursor-pointer focus:outline-none">Dashboard</a></li>
                        @else
                            <li class="mt-4 mb-4 md:mt-0 md:mb-0"><a href="{{ route('login') }}" class="text-gray-500 bg-gray-200 py-1 px-4 rounded-lg border-2 hover:bg-gray-600 hover:border-2 hover:border-gray-200 hover:text-gray-200 cursor-pointer focus:outline-none transition duration-300 ease-in-out">Log in</a></li>

                            @if (Route::has('register'))
                                <li><a href="{{ route('register') }}" class="text-gray-200 border-2 border-gray-100 py-1 px-4 rounded-lg hover:bg-gray-200 hover:text-gray-500 cursor-pointer focus:outline-none transition duration-300 ease-in-out">Register</a></li>
                            @endif
                        @endauth
                    </ul>
                @endif
            </div>
            
            <div class="grid lg:grid lg:grid-cols-3">
                <div class="lg:col-span-1 bg-violet-500 ">
                    <img class="object-cover lg:h-full lg:w-full opacity-75" src="landing-page.png" alt="">
                </div>
                <div class="lg:col-span-2 overflow-hidden bg-gray-200 ">
                    <div class="bg-gray-300 hover:bg-gray-200 transition duration-500 ease-in-out transform -skew-y-6">
                        <div class="transform skew-y-6 text-center py-16">
                            <h1 class="text-xl">Welcome to <span class="text-gray-700 text-xl font-bold uppercase">To Do List </span>by <span class="text-gray-700 text-xl font-bold uppercase">Dadiyu</span></h1>
                            <p class="italic mt-4 text-md">Be focused, organized and calm with Dadiyu, Add your tasks and Organize your life to Achieve the mental clarity you desire</p>
                        </div>
                    </div>
                    <div class="bg-gray-100 -mt-20 py-40 h-full text-center">
                        <div class="mb-20">
                            <h1 class="text-lg mb-2">Subscribe to receive productivity tips..</h1>
                            <div>
                                @if(session('subscribed')!== null)
                                    <p class="text-green-600 p-2 rounded mt-2">{{session('subscribed')}}</p>
                                @endif
                            </div>
                            <form action="{{route('welcome')}}" class="md:w-3/4 md:mx-auto bg-gray-300 py-4 shadow-xl rounded-lg" method="POST">
                                @error('email')
                                        <p class="text-base pb-4 text-red-400">{{$message}}</p>
                                @enderror
                                @csrf
                                <input class="w-1/2 rounded-lg py-1 px-4 bg-gray-100 border-t-0 border-l-0 border-r-0 border-b-2 border-gray-500 shadow-md " type="email" name="email" placeholder="Enter your email..">
                                <input class="font-semibold bg-gray-300 ml-2 border-2 border-gray-500 py-1 px-4 rounded-lg text-gray-900 hover:text-gray-200 hover:bg-gray-500 hover:border-gray-200 transition duration-500 ease-in-out cursor-pointer focus:outline-none shadow-md" type="submit" value="subscribe">
                            </form>
                        </div>
                        <div class="text-gray-700">
                            <p>Arrange your life to be more planned - Dadiyu Team</p>
                        </div>
                    </div>
                </div>
            </div>
            <x-footer/>
        </div>
        <section id="modal-template">

            {{-- <button class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-id')">
                Delete
              </button> --}}
              <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-id">
                <div class="relative w-auto my-6 mx-auto max-w-3xl">
                  <!--content-->
                  <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                    <!--header-->
                    <div class="flex items-start justify-between p-5 border-b border-solid border-slate-200 rounded-t">
                      <h3 class="text-3xl font-semibold">
                        Alert
                      </h3>
                      <button class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('modal-id')">
                        <span class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
                          ×
                        </span>
                      </button>
                    </div>
                    <!--body-->
                    <div class="relative p-6 flex-auto">
                      <p class="my-4 text-slate-500 text-lg leading-relaxed">
                        Are you sure to delete this?
                      </p>
                    </div>
                    <!--footer-->
                    <div class="flex items-center justify-end p-6 border-t border-solid border-slate-200 rounded-b">
                      <button class="text-gray-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-id')">
                        Close
                      </button>
                      <button class="bg-blue-400 text-white active:bg-blue-600 font-bold uppercase text-sm px-6 py-3 rounded shadow-md hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-id')">
                        Delete
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>
              <script type="text/javascript">
                function toggleModal(modalID){
                  document.getElementById(modalID).classList.toggle("hidden");
                  document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
                  document.getElementById(modalID).classList.toggle("flex");
                  document.getElementById(modalID + "-backdrop").classList.toggle("flex");
                }
              </script>

        </section>
        
        
    </body>
</html>

