<?php 
use App\Models\A_pagar_a_la_firma;



$a_pagar_a_la_firma= A_pagar_a_la_firma::where('post_id', '=', $post->id)->get();
$a_pagar_a_la_firma=$a_pagar_a_la_firma[0];

//contadores-----------------------------------

$sumatoria_facturacion_adelanto=0;

//----------------------------------------------


for ($i=1; $i <=$a_pagar_a_la_firma->adelanto ; $i++) { 

  $sumatoria_facturacion_adelanto=$sumatoria_facturacion_adelanto+$facturacion[$i];
  
}

$iva_adelanto=$sumatoria_facturacion_adelanto*0.21;


?>



<div class="pr-3 col-span-1 justify-self-center">

       
    <table class="pr-3">
    <thead>
      <tr class="bg-gray-500 ">
        <th class="border border-gray-800 w-44">A pagar a la firma</th>
        <th class="border border-gray-800 w-36"></th>         
      </tr>
    </thead>


    <tbody>

      <tr>
        <td class="border border-gray-800 bg-gray-300 "><div class="text-center">Meses adelantados</div></td>
        <td class="border border-gray-800"><div class="text-center">{{$a_pagar_a_la_firma->adelanto}}</div></td>
      </tr>
      <tr>
        <td class="border border-gray-800 bg-gray-300 "><div class="text-center">Facturacion</div></td>
        <td class="border border-gray-800"><div class="text-center">{{$sumatoria_facturacion_adelanto}}</div></td>
      </tr>
      <tr>
        <td class="border border-gray-800 bg-gray-300 "><div class="text-center">IVA</div></td>
        <td class="border border-gray-800"><div class="text-center">{{$iva_adelanto}}</div></td>
      </tr>
      <tr>
        <td class="border border-gray-800 bg-gray-300 "><div class="text-center">Deposito en pesos</div></td>
        <td class="border border-gray-800"><div class="text-center">{{$a_pagar_a_la_firma->deposito_en_pesos}}</div></td>
      </tr>
      <tr>
        <td class="border border-gray-800 bg-gray-300 "><div class="text-center">Deposito en USD</div></td>
        <td class="border border-gray-800"><div class="text-center">{{$a_pagar_a_la_firma->deposito_en_usd}} USD</div></td>
      </tr>
      <tr>
        <td class="border border-gray-800 bg-gray-300 "><div class="text-center">Sellados</div></td>
        <td class="border border-gray-800"><div class="text-center"></div></td>
      </tr>
      <tr>
        <td class="border border-gray-800 bg-gray-300 "><div class="text-center">Informes</div></td>
        <td class="border border-gray-800"><div class="text-center">{{$a_pagar_a_la_firma->informes}}</div></td>
      </tr>
      <tr>
        <td class="border border-gray-800 bg-gray-300 "><div class="text-center">Honorarios</div></td>
        <td class="border border-gray-800"><div class="text-center"></div></td>
      </tr>
      <tr>
        <td class="border border-gray-800 bg-gray-300 "><div class="text-center">Iva Honorarios</div></td>
        <td class="border border-gray-800"><div class="text-center"></div></td>
      </tr>
    

    </tbody>
    </table>

  </div>