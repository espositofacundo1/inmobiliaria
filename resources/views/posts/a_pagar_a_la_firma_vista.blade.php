<?php 
use App\Models\A_pagar_a_la_firma;
use App\Models\Alquilere;


$a_pagar_a_la_firma= A_pagar_a_la_firma::where('post_id', '=', $post->id)->get();
$a_pagar_a_la_firma=$a_pagar_a_la_firma[0];
$a_pagar_a_la_firma = A_pagar_a_la_firma::where('post_id', '=', $post->id)->get();
$a_pagar_a_la_firma=$a_pagar_a_la_firma[0];


$facturacion = Alquilere::where('post_id', '=', $post->id)->get();
$facturaciona=$facturacion[0];
$alquiler = Alquilere::where('post_id', '=', $post->id)->get();
$alquiler=$alquiler[0];

$qm=$a_pagar_a_la_firma->adelanto;
$contar=0;
for ($i=1; $i <= $qm ; $i++) {
    $facturacionx="facturacion".$i; 
   

    if (($facturaciona->$facturacionx) == null) {
        $contar=$contar+1;
        
    }
}

$qm=$qm+$contar;

$sumatoriaf=0;

for ($i=1; $i <= $qm ; $i++) { 

    $facturacionx="facturacion".$i;
    
    $sumatoriaf=$sumatoriaf + ($facturaciona->$facturacionx);
}

if($post->condicionfiscal=="Si")
{
    $ivaf=0.21;
}
else{
    $ivaf=0;
}

$alquiler_total=0;

for ($i=1; $i <= 36 ; $i++) { 

$alquilerx="alquiler".$i;

$alquiler_total=$alquiler_total + ($alquiler->$alquilerx);
}


$iva=$sumatoriaf*$ivaf;
$cs=$sumatoriaf*(1+$ivaf)*0.0012/2;
$honorarios=$alquiler_total*0.04;
$iva_honorarios=$honorarios*0.21;


?>



<div class="pr-3 col-span-1 justify-self-center">

       
    <table class="pr-3">
    <thead>
      <tr class="bg-gray-500 ">
        <th class="border border-gray-800 w-44">A pagar a la firma</th>
        <th class="border border-gray-800 w-36">Monto</th>         
      </tr>
    </thead>


    <tbody>

      <tr>
        <td class="border border-gray-800 bg-gray-300 "><div class="text-center">Meses adelantados</div></td>
        <td class="border border-gray-800"><div class="text-center">{{$a_pagar_a_la_firma->adelanto}}</div></td>
      </tr>
      <tr>
        <td class="border border-gray-800 bg-gray-300 "><div class="text-center">Facturacion</div></td>
        <td class="border border-gray-800"><div class="text-center">{{$sumatoriaf}}</div></td>
      </tr>
      <tr>
        <td class="border border-gray-800 bg-gray-300 "><div class="text-center">IVA</div></td>
        <td class="border border-gray-800"><div class="text-center">{{$iva}}</div></td>
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
        <td class="border border-gray-800"><div class="text-center">{{$cs}}</div></td>
      </tr>
      <tr>
        <td class="border border-gray-800 bg-gray-300 "><div class="text-center">Informes</div></td>
        <td class="border border-gray-800"><div class="text-center">{{$a_pagar_a_la_firma->informes}}</div></td>
      </tr>
      <tr>
        <td class="border border-gray-800 bg-gray-300 "><div class="text-center">Honorarios</div></td>
        <td class="border border-gray-800"><div class="text-center">{{$honorarios}}</div></td>
      </tr>
      <tr>
        <td class="border border-gray-800 bg-gray-300 "><div class="text-center">Iva Honorarios</div></td>
        <td class="border border-gray-800"><div class="text-center">{{$iva_honorarios}}</div></td>
      </tr>
    

    </tbody>
    </table>

  </div>