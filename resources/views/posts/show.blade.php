<?php use App\Models\Category;
use App\Models\User;
?>
<x-app-layout>


    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 bg-gray-200 ">
        <br>
        <div class="bg-white shadow overflow-hidden sm:rounded-lg ">
            <div class="px-4 py-3 sm:px-6 grid grid-cols-3 gap-4">

                <div class="col-span-2">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        {{ Category::find($post->category_id)->name }}
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Creado por {{ User::find($post->user_id)->name }} a las: {{ $creado }}<br>
                        Ultima actualizacion: {{ $actualizado }}

                    </p>

                    <br>
                    <a href="{{ route('posts.detalle_propuesta', $post) }}">
                        <button
                            class="bg-blue-800 duration-500 ease-in-out hover:bg-blue-900 rounded-md w-24 px-4 py-1 mr-1 text-blue-200 ">Imprimir
                        </button>
                    </a>

                    <a href="{{ route('posts.createreserva', $post) }}">
                        <button
                            class="bg-blue-800 duration-500 ease-in-out hover:bg-blue-900 rounded-md w-24 px-4 py-1 mr-1 text-blue-200 ">Reserva
                        </button>
                    </a>

                </div>

                <div class="col-span-1 justify-self-end">

                    <div class="pl-6 pb-3 ">
                        <a href="{{ route('posts.edit', $post) }}">
                            <button
                                class="bg-green-400 duration-500 ease-in-out hover:bg-green-200 rounded-md w-20 px-4 py-1 mr-1 text-green-800 ">Editar
                            </button>
                        </a>
                    </div>
                    <div class="pl-6">
                        <form action="{{ route('posts.destroy', $post) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit"
                                class="bg-red-400 duration-500 ease-in-out  hover:bg-red-200 rounded-md w-20 px-4 py-1 mr-1 text-red-800 ">Eliminar
                            </button>
                        </form>
                        </a>
                    </div>

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
                        <h1>{{ $post->direccion . ', ' . $post->localidad . '(' . $post->codigo_postal . '), ' . $post->provincia . '.' }}
                        </h1>
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Rubro
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $post->rubro }}
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Fechas:
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        Fecha estimada de firma: {{ $fecha_estimada_de_firma }} | Duracion:
                        {{ $post->cantidad_de_meses }} meses | vigencia de contrato: {{ $vigencia_de_contrato }}
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        El oferente solicita al locador que realice:
                    </dt>
                    <div>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $post->realizar }}
                        </dd>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        El oferente solicita autorizacion para realizar:
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $post->autorizacion }}
                    </dd>
                </div>
            </dl>
        </div>
    </div>



    <br>



    <div class="bg-white shadow overflow-hidden sm:rounded-lg ">
        <div class="px-2 py-3 sm:px-6 grid grid-cols-2 gap-4 ">

            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Tablas de Alquiler, servicios y pagos.
            </h3>
            <br> <br>

        </div>


        <div class="border-t border-gray-200">
            <dl>

                <div class=" to-gray-900 bg-gray-100 py-5">

                    @include('posts.alquileresvista')


                </div>


        </div>

        </dl>
    </div>
    </div>





    <div class="py-2 grid justify-items-end">
        <a href="{{ route('posts.index') }}">
            <button
                class="bg-gray-800 duration-500 ease-in-out hover:bg-gray-400 rounded-md w-20 px-4 py-1 mr-1 text-gray-200 ">
                volver
            </button>
        </a>
    </div>

    </div>





</x-app-layout>
