
<x-app-layout>
    <div style="width: 900px;"class="max-w-full mx-auto mt-10 px-4 py-8 text-gray-500">
        <div class="flex justify-between">
            <h1 class="text-xl uppercase text-gray-500">Tasks</h1>
            <a href="{{route('tasks.create')}}" class="flex items-center bg-gray-200 px-2 py-1 rounded hover:bg-gray-100 border-b-4 border-gray-400">
                <svg 
                    class="w-6 inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"              stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                <span>New Task</span>
            </a>
        </div>
        @include('partials.notifications')
        @foreach($tasks as $task)
        <div class="pb-4 pt-2 px-2 mt-4 mb-2 border-b-4 border-gray-400 bg-gray-200 shadow-md hover:shadow-xl rounded-md">
            <div class="flex justify-between items-center py-2">
                <form class="flex items-center gap-2" method="POST" action="{{route('mark')}}">
                    @csrf  
                    <input class="bg-gray-400 text-green-500" type="checkbox" name="id" value="{{$task->id}}" onClick="this.form.submit()" {{$task->task_status ? 'checked' : ''}}>
                    <h1 class="text-lg text-gray-600">{{$task->task_name}}</h1>
                    <input type="hidden" name="id" value="{{$task->id}}" />
                </form>
     
                    <button onclick="toggleModal('modal-id')" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                        width="32" height="32"
                        viewBox="0 0 64 64"
                        style=" fill:#000000;"><path d="M 28 7 C 25.243 7 23 9.243 23 12 L 23 15 L 13 15 C 11.896 15 11 15.896 11 17 C 11 18.104 11.896 19 13 19 L 15.109375 19 L 16.792969 49.332031 C 16.970969 52.510031 19.600203 55 22.783203 55 L 41.216797 55 C 44.398797 55 47.029031 52.510031 47.207031 49.332031 L 48.890625 19 L 51 19 C 52.104 19 53 18.104 53 17 C 53 15.896 52.104 15 51 15 L 41 15 L 41 12 C 41 9.243 38.757 7 36 7 L 28 7 z M 28 11 L 36 11 C 36.552 11 37 11.449 37 12 L 37 15 L 27 15 L 27 12 C 27 11.449 27.448 11 28 11 z M 32 23.25 C 32.967 23.25 33.75 24.034 33.75 25 L 33.75 45 C 33.75 45.966 32.967 46.75 32 46.75 C 31.033 46.75 30.25 45.966 30.25 45 L 30.25 25 C 30.25 24.034 31.033 23.25 32 23.25 z M 40.007812 23.25 C 40.972813 23.284 41.728313 24.094547 41.695312 25.060547 L 40.998047 45.146484 C 40.965047 46.092484 40.190953 46.836937 39.251953 46.835938 C 39.230953 46.835938 39.210453 46.833984 39.189453 46.833984 C 38.224453 46.799984 37.468953 45.989438 37.501953 45.023438 L 38.197266 24.9375 C 38.231266 23.9725 39.039813 23.223 40.007812 23.25 z M 23.990234 23.251953 C 24.954234 23.228953 25.766781 23.973453 25.800781 24.939453 L 26.498047 45.025391 C 26.532047 45.991391 25.776547 46.801938 24.810547 46.835938 C 24.790547 46.835937 24.769047 46.835938 24.748047 46.835938 C 23.810047 46.835938 23.033 46.091484 23 45.146484 L 22.302734 25.060547 C 22.268734 24.094547 23.024234 23.285953 23.990234 23.251953 z"></path></svg>
                    </button>
            </div>
            <p>{{$task->task_details}}</p>
            <div class="mt-4 flex justify-left items-center gap-5">
                <a href="{{route('tasks.edit', $task->id)}}" class="hover:text-gray-400">
                    <svg class="w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </a>
                <a href="{{route('tasks.show', $task->id)}}" class="hover:text-gray-400">
                    <svg class="w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </a>
            </div>
        </div>
        
        <div class="mt-8 text-center">
            <a href="{{route('dashboard')}}">
                <svg class="w-8 inline hover:text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd" />
                </svg>
            </a>
        </div>
    </div>

    <section id="modal-start">
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
                        Are you sure to delete this task?
                      </p>
                    </div>
                    <!--footer-->
                    <div class="flex items-center justify-end p-6 border-t border-solid border-slate-200 rounded-b">
                      <button class="text-gray-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-id')">
                        Close
                      </button>

                      <form action="{{route('tasks.destroy', $task->id)}}" method="POST">
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
    @endforeach
</x-app-layout>
