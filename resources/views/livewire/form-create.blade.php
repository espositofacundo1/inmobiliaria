<div>
    <div class="py-5">
    <label for="cantidad_de_meses">Cantidad de meses: </label>
    <input wire:model="cantidad_de_meses" name="cantidad_de_meses" type="number" class="h-8 w-16">
    </div>
   
<?php
    $array = array($meses1,$meses2,$meses3,$meses4,$meses5,$meses6,$meses7,$meses8,$meses9,$meses10,
           $meses11,$meses12,$meses13,$meses14,$meses15,$meses16,$meses17,$meses18,$meses19,$meses20,
           $meses21,$meses22,$meses23,$meses24,$meses25,$meses26,$meses27,$meses28,$meses29,$meses30,
           $meses31,$meses32,$meses33,$meses34,$meses35,$meses36);

    $suma=0;
    
    foreach ($array as $value) {
        if (is_numeric ( $value )) {
        $suma=$suma+$value;
        }
    }
?>
   

<div class="px-5">
@if ($cantidad_de_meses == $suma )
<label class="text-green-700">{{$suma}} /{{$cantidad_de_meses}}</label>
@endif
@if ($cantidad_de_meses != $suma )
<label class="text-red-700">{{$suma}} /{{$cantidad_de_meses}}</label>
@endif
</div>

    <table class="pr-3">
        <thead>
            <tr class="bg-gray-500 ">
                <th class="border border-gray-800">Meses</th>
                <th class="border border-gray-800 w-36">Alquiler</th>
                <th class="border border-gray-800 w-36">Facturacion</th>
             
           
            </tr>
        </thead>
        <tbody>

            @for ($i = 1; $i <= $cantidad_de_meses; $i++)

      

                <tr>
                    <td class="border border-gray-800 bg-gray-300"><input wire:model="{{ 'meses' . $i }}" type="number"
                            name="{{ 'meses' . $i }}" value="{{ old('meses' . $i) }}" class="w-16 h-8 bg-gray-300">
                    </td>                
                    <td class="border border-gray-800"><input 
                            name="{{ 'alquiler' . $i }}" value="{{ old('alquiler' . $i) }}" type="number"
                            class="w-36 h-8 text-center"></td>
                    <td class="border border-gray-800"><input 
                            name="{{ 'facturacion' . $i }}" value="{{ old('facturacion' . $i) }}" type="number"
                            class="w-36 h-8 text-center"></td>

                   
                            
                </tr>
            @endfor
        </tbody>
    </table>
   



</div>
