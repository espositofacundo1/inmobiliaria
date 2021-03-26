<x-app-layout>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 bg-gray-300 ">

  <form action="{{route('posts.store')}}" method="POST">

    @csrf

  <div class="hidden sm:block" aria-hidden="true">
    <div class="py-5">
      <div class="border-t border-gray-200"></div>
    </div>
  </div>
  
  <div class="mt-10 sm:mt-0">
    <div class="md:grid md:grid-cols-3 md:gap-6">
      <div class="md:col-span-1">
        <div class="px-4 sm:px-0">
          <h3 class="text-lg font-medium leading-6 text-gray-900"><strong>Step 1:</strong> Datos iniciales</h3>
          <p class="mt-1 text-sm text-gray-600">
            Tipo de propuesta, condicion fiscal, dirección y fecha.
          </p>
        </div>
      </div>
      <div class="mt-5 md:mt-0 md:col-span-2">
        <form action="#" method="POST">
          <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-gray-50 sm:p-6">


              <div class="grid grid-cols-6 gap-6">



                <div class="col-span-6 sm:col-span-6">
                    <label for="escalonado" class="block text-sm font-medium text-gray-700">Escalonado / Indexado</label>
                    <select id="escalonado" name="escalonado" autocomplete="Escalonado" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                      <option>Escalonado</option>
                      <option>Indexado</option>
                    </select>
                </div>
            




                <div class="col-span-6 sm:col-span-3">
                    <label for="condicionfiscal" class="block text-sm font-medium text-gray-700">¿El locador es Responsble Inscripto?</label>
                    <select id="condicionfiscal" name="condicionfiscal" autocomplete="condicionfiscal" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                      <option>Si</option>
                      <option>No</option>
                    </select>
                  </div>
  
                <div class="col-span-6 sm:col-span-3">

                    <label for="rubro" class="block text-sm font-medium text-gray-700">Rubro</label>
                    <input type="text" name="rubro" id="rubro"   value="{{old('rubro')}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" > 
                    @error('rubro')
                    <small>*{{$message}}</small>   
                    @enderror      

                </div>



                
                
                <div class="col-span-6">
                  <label for="direccion" class="block text-sm font-medium text-gray-700">Direccion</label>
                  <input type="text" name="direccion" id="direccion" value="{{old('direccion')}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                
                  @error('direccion')
                    <small>*{{$message}}</small>   
                    @enderror  
                </div>
  
                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                  <label for="localidad" class="block text-sm font-medium text-gray-700">Localidad</label>
                  <input type="text" value="{{old('localidad')}}" name="localidad" id="localidad" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                
                  @error('localidad')
                    <small>*{{$message}}</small>   
                    @enderror  
                </div>
  
                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                  <label for="provincia" class="block text-sm font-medium text-gray-700">Provincia</label>
                  <input type="text" name="provincia" value="{{old('provincia')}}" id="provincia" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                
                  @error('provincia')
                    <small>*{{$message}}</small>   
                    @enderror  
                </div>
  
                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                  <label for="codigo_postal" class="block text-sm font-medium text-gray-700">Codigo postal</label>
                  <input type="text" name="codigo_postal" value="{{old('codigo_postal')}}" id="codigo_postal"  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                
                  @error('codigo_postal')
                    <small>*{{$message}}</small>   
                    @enderror  
                </div>


                <div class="col-span-6 sm:col-span-3">
                    <label for="fecha_de_creacion" class="block text-sm font-medium text-gray-700">Fecha de creacion del documento</label>
                    <input type="text" value="<?php $fechaActual = date('d-m-Y'); echo $fechaActual;?>" disabled name="fecha_de_creacion" id="fecha_de_creacion" autocomplete="date" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">                
                </div>
                
                <div class="col-span-6 sm:col-span-3">
                <label for="fecha_de_vencimiento" class="block text-sm font-medium text-gray-700">Fecha de vencimiento de reserva </label>
                <input type="text" value="<?php $fecha_actual = date("d-m-Y");echo date("d-m-Y",strtotime($fecha_actual."+ 7 days")); ?>"  name="fecha_de_vencimiento" id="fecha_de_vencimiento" autocomplete="date" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">                
                </div>
        
                <div class="col-span-6 sm:col-span-3">
                <label for="fecha_estimada_de_firma" class="block text-sm font-medium text-gray-700">Fecha estimativa de firma</label>
                <input type="date" value="{{old('fecha_estimada_de_firma')}}" name="fecha_estimada_de_firma" id="fecha_estimada_de_firma" autocomplete="date" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">                
               
                @error('fecha_estimada_de_firma')
                  <small>*{{$message}}</small>   
                @enderror  
                </div>
                
                <div class="col-span-6 sm:col-span-3">
                <label for="vigencia_de_contrato" class="block text-sm font-medium text-gray-700">Vigencia del contrato</label>
                <input type="date" name="vigencia_de_contrato" value="{{old('vigencia_de_contrato')}}" id="vigencia_de_contrato" autocomplete="date" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">                
                </div>

                <input type="hidden" value="1" name="category_id">


                
              </div>
            </div>
            <div class="px-4 py-3 bg-gray-800 text-right sm:px-6">
              <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Guardar
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  
  </form>
    </div>

    


    
</x-app-layout>





