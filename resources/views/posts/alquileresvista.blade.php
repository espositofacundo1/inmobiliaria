<?php $cantidad_de_meses = $post->cantidad_de_meses;
use App\Models\Alquilere; use App\Models\User; use Carbon\Carbon;

$objeto = Alquilere::where('post_id', '=', $post->id)->get();


$suma_de_meses1=0;
$suma_facturacion1=0;
$suma_alquiler1=0;
$resto=0;

?>
  
    <div class="pr-3">
      <h1>Primer año:</h1>
      <table class="w-max">
      <thead>
        <tr class="bg-gray-500 ">
          <th class="border border-gray-800 ">Mes</th>
          <th class="border border-gray-800 w-24">Periodo</th>
          <th class="border border-gray-800 w-24">Facturado</th>
          <th class="border border-gray-800 w-24">IVA</th>
          <th class="border border-gray-800 w-24">Documento</th>
          <th class="border border-gray-800 w-24">Total sin IVA</th>
          <th class="border border-gray-800 w-24">Total con IVA</th>
          
          
                             
        </tr>
      </thead>
      <tbody>

       <?php 
            
       for ($i=0; $i <= $cantidad_de_meses-1; $i++) { 

            $peridoi= Carbon::createFromDate($post->fecha_estimada_de_firma)->add($i,'month')->format('d/m/y');  
            $peridof= Carbon::createFromDate($post->fecha_estimada_de_firma)->add($objeto[$i]->meses,'month')->format('d/m/y');

            $suma_de_meses1=$suma_de_meses1+$objeto[$i]->meses ; 
            
    
            if($suma_de_meses1 <= 12 && $suma_de_meses1<=$cantidad_de_meses ){  
     
          ?>

                 
        <tr>
          <td class="border border-gray-800 bg-gray-300 "><div class="text-center">{{$objeto[$i]->meses}}</div></td>
          <td class="border border-gray-800"><div class="text-center">{{$peridoi}}<br>{{$peridof}}</div></td>
          <td class="border border-gray-800"><div class="text-center">{{$objeto[$i]->facturacion}}</div></td>
          <td class="border border-gray-800"><div class="text-center">{{($objeto[$i]->facturacion)*0.21}}</div></td>
          <td class="border border-gray-800"><div class="text-center">{{($objeto[$i]->alquiler)-($objeto[$i]->facturacion)}}</div></td>
          <td class="border border-gray-800 bg-gray-400"><div class="text-center"><strong>{{$objeto[$i]->alquiler}}</strong></div></td>
          <td class="border border-gray-800 bg-gray-400"><div class="text-center"><strong>{{$objeto[$i]->alquiler+($objeto[$i]->facturacion)*0.21}}</strong></div></td>
        </tr>  
        

<?php 

$suma_facturacion1=$suma_facturacion1+($objeto[$i]->facturacion)*($objeto[$i]->meses);
$suma_alquiler1=$suma_alquiler1+($objeto[$i]->alquiler)*($objeto[$i]->meses);
$suma_iva1=$suma_facturacion1*0.21;
     
}
else
{

  $resto=$suma_de_meses1-12;
  $suma_facturacion1=$suma_facturacion1+($objeto[$i]->facturacion)*($objeto[$i]->meses-$resto);
  $suma_iva1=$suma_facturacion1*0.21;
  $suma_alquiler1=$suma_alquiler1+($objeto[$i]->alquiler)*($objeto[$i]->meses-$resto);
  $suma_documento1=$suma_alquiler1-$suma_facturacion1;
  $suma_alquiler_con_iva1=$suma_alquiler1+$suma_iva1;
  
?>

<tr>
  <td class="border border-gray-800 bg-gray-300 "><div class="text-center">{{$objeto[$i]->meses-$resto}}</div></td>
  <td class="border border-gray-800"><div class="text-center">{{$peridoi}}<br>{{$peridof}}</div></td>
  <td class="border border-gray-800"><div class="text-center">{{$objeto[$i]->facturacion}}</div></td>
  <td class="border border-gray-800"><div class="text-center">{{($objeto[$i]->facturacion)*0.21}}</div></td>
  <td class="border border-gray-800"><div class="text-center">{{($objeto[$i]->alquiler)-($objeto[$i]->facturacion)}}</div></td>
  <td class="border border-gray-800 bg-gray-400"><div class="text-center"><strong>{{$objeto[$i]->alquiler}}</strong></div></td>
  <td class="border border-gray-800 bg-gray-400"><div class="text-center"><strong>{{$objeto[$i]->alquiler+($objeto[$i]->facturacion)*0.21}}</strong></div></td>
</tr>  

<?php 

break; }


$suma_documento1=$suma_alquiler1-$suma_facturacion1;
$suma_alquiler_con_iva1=$suma_alquiler1+$suma_iva1;

}  

?>


        <tr>
          <td class="border border-gray-800 bg-gray-300 "><div class="text-center text-base text-black"><strong>Totales</strong></div></td>
          <td class="border border-gray-800 bg-gray-300 "><div class="text-center text-base text-black"><strong></strong></div></td>
          <td class="border border-gray-800 bg-gray-300 "><div class="text-center text-base text-black"><strong>{{$suma_facturacion1}}</strong></div></td>
          <td class="border border-gray-800 bg-gray-300 "><div class="text-center text-base text-black"><strong>{{$suma_iva1}}</strong></div></td>
          <td class="border border-gray-800 bg-gray-300 "><div class="text-center text-base text-black"><strong>{{$suma_documento1}}</strong></div></td>
          <td class="border border-gray-800 bg-gray-300 "><div class="text-center text-base text-black"><strong>{{$suma_alquiler1}}</strong></div></td>
          <td class="border border-gray-800 bg-gray-300 "><div class="text-center text-base text-black"><strong>{{$suma_alquiler_con_iva1}}</strong></div></td>
         
        </tr> 
        <tr>
          <td class="border border-gray-800 bg-gray-300 "><div class="text-center text-base text-black"><strong>Promedio</strong></div></td>
          <td class="border border-gray-800 bg-gray-300 "><div class="text-center text-base text-black"><strong>-</strong></div></td>
          <td class="border border-gray-800 bg-gray-300 "><div class="text-center text-base text-black"><strong></strong></div></td>
          <td class="border border-gray-800 bg-gray-300 "><div class="text-center text-base text-black"><strong></strong></div></td>
          <td class="border border-gray-800 bg-gray-300 "><div class="text-center text-base text-black"><strong></strong></div></td>
          <td class="border border-gray-800 bg-gray-300 "><div class="text-center text-base text-black"><strong></strong></div></td>
          <td class="border border-gray-800 bg-gray-300 "><div class="text-center text-base text-black"><strong></strong></div></td>
         
        </tr>   
       </tbody>  
       
     
      </table>

      
