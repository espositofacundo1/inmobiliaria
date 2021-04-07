<?php 
use App\Models\Servicio;



$servicios= Servicio::where('post_id', '=', $post->id)->get();

$servicios=$servicios[0];
$servicios = Servicio::where('post_id', '=', $post->id)->get();
$servicios=$servicios[0];

function checkear($a){
        if ($a=='on') {
            echo "<FONT COLOR='green'><strong>Si</strong></FONT>";
        }
        else{
            echo " - ";
        }
}

?>

<div class="pr-3 col-span-1 justify-self-center">

       
    <table class="pr-3">
    <thead>
      <tr class="bg-gray-500 ">
        <th class="border border-gray-800 w-36">Servicios</th>
        <th class="border border-gray-800 w-36">El locatario paga:</th>
        <th class="border border-gray-800 w-10">Solicita</th>                     
      </tr>
    </thead>


    <tbody>

      <tr>
        <td class="border border-gray-800 bg-gray-300 "><div class="text-center">OSSE</div></td>
        <td class="border border-gray-800"><div class="text-center">{{$servicios->osse}}</div></td>
        <td class="border border-gray-800 "><div class="text-center">{{checkear($servicios->osse_solicitar)}}</div></td>
      </tr>
      <tr>
        <td class="border border-gray-800 bg-gray-300"><div class="text-center">EDEA</div></td>
        <td class="border border-gray-800"><div class="text-center">{{$servicios->edea}}</div></td>
        <td class="border border-gray-800 "><div class="text-center">{{checkear($servicios->edea_solicitar)}}</div></td>
      </tr>
      <tr>
        <td class="border border-gray-800 bg-gray-300"><div class="text-center">GAS</div></td>
        <td class="border border-gray-800"><div class="text-center">{{$servicios->gas}}</div></td>
        <td class="border border-gray-800 "><div class="text-center">{{checkear($servicios->gas_solicitar)}}</div></td>
      </tr>
      <tr>
        <td class="border border-gray-800 bg-gray-300"><div class="text-center">TSU</div></td>
        <td class="border border-gray-800"><div class="text-center">{{$servicios->tsu}}</div></td>
        <td class="border border-gray-800 "><div class="text-center">{{checkear($servicios->tsu_solicitar)}}</div></td>
      </tr>
      <tr>
        <td class="border border-gray-800 bg-gray-300"><div class="text-center">Exp. Extraordinarias</div></td>
        <td class="border border-gray-800"><div class="text-center">{{$servicios->expensas_extra}}</div></td>
        <td class="border border-gray-800 "><div class="text-center">{{checkear($servicios->expensas_extra_solicitar)}}</div></td>
      </tr>
      <tr>
        <td class="border border-gray-800 bg-gray-300"><div class="text-center">Exp. Ordinarias</div></td>
        <td class="border border-gray-800"><div class="text-center">{{$servicios->expensas_ord}}</div></td>
        <td class="border border-gray-800 "><div class="text-center">{{checkear($servicios->expensas_ord_solicitar)}}</div></td>
      </tr>
      <tr>
        <td class="border border-gray-800 bg-gray-300"><div class="text-center">ARBA</div></td>
        <td class="border border-gray-800"><div class="text-center">{{$servicios->arba}}</div></td>
        <td class="border border-gray-800 "><div class="text-center">{{checkear($servicios->arba_solicitar)}}</div></td>
      </tr>
      <tr>
        <td class="border border-gray-800 bg-gray-300"><div class="text-center">SEGURO</div></td>
        <td class="border border-gray-800"><div class="text-center">{{$servicios->seguro}}</div></td>
        <td class="border border-gray-800 "><div class="text-center">{{checkear($servicios->seguro_solicitar)}}</div></td>
      </tr>
      <tr>
        <td class="border border-gray-800 bg-gray-300"><div class="text-center">{{$servicios->otros1_nombre}}</div></td>
        <td class="border border-gray-800"><div class="text-center">{{$servicios->otros1}}</div></td>
        <td class="border border-gray-800 "><div class="text-center">{{checkear($servicios->otros1_solicitar)}}</div></td>
      </tr>
      <tr>
        <td class="border border-gray-800 bg-gray-300"><div class="text-center">{{$servicios->otros2_nombre}}</div></td>
        <td class="border border-gray-800"><div class="text-center">{{$servicios->otros2}}</div></td>
        <td class="border border-gray-800 "><div class="text-center">{{checkear($servicios->otros2_solicitar)}}</div></td>
      </tr>
      <tr>
        <td class="border border-gray-800 bg-gray-300"><div class="text-center">{{$servicios->otros3_nombre}}</div></td>
        <td class="border border-gray-800"><div class="text-center">{{$servicios->otros3}}</div></td>
        <td class="border border-gray-800 "><div class="text-center">{{checkear($servicios->otros3_solicitar)}}</div></td>
      </tr>
      

      

      

     </tbody>       
    </table>

  </div>