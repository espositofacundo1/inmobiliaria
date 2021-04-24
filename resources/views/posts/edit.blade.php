<?php use Carbon\Carbon;



?>
<x-app-layout>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 bg-gray-300 ">

      <form action="{{route('posts.update',$post)}}" method="post">

        @csrf
    
        @method('put')


            <div class="hidden sm:block" aria-hidden="true">
                <div class="py-5">
                    <div class="border-t border-gray-200"></div>
                </div>
            </div>
            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">

                            <h3 class="text-lg font-medium leading-6 text-gray-900"><strong>Etapa 1: </strong>Cargar
                            </h3>
                            <p class="mt-1 text-sm text-gray-600">
                                Esta etapa es la que se engarga de generar las tablas de alquiler y calcula la vigencia
                                de contrato. Por lo tanto recomendamos no saltear esta etapa.

                            </p>
                        </div>

                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-gray-50 sm:p-6">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="cantidad_de_meses"
                                            class="block text-sm font-medium text-gray-700">Cantidad de meses</label>
                                        <input type="text" name="cantidad_de_meses" id="cantidad_de_meses"
                                        value="{{old('cantidad_de_meses',$post->cantidad_de_meses)}}"  
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="fecha_estimada_de_firma"
                                            class="block text-sm font-medium text-gray-700">Fecha estimativa de
                                            firma</label>
                                        <input type="date" value="{{old('fecha_estimada_de_firma',$post->fecha_estimada_de_firma)}}"
                                            name="fecha_estimada_de_firma" id="fecha_estimada_de_firma"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">

                                        @error('fecha_estimada_de_firma')
                                            <small>*{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="vigencia_de_contrato"
                                            class="block text-sm font-medium text-gray-700">Vigencia de contrato</label>
                                        <input type="date" value="{{old('vigencia_de_contrato',$post->vigencia_de_contrato)}}"
                                            name="vigencia_de_contrato"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">

                                        @error('fecha_estimada_de_firma')
                                            <small>*{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>



                <div class="hidden sm:block" aria-hidden="true">
                    <div class="py-5">
                        <div class="border-t border-gray-200"></div>
                    </div>
                </div>

              



            <div class="hidden sm:block" aria-hidden="true">
                <div class="py-5">
                    <div class="border-t border-gray-200"></div>
                </div>
            </div>

            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900"><strong>Etapa 2: </strong>Datos
                                iniciales</h3>
                            <p class="mt-1 text-sm text-gray-600 py-4">
                                Tipo de propuesta, condicion fiscal, dirección y fecha.
                                Por defecto se genera fecha de vencimiento de reserva y se le suman 7 dias, este campo
                                se puede editar. El campo vigencia de contrato no se puede editar debido a que depende
                                de los campos completados anteriormente.
                            </p>
                        </div>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">

                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-gray-50 sm:p-6">

                                <div class="grid grid-cols-6 gap-6">

                                   
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="fecha_de_vencimiento"
                                            class="block text-sm font-medium text-gray-700">Fecha de vencimiento de
                                            reserva </label>
                                        <input type="text" value="{{old('fecha_de_vencimiento',$post->fecha_de_vencimiento)}}" name="fecha_de_vencimiento"
                                            id="fecha_de_vencimiento"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>


                                    <div class="col-span-6 sm:col-span-6">
                                      <label for="escalonado" class="block text-sm font-medium text-gray-700">Escalonado / Indexado</label>
                                      <select id="escalonado" name="escalonado" value="{{$post->escalonado}}"  class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option value="Escalonado" @if($post->escalonado == 'Escalonado' ) selected @endif >Escalonado</option>
                                        <option value="Indexado" @if($post->escalonado == 'Indexado' ) selected @endif>Indexado</option>
                                      </select>
                                    </div>




                                    <div class="col-span-6 sm:col-span-3">
                                      <label for="condicionfiscal" class="block text-sm font-medium text-gray-700">¿El locador es Responsble Inscripto?</label>
                                      <select id="condicionfiscal" name="condicionfiscal" value="{{$post->condicionfiscal}}"  class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option value="Si" @if($post->condicionfiscal == 'Si' ) selected @endif >Si</option>
                                        <option value="No" @if($post->condicionfiscal == 'No' ) selected @endif >No</option>
                                      </select>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">

                                        <label for="rubro" class="block text-sm font-medium text-gray-700">Rubro</label>
                                        <input type="text" name="rubro" id="rubro" value="{{old('rubro',$post->rubro)}}"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        @error('rubro')
                                            <small>*{{ $message }}</small>
                                        @enderror

                                    </div>


                                    <div class="col-span-6">
                                        <label for="direccion"
                                            class="block text-sm font-medium text-gray-700">Direccion</label>
                                        <input type="text" name="direccion" id="direccion"
                                        value="{{old('direccion',$post->direccion)}}"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">

                                        @error('direccion')
                                            <small>*{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                        <label for="localidad"
                                            class="block text-sm font-medium text-gray-700">Localidad</label>
                                        <input type="text" value="{{old('localidad',$post->localidad)}}" name="localidad"
                                            id="localidad"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">

                                        @error('localidad')
                                            <small>*{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                        <label for="provincia"
                                            class="block text-sm font-medium text-gray-700">Provincia</label>
                                        <input type="text" name="provincia" value="{{old('provincia',$post->provincia)}}"
                                            id="provincia"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">

                                        @error('provincia')
                                            <small>*{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                        <label for="codigo_postal"
                                            class="block text-sm font-medium text-gray-700">Codigo postal</label>
                                        <input type="text" name="codigo_postal" value="{{old('codigo_postal',$post->codigo_postal)}}"
                                            id="codigo_postal"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">

                                        @error('codigo_postal')
                                            <small>*{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="realizar" class="block text-sm font-medium text-gray-700">El
                                            oferente solicita al locador que realice: </label>
                                        <input type="text" name="realizar" value="{{old('realizar',$post->realizar)}}"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="autorizacion" class="block text-sm font-medium text-gray-700">El
                                            oferente solicita autorizacion para realizar: </label>
                                        <input type="text" name="autorizacion" value="{{old('autorizacion',$post->autorizacion)}}"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>


                                    <br>
                                    <div>

                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="hidden sm:block" aria-hidden="true">
                    <div class="py-5">
                        <div class="border-t border-gray-200"></div>
                    </div>
                </div>

                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">

                        <h3 class="text-lg font-medium leading-6 text-gray-900"><strong>Etapa 3: </strong>Completar
                            tablas</h3>
                        <p class="mt-1 text-sm text-gray-600 pb-3  ">
                            Aqui podras completar los alquileres y cuanto se factura. El sistema automaticamente calcula
                            el documento.
                        </p>
                    </div>

                </div>


                <div class="mt-5 md:mt-0 md:col-span-2 pb-6">
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="bg-gray-50 ">
                            <div class="grid grid-cols-3 gap-4 p-5">
                                <div class="pr-3">


                                    <table class="pr-3">
                                        <thead>
                                            <tr class="bg-gray-500 ">
                                                <th class="border border-gray-800">Meses</th>
                                                <th class="border border-gray-800 w-36">Alquiler</th>
                                                <th class="border border-gray-800 w-36">Facturacion</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @for ($i = 0; $i <= $q_row_meses +3 ; $i++)
                                            <?php if ($i<$q_row_meses) 
                                            { 
                                                $meses= $objeto[$i]->meses;
                                                $alquiler= $objeto[$i]->alquiler;
                                                $facturacion= $objeto[$i]->facturacion;
                                              
                                            }else {
                                                $meses=null;
                                                $alquiler=null;
                                                $facturacion=null;
                                            }    
                                            ?>
                                        

                                       
                                                <tr>
                                                    <td class="border border-gray-800 bg-gray-300"><input type="number"
                                                            name="{{ 'meses' . $i }}"  value="{{old('meses' . $i,$meses)}}" class="w-16 h-8 bg-gray-300">
                                                    </td>
                                                    <td class="border border-gray-800"><input
                                                            name="{{ 'alquiler' . $i }}" value="{{old('alquiler' . $i,$alquiler)}}" type="number"
                                                            class="w-36 h-8 text-center"></td>
                                                    <td class="border border-gray-800"><input
                                                            name="{{ 'facturacion' . $i }}" value="{{old('facturacion' . $i,$facturacion)}}" type="number"
                                                            class="w-36 h-8 text-center"></td>
                                                </tr>
                                            @endfor
                                        </tbody>
                                    </table>

                                </div>


                                <div class="pr-3 col-span-1 border-gray-700 border-l pl-2 ">
                                    <p>
                                        En esta etapa podes completar los servicios que debe abonar el locatario. En el
                                        caso de que no deba pagarlo simplemente podes dejarlo sin completar.<br><br>
                                        En el caso de que el locatario nesecite un medidor, puede tildar la opcion en la
                                        columna "debe solicitar" . <br><br>
                                        El los servicios "otros1","otros2" y "otros3" son editables para que puedas
                                        agregar los servicios que desees.
                                    </p>

                                </div>



                                <div class="col-span-3" aria-hidden="true">
                                    <div class="py-5">
                                        <div class="border-t border-gray-500"></div>
                                    </div>
                                </div>



                                <div class="pr-3 col-span-1 justify-self-center">


                                    <table class="pr-3">
                                        <thead>
                                            <tr class="bg-gray-500 ">
                                                <th class="border border-gray-800 w-44">Servicios</th>
                                                <th class="border border-gray-800 w-36">El locatario paga:</th>
                                                <th class="border border-gray-800 w-36">¿Debe solicitar?</th>
                                            </tr>
                                        </thead>


                                        <tbody>

                                            <tr>
                                                <td class="border border-gray-800"><input value="OSSE" disabled
                                                        class=" text-center"></td>
                                                <td class="border border-gray-800"><input name="osse" value="{{ old('osse') }}"
                                                        class="w-36 text-center"></td>
                                                <td class="border border-gray-800 ">
                                                    <div class="text-center"><input name="osse_solicitar"
                                                            type="checkbox"></div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="border border-gray-800"><input value="EDEA" disabled
                                                        class="text-center"></td>
                                                <td class="border border-gray-800"><input name="edea" value="{{ old('edea') }}"
                                                        class="w-36 text-center"></td>
                                                <td class="border border-gray-800 ">
                                                    <div class="text-center"><input name="edea_solicitar"
                                                            type="checkbox"></div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="border border-gray-800"><input value="GAS" disabled
                                                        class="text-center"></td>
                                                <td class="border border-gray-800"><input name="gas" value="{{ old('gas') }}"
                                                        class="w-36 text-center"></td>
                                                <td class="border border-gray-800 ">
                                                    <div class="text-center"><input name="gas_solicitar"
                                                            type="checkbox"></div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="border border-gray-800"><input value="TSU" disabled
                                                        class="text-center"></td>
                                                <td class="border border-gray-800"><input name="tsu" value="{{ old('tsu') }}"
                                                        class="w-36 text-center"></td>
                                                <td class="border border-gray-800 ">
                                                    <div class="text-center"><input name="tsu_solicitar"
                                                            type="checkbox"></div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="border border-gray-800"><input
                                                        value="Expensas extraordinarias" disabled class="text-center">
                                                </td>
                                                <td class="border border-gray-800"><input name="expensas_extra" value="{{ old('expensas_extra') }}"
                                                        class="w-36 text-center"></td>
                                                <td class="border border-gray-800 ">
                                                    <div class="text-center"><input name="expensas_extra_solicitar"
                                                            type="checkbox"></div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="border border-gray-800"><input value="Expensas ordinarias"
                                                        disabled class="text-center"></td>
                                                <td class="border border-gray-800"><input name="expensas_ord" value="{{ old('expensas_ord') }}"
                                                        class="w-36 text-center"></td>
                                                <td class="border border-gray-800 ">
                                                    <div class="text-center"><input name="expensas_ord_solicitar"
                                                            type="checkbox"></div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="border border-gray-800"><input value="arba" disabled
                                                        class="text-center"></td>
                                                <td class="border border-gray-800"><input name="arba" value="{{ old('arba') }}"
                                                        class="w-36 text-center"></td>
                                                <td class="border border-gray-800 ">
                                                    <div class="text-center"><input name="arba_solicitar"
                                                            type="checkbox"></div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="border border-gray-800"><input value="seguro" disabled
                                                        class="text-center"></td>
                                                <td class="border border-gray-800"><input name="seguro" value="{{ old('seguro') }}"
                                                        class="w-36 text-center"></td>
                                                <td class="border border-gray-800 ">
                                                    <div class="text-center"><input name="seguro_solicitar"
                                                            type="checkbox"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="border border-gray-800"><input value="{{ old('otros1_nombre', 'Otros 1') }}"
                                                        name="otros1_nombre" class="text-center"></td>
                                                <td class="border border-gray-800"><input name="otros1" value="{{ old('otros1') }}"
                                                        class="w-36 text-center"></td>
                                                <td class="border border-gray-800 ">
                                                    <div class="text-center"><input name="otros1_solicitar"
                                                            type="checkbox"></div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="border border-gray-800"><input value="{{ old('otros2_nombre', 'Otros 2') }}"
                                                        name="otros2_nombre" class="text-center"></td>
                                                <td class="border border-gray-800"><input name="otros2" value="{{ old('otros2') }}"
                                                        class="w-36 text-center"></td>
                                                <td class="border border-gray-800 ">
                                                    <div class="text-center"><input name="otros2_solicitar"
                                                            type="checkbox"></div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="border border-gray-800"><input value="{{ old('otros3_nombre', 'Otros 3') }}"
                                                        name="otros3_nombre" class="text-center"></td>
                                                <td class="border border-gray-800"><input name="otros3" value="{{ old('otros3') }}"
                                                        class="w-36 text-center"></td>
                                                <td class="border border-gray-800 ">
                                                    <div class="text-center"><input name="otros3_solicitar"
                                                            type="checkbox"></div>
                                                </td>
                                            </tr>



                                        </tbody>
                                    </table>

                                </div>

                                <div class="pr-3 col-span-1 justify-self-center border-gray-700 border-l pl-2">


                                    <table class="pr-3">
                                        <thead>
                                            <tr class="bg-gray-500 ">
                                                <th class="border border-gray-800 w-44"></th>
                                                <th class="border border-gray-800 w-36">A pagar a la firma</th>
                                            </tr>
                                        </thead>


                                        <tbody>

                                            <tr>
                                                <td class="border border-gray-800"><input value="Meses adelantados"
                                                        disabled class=" text-center"></td>
                                                <td class="border border-gray-800"><input name="adelanto" value="{{ old('adelanto') }}"
                                                        class="w-36 text-center"></td>
                                            </tr>

                                            <tr>
                                                <td class="border border-gray-800"><input value="Deposito en pesos"
                                                        disabled class=" text-center"></td>
                                                <td class="border border-gray-800"><input name="deposito_en_pesos" value="{{ old('deposito_en_pesos') }}"
                                                        value="" class="w-36 text-center"></td>
                                            </tr>

                                            <tr>
                                                <td class="border border-gray-800"><input value="Deposito en USD"
                                                        disabled class=" text-center"></td>
                                                <td class="border border-gray-800"><input name="deposito_en_usd" value="{{ old('deposito_en_usd') }}"
                                                        value="" class="w-36 text-center"></td>
                                            </tr>

                                            <tr>
                                                <td class="border border-gray-800"><input value="Informes" disabled
                                                        class=" text-center"></td>
                                                <td class="border border-gray-800"><input name="informes" value="{{ old('informes') }}"
                                                        class="w-36 text-center"></td>
                                            </tr>


                                        </tbody>
                                    </table>

                                </div>



                                <div class="pr-3 col-span-1 border-gray-700 border-l pl-2 ">
                                    <p>
                                        En esta etapa podes completar los servicios que debe abonar el locatario. En el
                                        caso de que no deba pagarlo simplemente podes dejarlo sin completar.<br><br>
                                        En el caso de que el locatario nesecite un medidor, puede tildar la opcion en la
                                        columna "debe solicitar" . <br><br>
                                        El los servicios "otros1","otros2" y "otros3" son editables para que puedas
                                        agregar los servicios que desees.
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="px-4 py-3 bg-gray-800 text-right sm:px-6">
                    <button type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Guardar
                    </button>
                </div>

            </div>
        </form>

</x-app-layout>






















<x-app-layout>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 bg-gray-300 ">

  <form action="{{route('posts.update',$post)}}" method="post">

    @csrf

    @method('put')

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
                    <select id="escalonado" name="escalonado" value="{{$post->escalonado}}" autocomplete="Escalonado" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                      <option value="Escalonado" @if($post->escalonado == 'Escalonado' ) selected @endif >Escalonado</option>
                      <option value="Indexado" @if($post->escalonado == 'Indexado' ) selected @endif>Indexado</option>
                    </select>
                </div>
            




                <div class="col-span-6 sm:col-span-3">
                    <label for="condicionfiscal" class="block text-sm font-medium text-gray-700">¿El locador es Responsble Inscripto?</label>
                    <select id="condicionfiscal" name="condicionfiscal" value="{{$post->condicionfiscal}}" autocomplete="condicionfiscal" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                      <option value="Si" @if($post->condicionfiscal == 'Si' ) selected @endif >Si</option>
                      <option value="No" @if($post->condicionfiscal == 'No' ) selected @endif >No</option>
                    </select>
                  </div>
  
                <div class="col-span-6 sm:col-span-3">

                    <label for="rubro" class="block text-sm font-medium text-gray-700">Rubro</label>
                  <input type="text" name="rubro" id="rubro" value="{{old('rubro',$post->rubro)}}" autocomplete="rubro" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">                
                 
                  @error('rubro')
                    <small>*{{$message}}</small>   
                    @enderror   

                </div>
 
                
                <div class="col-span-6">
                  <label for="direccion" class="block text-sm font-medium text-gray-700">Direccion</label>
                  <input type="text" name="direccion" id="direccion" value="{{old('direccion',$post->direccion)}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  @error('direccion')
                  <small>*{{$message}}</small>   
                  @enderror 
                </div>
  
                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                  <label for="localidad" class="block text-sm font-medium text-gray-700">Localidad</label>
                  <input type="text" name="localidad" id="localidad" value="{{old('localidad',$post->localidad)}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  @error('localidad')
                  <small>*{{$message}}</small>   
                  @enderror   
                
                </div>
  
                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                  <label for="provincia" class="block text-sm font-medium text-gray-700">Provincia</label>
                  <input type="text" name="provincia" id="provincia" value="{{old('provincia',$post->provincia)}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  @error('provincia')
                  <small>*{{$message}}</small>   
                  @enderror   
                </div>
  
                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                  <label for="codigo_postal" class="block text-sm font-medium text-gray-700">Codigo postal</label>
                  <input type="text" name="codigo_postal" id="codigo_postal" value="{{old('codigo_postal',$post->codigo_postal)}}"  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  @error('codigo_postal')
                  <small>*{{$message}}</small>   
                  @enderror   
                </div>
  
                
                
                
                <div class="col-span-6 sm:col-span-3">
                <label for="fecha_estimada_de_firma" class="block text-sm font-medium text-gray-700">Fecha estimativa de firma</label>
                <input type="date"  name="fecha_estimada_de_firma" value="{{old('fecha_estimada_de_firma',$post->fecha_estimada_de_firma)}}" id="fecha_estimada_de_firma" autocomplete="date" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">                
                @error('fecha_estimada_de_firma')
                <small>*{{$message}}</small>   
                @enderror     
                </div>
                
                <div class="col-span-6 sm:col-span-3">
                <label for="vigencia_de_contrato" class="block text-sm font-medium text-gray-700">Vigencia del contrato</label>
                <input type="date" name="vigencia_de_contrato" id="vigencia_de_contrato" autocomplete="date" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">                
                @error('vigencia_de_contrato')
                    <small>*{{$message}}</small>   
                    @enderror   
                </div>

                <input type="hidden" value="1" name="category_id">


                
              </div>
            </div>
            <div class="px-4 py-3 bg-gray-800 text-right sm:px-6">
              <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Actualizar
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






