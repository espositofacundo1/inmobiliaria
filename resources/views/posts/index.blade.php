<?php use App\Models\User;
use App\Models\Category;
?>
<x-app-layout>




    <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8 bg-gray-300 ">
        <br>

        <section>
            <header class="grid grid-cols-2">
                <div class="grid col-span-1">

                    <a href="{{ route('posts.create') }}">
                        <button
                            class="hover:bg-gray-700 hover:text-gray-200 h-10 flex  bg-gray-800 text-gray-200 text-sm px-4 py-2 rounded-md  ">
                            <svg class="group-hover:text-gray-600 text-green-400 mr-2 animate-pulse " width="12"
                                height="20" fill="currentColor">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6 5a1 1 0 011 1v3h3a1 1 0 110 2H7v3a1 1 0 11-2 0v-3H2a1 1 0 110-2h3V6a1 1 0 011-1z" />
                            </svg>
                            <h1 class="text-base tracking-widest">Nuevo!</h1>
                        </button>
                    </a>
                </div>


                <form action="{{ route('posts.index') }}" method="GET">
                  
                            <div clas="">
                                Vigencia : 
                                <input type="date"
                                    class="focus:border-gray-500 w-36 focus:ring-1 focus:ring-gray-500 focus:outline-none  text-sm text-black placeholder-gray-500 border border-blue-700 rounded-md py-2 px-1 "
                                    placeholder="dd/mm/aa" name="texto_vigencia_de_contrato"
                                    value="{{ $texto_vigencia_de_contrato }}" />
                            </div>
                
            </header>
            <br>



            <div class="flex flex-col py-3">

                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-800">

                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left font-medium text-gray-100 text-sm uppercase tracking-wider">
                                           
                                            <input
                                                class="focus:border-gray-500 focus:ring-1 focus:ring-gray-500 focus:outline-none  text-sm text-black placeholder-gray-500 border border-blue-700 rounded-md py-2 px-1 "
                                                placeholder="Direccion" name="texto" value="{{ $texto }}" />

                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left font-medium text-gray-100 text-sm uppercase tracking-wider">
                                            Tipo de escrito
                                            <br>

                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left  font-medium text-gray-100 text-sm uppercase tracking-wider">
                                       
                                            <input
                                                class="focus:border-gray-500 focus:ring-1 focus:ring-gray-500 focus:outline-none  text-sm text-black placeholder-gray-500 border border-blue-700 rounded-md py-2 px-1 "
                                                placeholder="Locatario" name="texto_locatario" value="{{ $texto_locatario }}" />

                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left  font-medium text-gray-100 text-sm uppercase tracking-wider">
                                            Locatario
                                        </th>
                                        <th scope="col" class="relative px-6 py-3">
                                            <div class="flex justify-center">
                                            <button type="submit"
                                                class="hover:bg-purple-500 hover:text-purple-800 h-10 flex bg-purple-900 text-purple-200 text-sm px-4 py-2 rounded-md  ">
                                                
                                                <svg width="20" height="20" fill="currentColor"
                                                    class=" animate-pulse">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
                                                </svg> 
                                                <span class="pl-2">Buscar</span>
                                            </button>
                                            </div>
                                            </form>
                                        </th>

                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">

                                    @foreach ($post as $posts)

                                        <tr class=" @if ($posts->category_id == 2) :
                                            bg-green-50 @endif ">

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ $posts->direccion }}
                                                        </div>
                                                        <div class="text-sm text-gray-500">
                                                            Creado por: {{ User::find($posts->user_id)->name }}<br>

                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">
                                                    {{ Category::find($posts->category_id)->name }}</div>
                                                <div class="text-sm text-gray-500">aca va un texto a eleccion</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">

                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                    {{ $posts->locatario }}
                                                </span>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">
                                                    falta hacer columna de locatario
                                                </span>

                                            </td>

                                            <td>
                                                <div class="flex justify-center">
                                                <a href="{{ route('posts.show', $posts) }}">
                                                
                                                    <button
                                                        class="bg-green-400 duration-500 ease-in-out hover:bg-green-200 rounded-md px-2 py-1  text-green-800 grid grid-cols-2">

                                                        <svg width="20" height="20" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                        class=" animate-pulse">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M.2 10a11 11 0 0 1 19.6 0A11 11 0 0 1 .2 10zm9.8 4a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm0-2a2 2 0 1 1 0-4 2 2 0 0 1 0 4z" />
                                                    </svg> 

                                                    <span>Ver</span>
                                                    </button>
                                                    </div>
                                                </a>
                                         

                                            </td>
                                        </tr>

                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

            <div class="pb-2">
                {{ $post->links() }}
            </div>

    </div>
</x-app-layout>
