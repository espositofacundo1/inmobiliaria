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
                            <h3 class="text-lg font-medium leading-6 text-gray-900"><strong>Confeccion de
                                    Reserva:</strong></h3>
                            <p class="mt-1 text-sm text-gray-600 py-4">
                                -los <strong>metodos de pago</strong> que deberan coincidir con el deposito cargado previamente en la etapa de Propuesta de alquiler
                                .En el caso que desees cambiar el monto del depocito tendras que ir a ver->editar->actualizar.<br><br>

                                -<strong>Oferete y locatario:</strong> Se concidera oferente a la persona que solicita la propuesta de alquiler mientras el locatario es el 
                                que sera legalmente el responsable. En el caso de que el oferente y locatario coincidan <strong>puedes dejar vacia la casilla de locatario</strong>, el 
                                sistema reconocera que en ese caso los dos son la misma persona.
                            </p>
                        </div>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">

                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-gray-50 sm:p-6">

                                <div class="grid grid-cols-6 gap-6">

                                    <div class="col-span-6 sm:col-span-6 ">
                                        <label class="block  text-base text-gray-700"><strong>Monto a entregar para la
                                                reserva:</strong> </label>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3 border-r ">


                                        <div class="grid grid-cols-2 gap-2 py-2">
                                            <label class="block text-sm font-medium text-gray-700 "><strong>Deposito : $
                                                    {{ number_format($a_pagar_a_la_firma->deposito_en_pesos, 2, ',', '.') }}</strong>
                                            </label>
                                        </div>
                                        <div class="grid grid-cols-2 gap-2 py-2">
                                            <label class="col-span-2"
                                                class="block text-sm font-medium text-gray-700 "><strong>Metodo de pago
                                                    (Pesos):</strong> </label>
                                            <input type="text" name="mpp_efectivo"
                                                class="focus:ring-indigo-500 focus:border-indigo-500 block h-8 w-11/12 shadow-sm sm:text-sm border-gray-300 rounded-md placeholder-gray-500"
                                                placeholder="Efectivo">
                                            <input type="text" name="mpp_transferencia"
                                                class="focus:ring-indigo-500 focus:border-indigo-500 block h-8 w-11/12 shadow-sm sm:text-sm border-gray-300 rounded-md placeholder-gray-500"
                                                placeholder="Trasferencia">
                                        </div>

                                    </div>
                                    <div class="col-span-6 sm:col-span-3 border-r ">


                                        <div class="grid grid-cols-2 gap-2 py-2">
                                            <label class="block text-sm font-medium text-gray-700 "><strong>Deposito :
                                                    USD
                                                    {{ number_format($a_pagar_a_la_firma->deposito_en_usd, 2, ',', '.') }}</strong>
                                            </label>
                                        </div>
                                        <div class="grid grid-cols-2 gap-2 py-2">
                                            <label class="col-span-2"
                                                class="block text-sm font-medium text-gray-700 "><strong>Metodo de
                                                    pago (USD):</strong> </label>
                                            <input type="text" name="mpd_efectivo"
                                                class="focus:ring-indigo-500 focus:border-indigo-500 block h-8 w-11/12 shadow-sm sm:text-sm border-gray-300 rounded-md placeholder-gray-500"
                                                placeholder="Efectivo">
                                            <input type="text" name="mpd_transferencia"
                                                class="focus:ring-indigo-500 focus:border-indigo-500 block h-8 w-11/12 shadow-sm sm:text-sm border-gray-300 rounded-md placeholder-gray-500"
                                                placeholder="Trasferencia">
                                        </div>

                                    </div>

                                    <div class="col-span-6 sm:col-span-3">

                                        <label for="oferente" class="block text-sm font-medium text-gray-700">Oferente</label>
                                        <input type="text" name="oferente" id="oferente" value="{{ old('oferente') }}"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    

                                    </div>

                                    <div class="col-span-6 sm:col-span-3">

                                        <label for="locatario" class="block text-sm font-medium text-gray-700">Locatario</label>
                                        <input type="text" name="locatario" id="locatario" value="{{ old('locatario') }}"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">

                                    </div>



                                    <div class="col-span-6 sm:col-span-3 justify-self-center">

       
                                        <table class="pr-3">
                                        <thead>
                                          <tr class="bg-gray-500 ">
                                            <th class="border border-gray-800 w-44">Gartantia 1</th>
                                            <th class="border border-gray-800 w-36"></th>         
                                          </tr>
                                        </thead>
                                    
                                    
                                        <tbody>
                                    
                                          <tr>
                                            <td class="border border-gray-800 bg-gray-300 "><div class="text-center">Fiador</div></td>
                                            <td class="border border-gray-800"><div class="text-center"><input type="text" name="g1_fiador" class="block w-full border border-gray-300 bg-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></div></td>
                                          </tr>
                                          <tr>
                                            <td class="border border-gray-800 bg-gray-300 "><div class="text-center">Tipo de propiedad 1</div></td>
                                            <td class="border border-gray-800">
                                                <select name="g1_tp1"
                                                class="block w-full border border-gray-300 bg-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option>Casa</option>
                                                <option>PH</option>
                                                <option>Departamento</option>
                                                <option>Edificio</option>
                                                <option>Terreno</option>
                                            </select><div class="text-center"></div></td>
                                          </tr>
                                          <tr>
                                            <td class="border border-gray-800 bg-gray-300 "><div class="text-center">Direccion 1</div></td>
                                            <td class="border border-gray-800"><div class="text-center"><input type="text" name="g1_d1" class="block w-full border border-gray-300 bg-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></div></td>
                                          </tr>  
                                          <tr>
                                            <td class="border border-gray-800 bg-gray-300 "><div class="text-center">Tipo de propiedad 2</div></td>
                                            <td class="border border-gray-800">
                                                <select name="g1_tp2"
                                                class="block w-full border border-gray-300 bg-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option>Casa</option>
                                                <option>PH</option>
                                                <option>Departamento</option>
                                                <option>Edificio</option>
                                                <option>Terreno</option>
                                            </select><div class="text-center"></div></td>
                                          </tr>
                                          <tr>
                                            <td class="border border-gray-800 bg-gray-300 "><div class="text-center">Direccion 2</div></td>
                                            <td class="border border-gray-800"><div class="text-center"><input type="text" name="g1_d2" class="block w-full border border-gray-300 bg-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></div></td>
                                          </tr>          
                                        </tbody>
                                        </table>
                                    
                                      </div>
                                     



                                    <input type="hidden" value="2" name="category_id">


                                    <div class="col-span-6 sm:col-span-3 justify-self-center">

       
                                        <table class="pr-3">
                                        <thead>
                                          <tr class="bg-gray-500 ">
                                            <th class="border border-gray-800 w-44">Gartantia 2</th>
                                            <th class="border border-gray-800 w-36"></th>         
                                          </tr>
                                        </thead>
                                    
                                    
                                        <tbody>
                                    
                                          <tr>
                                            <td class="border border-gray-800 bg-gray-300 "><div class="text-center">Fiador</div></td>
                                            <td class="border border-gray-800"><div class="text-center"><input type="text" name="g2_fiador" class="block w-full border border-gray-300 bg-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></div></td>
                                          </tr>
                                          <tr>
                                            <td class="border border-gray-800 bg-gray-300 "><div class="text-center">Tipo de propiedad 1</div></td>
                                            <td class="border border-gray-800">
                                                <select name="g2_tp1"
                                                class="block w-full border border-gray-300 bg-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option>Casa</option>
                                                <option>PH</option>
                                                <option>Departamento</option>
                                                <option>Edificio</option>
                                                <option>Terreno</option>
                                            </select><div class="text-center"></div></td>
                                          </tr>
                                          <tr>
                                            <td class="border border-gray-800 bg-gray-300 "><div class="text-center">Direccion 1</div></td>
                                            <td class="border border-gray-800"><div class="text-center"><input type="text" name="g2_d1" class="block w-full border border-gray-300 bg-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></div></td>
                                          </tr>  
                                          <tr>
                                            <td class="border border-gray-800 bg-gray-300 "><div class="text-center">Tipo de propiedad 2</div></td>
                                            <td class="border border-gray-800">
                                                <select name="g2_tp2"
                                                class="block w-full border border-gray-300 bg-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option>Casa</option>
                                                <option>PH</option>
                                                <option>Departamento</option>
                                                <option>Edificio</option>
                                                <option>Terreno</option>
                                            </select><div class="text-center"></div></td>
                                          </tr>
                                          <tr>
                                            <td class="border border-gray-800 bg-gray-300 "><div class="text-center">Direccion 2</div></td>
                                            <td class="border border-gray-800"><div class="text-center"><input type="text" name="g2_d2" class="block w-full border border-gray-300 bg-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></div></td>
                                          </tr>          
                                        </tbody>
                                        </table>
                                    
                                      </div>
                                     



                                    <input type="hidden" value="2" name="category_id">
                                    <input type="hidden" value="{{$post->escalonado}}" name="escalonado">
                                    <input type="hidden" value="{{$post->condicionfiscal}}" name="condicionfiscal">
                                    <input type="hidden" value="{{$post->rubro}}" name="rubro">
                                    <input type="hidden" value="{{$post->direccion}}" name="direccion">
                                    <input type="hidden" value="{{$post->localidad}}" name="localidad">
                                    <input type="hidden" value="{{$post->provincia}}" name="provincia">
                                    <input type="hidden" value="{{$post->codigo_postal}}" name="codigo_postal">
                                    <input type="hidden" value="{{$post->fecha_estimada_de_firma}}" name="fecha_estimada_de_firma">
                                    <input type="hidden" value="{{$post->vigencia_de_contrato}}" name="vigencia_de_contrato">
                                    <input type="hidden" value="{{$post->vigencia_de_contrato}}" name="fecha_de_vencimiento">
                                    <input type="hidden" value="{{$post->vigencia_de_contrato}}" name="cantidad_de_meses">
                                    <input type="hidden" value="{{$post->vigencia_de_contrato}}" name="realizar">
                                    <input type="hidden" value="{{$post->vigencia_de_contrato}}" name="autorizacion">
                                  
                                    
                                    



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

                <div class="px-4 py-3 bg-gray-800 text-right sm:px-6">
                    <button type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Guardar
                    </button>
                </div>

            </div>
        </form>

</x-app-layout>
