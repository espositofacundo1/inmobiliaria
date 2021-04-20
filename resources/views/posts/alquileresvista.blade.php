<?php $cantidad_de_meses = $post->cantidad_de_meses;
use App\Models\Alquilere;
use App\Models\User;
use Carbon\Carbon;

$objeto = Alquilere::where('post_id', '=', $post->id)->get();

$cantidad_de_elementos_del_objeto = count($objeto);

// Contadores + variables

$suma_de_meses = 0;

$facturacion = [];
$alquiler = [];
$documento = [];
$iva = [];
$meses = [];
$nombre_de_meses_en_es = ['01' => 'Enero', '02' => 'Febrero', '03' => 'Marzo', '04' => 'Abril', '05' => 'Mayo', '06' =>
'Junio', '07' => 'Julio', '08' => 'Agosto', '09' => 'Septiembre', '10' => 'Octubre', '11' => 'Noviembre', '12' =>
'Diciembre'];
$periodo = [];
$incremento=0;

$contador1 = 0;
$contador2 = 0;

$suma_facturacion = 0;
$suma_iva = 0;
$suma_documento = 0;
$suma_total_sin_iva = 0;
$suma_total = 0;
$años = round($cantidad_de_meses / 12 + 0.49);

// Fechas

$dia_de_vigencia = Carbon::createFromDate($post->vigencia_de_contrato)->format('d');

for ($i = 0; $i <= $cantidad_de_elementos_del_objeto - 1; $i++) { $contador2=$contador1 - 1 + $objeto[$i]->meses;

    $meses[$i] = $objeto[$i]->meses;

    for ($o = $contador1; $o <= $contador2; $o++) { $facturacion[$o + 1]=$objeto[$i]->facturacion;

        $alquiler[$o + 1] = $objeto[$i]->alquiler;

        $documento[$o + 1] = $objeto[$i]->alquiler - $objeto[$i]->facturacion;

        if ($post->condicionfiscal == 'Si') {
        $iva[$o + 1] = $objeto[$i]->facturacion * 0.21;
        } else {
        $iva[$o + 1] = 0;
        }

        if ($dia_de_vigencia == 1) {
        $agrego_meses = Carbon::createFromDate($post->vigencia_de_contrato)
        ->add($o + $contador2 - 1, 'month')
        ->format('m');

        $periodo[$o + 1] = $nombre_de_meses_en_es[$agrego_meses];
        } else {
        $agrego_meses = Carbon::createFromDate($post->vigencia_de_contrato)->add($o + 1, 'month');
        
        $menos_un_dia = Carbon::createFromDate($agrego_meses->toDateTimeString())
        ->add(-1, 'day')
        ->format('d/m/y');

        $vigencia_agregando_meses = Carbon::createFromDate($post->vigencia_de_contrato)
        ->add($o, 'month')
        ->format('d/m/y');

        $periodo[$o + 1] =  $vigencia_agregando_meses . ' - ' . $menos_un_dia;
        }

        $contador1 = $contador1 + 1;
        }
        }

        for ($año = 1; $año <= $años; $año++) { ?> <div class="grid justify-items-center ">

            <table class="sm:w-4/5 sm:text-base  text-xs ">
                <thead>
                    <tr class="bg-gray-500 ">
                        <th class="border border-gray-800">Año {{ $año }}</th>
                        <th class="border border-gray-800">Mes</th>
                        <th class="border border-gray-800">Alquiler</th>
                        <th class="border border-gray-800">IVA</th>
                        <th class="border border-gray-800">Pagare</th>
                        <th class="border border-gray-800">% Δ</th>
                        <th class="border border-gray-800">Total sin Iva</th>
                        <th class="border border-gray-800">Total con Iva</th>


                    </tr>
                </thead>


                <tbody>


                    <?php
                    $años_en_meses = $año * 12;

                    for ($i = $años_en_meses - 11; $i <= $post->cantidad_de_meses; $i++) {

                        if ($i == $años_en_meses + 1) {
                        break;
                        }

                        $o = $i - 1;

                        if (!isset($facturacion[$i + 1])) {
                        $facturacion[$i + 1] = $facturacion[$i];
                        }
                        if (!isset($alquiler[$i + 1])) {
                        $alquiler[$i + 1] = $alquiler[$i];
                        }

                        if ($facturacion[$i] == $facturacion[$i + 1] && $alquiler[$i] == $alquiler[$i + 1]) {
                        $bg = '';
                        } else {
                        $bg = 'border-b-4 border-solid border-gray-800';
                        }

                        if(isset($alquiler[$i-1]) && $alquiler[$i-1]!=0){
                            $incremento=(($alquiler[$i]/$alquiler[$i-1])-1)*100;
                        
                        }
                     
                        

                        // ------------ contadores---------------------------//
                        $suma_facturacion = $suma_facturacion + $facturacion[$i];
                        $suma_iva = $suma_iva + $iva[$i];
                        $suma_documento = $suma_documento + $documento[$i];
                        $suma_total_sin_iva = $suma_total_sin_iva + $alquiler[$i];

                        //-----------------------------------------------------------//
                        ?>


                        <tr class="<?php echo $bg; ?>">
                            <td class="border border-gray-800 bg-gray-300 ">
                                <div class="text-center">{{ $i }}</div>
                            </td>
                            <td class="border border-gray-800 bg-gray-100 ">
                                <div class="text-center">{{ $periodo[$i] }}</div>
                            </td>
                            <td class="border border-gray-800 bg-gray-100 ">
                                <div class="text-center">${{ number_format($facturacion[$i], 0, ',', '.') }}</div>
                            </td>
                            <td class="border border-gray-800 bg-gray-100 ">
                                <div class="text-center">${{ number_format($iva[$i], 0, ',', '.') }}</div>
                            </td>
                            <td class="border border-gray-800 bg-gray-100 ">
                                <div class="text-center">${{ number_format($documento[$i], 0, ',', '.') }}</div>
                            </td>
                            <td class="border border-gray-800 bg-gray-100 ">
                                <div class="text-center">{{ number_format($incremento, 2, ',', '.') }}%</div>
                            </td>
                            <td class="border border-gray-800 bg-gray-400 ">
                                <div class="text-center">${{ number_format($alquiler[$i], 0, ',', '.') }}</div>
                            </td>
                            <td class="border border-gray-800 bg-gray-400 ">
                                <div class="text-center">${{ number_format($alquiler[$i] + $iva[$i], 0, ',', '.') }}
                                </div>
                            </td>
                        </tr>

                        <?php
                        }
                        ?>

                        <tr>
                            <td class="border border-gray-800 bg-gray-400 ">
                                <div class="text-center">Prom.</div>
                            </td>
                            <td class="border border-gray-800 bg-gray-400 ">
                                <div class="text-center">-</div>
                            </td>
                            <td class="border border-gray-800 bg-gray-400 ">
                                <div class="text-center">
                                    ${{ number_format($suma_facturacion / ($i + 11 - $años_en_meses), 0, ',', '.') }}</div>
                            </td>
                            <td class="border border-gray-800 bg-gray-400 ">
                                <div class="text-center">
                                    ${{ number_format($suma_iva / ($i + 11 - $años_en_meses), 0, ',', '.') }}</div>
                            </td>
                            <td class="border border-gray-800 bg-gray-400 ">
                                <div class="text-center">
                                    ${{ number_format($suma_documento / ($i + 11 - $años_en_meses), 0, ',', '.') }}</div>
                            </td>
                            <td class="border border-gray-800 bg-gray-100 ">
                                <div class="text-center">-</div>
                            <td class="border border-gray-800 bg-gray-200 ">
                                <div class="text-center">
                                    ${{ number_format($suma_total_sin_iva / ($i + 11 - $años_en_meses), 0, ',', '.') }}</div>
                            </td>
                            <td class="border border-gray-800 bg-gray-200 ">
                                <div class="text-center">
                                    ${{ number_format(($suma_total_sin_iva + $suma_iva) / ($i + 11 - $años_en_meses), 0, ',', '.') }}
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="border border-gray-800 bg-gray-400 ">
                                <div class="text-center">Total</div>
                            </td>
                            <td class="border border-gray-800 bg-gray-400 ">
                                <div class="text-center">{{ $i + 11 - $años_en_meses }}</div>
                            </td>
                            <td class="border border-gray-800 bg-gray-400 ">
                                <div class="text-center">${{ number_format($suma_facturacion, 0, ',', '.') }}</div>
                            </td>
                            <td class="border border-gray-800 bg-gray-400 ">
                                <div class="text-center">${{ number_format($suma_iva, 0, ',', '.') }}</div>
                            </td>
                            <td class="border border-gray-800 bg-gray-400 ">
                                <div class="text-center">${{ number_format($suma_documento, 0, ',', '.') }}</div>
                            </td>
                            <td class="border border-gray-800 bg-gray-100 ">
                                <div class="text-center">-</div>
                            <td class="border border-gray-800 bg-gray-200 ">
                                <div class="text-center">${{ number_format($suma_total_sin_iva, 0, ',', '.') }}</div>
                            </td>
                            <td class="border border-gray-800 bg-gray-200 ">
                                <div class="text-center">
                                    ${{ number_format($suma_total_sin_iva + $suma_iva, 0, ',', '.') }}</div>
                            </td>
                        </tr>

                </tbody>


            </table>
            </div>

            <br>
            <hr>
            <br>


            <?php
            $suma_facturacion = 0;
            $suma_iva = 0;
            $suma_documento = 0;
            $suma_total_sin_iva = 0;
            $suma_total = 0;
            }
            ?>



            <div class="grid grid-cols-2 gap-2">
                @include('posts.serviciosvista')


                @include('posts.a_pagar_a_la_firma_vista')

            </div>
