<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 bg-gray-200 ">
                <br>
                <div class="bg-white shadow overflow-hidden sm:rounded-lg ">
                  <div class="px-4 py-3 sm:px-6 grid grid-cols-2 gap-4 ">
                    
                    <div class="">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                      Detalle Propuesta locacion
                    </h3>          
                   </div>
                 </div>
                  
                 
                 <div class="border-t border-gray-200">
                    <dl>
                      <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                          Direccion
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                          <h1>{{$post->direccion .", ".$post->localidad ."(".$post->codigo_postal."), " . $post->provincia."."}}</h1>
                        </dd>
                      </div>
                      <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                          Rubro
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                          {{$post->rubro}}
                        </dd>
                      </div>
                      <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                        vigencia de contrato:
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        Desde: {{$fecha_estimada_de_firma}} - Hasta: {{$post->vigencia_de_contrato}}
                        </dd>
                      </div>
                      <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                          Plazo
                        </dt>
                        <div>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{$post->cantidad_de_meses}} Meses.
                        </dd>
                        </div>
                      </div>
                      
          
                      <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                       
                        
                        <dd class="mt-1 text-sm text-gray-900">
                          @include('posts.alquileresvista')
                        </dd>
                    
                        
                      </div>
          
                      <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                          Detalle de pagos a la firma y Servicios 
                        </dt>
                        <div>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                          @include('posts.serviciosvista')
                        </dd>
                        </div>
                        <div>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                          @include('posts.a_pagar_a_la_firma_vista')
                        </dd>
                        </div>
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


        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
