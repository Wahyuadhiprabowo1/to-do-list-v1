<x-app-layout>
    <div style="width: 768px;"class="max-w-full mx-auto mt-10 px-4 py-8 text-gray-500">
        <h1 class="text-xl uppercase text-gray-500 mb-4">All Users</h1>
        @include('partials.notifications')
        <table class="w-full table-auto mt-4">
            <thead>
                <tr class="text-left bg-gray-600 text-white uppercase text-base">
                    <th class="px-2 py-2">Name</td>
                    <th class="px-2 py-2">Email</td>
                    <th class="px-2 py-2">Role</th>
                    <th class="px-2 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="bg-gray-200 hover:bg-gray-100">
                    <td class="px-2 py-4">{{$user->name}}</td>
                    <td class="px-2 py-4">{{$user->email}}</td>
                    <td class="px-2 py-4">{{implode(', ', $user->roles()->get()->pluck('name')->toArray())}}</td>
                    <td class="px-2 py-4 text-white">
                        @if($user->id !== Auth::user()->id)
                            <a href="{{route('admin.users.edit', $user)}}" class="px-2 py-1 bg-gray-400 rounded-md">Edit Role</a>
                            
                            <button class="px-4 py-1 bg-red-400 rounded-md" type="button" onclick="toggleModal('modal-id')">Delete</button>
                            
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-8 text-center">
            <a href="{{route('dashboard')}}">
                <svg class="w-8 inline hover:text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd" />
                </svg>
            </a>
        </div>
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
                  <h5 class="text-3xl font-semibold">
                    Alert
                  </h5>
                  <button class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('modal-id')">
                    <span class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
                      ×
                    </span>
                  </button>
                </div>
                <!--body-->
                <div class="relative p-6 flex-auto">
                  <p class="my-4 text-slate-500 text-lg leading-relaxed">
                    Are you sure to delete this user?
                  </p>
                </div>
                <!--footer-->
                <div class="flex items-center justify-end p-6 border-t border-solid border-slate-200 rounded-b">
                  <button class="text-gray-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-id')">
                    Close
                  </button>
                  <form action="{{route('admin.users.destroy', $user)}}" method="POST" class="inline" id>
                    @csrf 
                    @method('DELETE')
                    <button class="bg-gray-500 text-white hover:bg-gray-700 font-bold uppercase text-sm px-6 py-3 rounded shadow-md hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="submit" onclick="toggleModal('modal-id')">
                        Delete
                      </button>
                  </form>

               
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
</x-app-layout>
