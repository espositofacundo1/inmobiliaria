<?php use App\Models\Category;?>
<x-app-layout>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 bg-gray-200 ">
      <br>
      <div class="bg-white shadow overflow-hidden sm:rounded-lg ">
        <div class="px-4 py-3 sm:px-6 grid grid-cols-2 gap-4 ">
          
          <div class="">
          <h3 class="text-lg leading-6 font-medium text-gray-900">
            {{Category::find($post->category_id)->name}}
          </h3>
          <p class="mt-1 max-w-2xl text-sm text-gray-500">
            Aca podria ir un texto
          </p>
          </div>

          <div class="justify-self-end">

          <div class="pl-6 pb-3">
          <a href="{{route('posts.edit',$post)}}"  >
            <button class="bg-green-400 duration-500 ease-in-out hover:bg-green-200 rounded-md w-20 px-4 py-1 mr-1 text-green-800 ">Editar
            </button>
          </a>
          </div>
          <div class="pl-6">
            <form action="{{route('posts.destroy',$post)}}" method="POST">
              @csrf
              @method('delete')
              <button type="submit" class="bg-red-400 duration-500 ease-in-out  hover:bg-red-200 rounded-md w-20 px-4 py-1 mr-1 text-red-800 ">Eliminar
              </button>
            </form> 
          </a>
          </div>

          </div>


        </div>
        <div class="border-t border-gray-200">
          <dl>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">
                Direccion
              </dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <h1>{{$post->direccion}}</h1>
              </dd>
            </div>
            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">
                titulo_de_categoria
              </dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                Backend Developer
              </dd>
            </div>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">
                titulo_de_categoria
              </dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                margotfoster@example.com
              </dd>
            </div>
            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">
                titulo_de_categoria
              </dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                $120,000
              </dd>
            </div>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">
                titulo_de_categoria
              </dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                Fugiat ipsum ipsum deserunt culpa aute sint do nostrud anim incididunt cillum culpa consequat. Excepteur qui ipsum aliquip consequat sint. Sit id mollit nulla mollit nostrud in ea officia proident. Irure nostrud pariatur mollit ad adipisicing reprehenderit deserunt qui eu.
              </dd>
            </div>
          </dl>
        </div>
      </div>
        
      <div class="py-2 grid justify-items-end">
        <a href="{{route('posts.index')}}">
          <button class="bg-gray-800 duration-500 ease-in-out hover:bg-gray-400 rounded-md w-20 px-4 py-1 mr-1 text-gray-200 ">
          volver
        </button>
        </a>
        </div>

    </div>
    
 
    {{-- <div class="fixed inset-0 flex items-end justify-center px-4 py-6 pointer-events-none sm:p-6 sm:items-start sm:justify-end">
      <div class="max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto">
        <div class="rounded-lg shadow-xs overflow-hidden">
          <div class="p-4">
            <div class="flex items-start">
              <div class="flex-shrink-0">
                <svg class="h-6 w-6 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
              </div>
              <div class="ml-3 w-0 flex-1 pt-0.5">
                <p class="text-sm font-medium text-gray-900">
                  Successfully saved!
                </p>
                <p class="mt-1 text-sm text-gray-500">
                  Anyone with a link can now view this file.
                </p>
              </div>
              <div class="ml-4 flex-shrink-0 flex">
                <button class="inline-flex text-gray-400 focus:outline-none focus:text-gray-500 transition ease-in-out duration-150">
                  <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                  </svg>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> --}}
      


</x-app-layout>