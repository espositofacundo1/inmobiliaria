<?php

namespace App\Http\Controllers;


use App\Models\A_pagar_a_la_firma;
use App\Models\Alquilere;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Servicio;
use App\Models\User;
use livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;



class PostController extends Controller
{

    use WithPagination;

    const PAGINACION=15;


    public function index(Request $request){


        $texto=trim($request->get('texto'));
        
               
        $post= Post::where('team_id','Like',Auth::user()->currentTeam->id)
                    ->where('direccion','LIKE','%'.$texto.'%')                                     
                    ->orderBy('updated_at','desc')
                    ->paginate($this::PAGINACION)             
                                 
        ;   
        

        return view('posts.index', compact('post','texto'));
    }

    public function show(Post $post){




        $creado = Carbon::createFromDate($post->created_at->toDateTimeString())->format('H:i , d / m / Y');
        $actualizado= Carbon::createFromDate($post->updated_at->toDateTimeString())->format('H:i , d / m / Y');

        $fecha_estimada_de_firma= Carbon::createFromDate($post->fecha_estimada_de_firma)->format('d / m / Y');
       
        

        
        return view('posts.show',compact('post','creado','actualizado','fecha_estimada_de_firma'));
    }

    public function category(Category $category){
        $posts = Post::where('category_id',$category->id)
                       ->latest('id')
                       ->paginate(6);

        return view('posts.category',compact('posts','category'));
    }


    public function create(Request $request){


        $cantidad_de_meses=$request->get('cantidad_de_meses');

        if (isset($_GET['cantidad_de_meses']))
        { $cantidad_de_meses=$_GET['cantidad_de_meses'];}
        else{ $cantidad_de_meses=0;}

        $fecha_estimada_de_firma=$request->get('fecha_estimada_de_firma');

        if (isset($_GET['fecha_estimada_de_firma']))
        {$fecha_estimada_de_firma=$_GET['fecha_estimada_de_firma'];}
        else{ $fecha_estimada_de_firma=0;}

        $vigencia_de_contrato = Carbon::createFromDate($fecha_estimada_de_firma)->add($cantidad_de_meses,'month')->format('d / m / Y');
      
        $siete_dias_mas = Carbon::now()->add(7, 'day')->format('d / m / Y');


      
        return view('posts.create',compact('siete_dias_mas','cantidad_de_meses','vigencia_de_contrato','fecha_estimada_de_firma'));
    }

    public function store(Request $request){

        $request->validate([

        'escalonado'=> 'required',
        'condicionfiscal'=> 'required',
        'rubro'=> 'required',
        'direccion'=> 'required',
        'localidad'=> 'required',
        'provincia'=> 'required',
        'codigo_postal'=> 'required',
        'fecha_estimada_de_firma'=> 'required',

        ]);

        $post= new Post();

        $post->escalonado = $request->escalonado;
        $post->condicionfiscal = $request->condicionfiscal;
        $post->rubro = $request->rubro;
        $post->direccion = $request->direccion;
        $post->localidad = $request->localidad;
        $post->provincia = $request->provincia;
        $post->codigo_postal = $request->codigo_postal;       
        $post->fecha_estimada_de_firma = $request->fecha_estimada_de_firma;
        $post->vigencia_de_contrato = $request->vigencia_de_contrato;
        $post->fecha_de_vencimiento = $request->fecha_de_vencimiento;
        $post->cantidad_de_meses = $request->cantidad_de_meses;
        $post->realizar = $request->realizar;
        $post->autorizacion = $request->autorizacion;


        

        
        $post->user_id =Auth::user()->id;
        $post->team_id=Auth::user()->currentTeam->id;
        $post->category_id = $request->category_id; 
      
        $post->save();

        
       $cantidad_de_meses=$request->cantidad_de_meses;
        

        for ($i=1; $i <= $cantidad_de_meses ; $i++) {            

            $a="alquiler".$i;
            $b="facturacion".$i;
            $c="meses".$i;
            $d="instancia".$i;


            $d= new Alquilere();

            $d->alquiler = $request->$a;
            $d->facturacion= $request->$b;
            $d->meses= $request->$c; 
            $d->post_id = $post->id;

            $d->save();
        }
       


        $servicio= new Servicio();
        

        $servicio->osse = $request->osse;
        $servicio->osse_solicitar = $request->osse_solicitar;
        $servicio->edea = $request->edea;
        $servicio->edea_solicitar = $request->edea_solicitar;
        $servicio->gas = $request->gas;
        $servicio->tsu = $request->tsu;
        $servicio->tsu_solicitar = $request->tsu_solicitar;
        $servicio->expensas_extra = $request->expensas_extra;
        $servicio->expensas_extra_solicitar = $request->expensas_extra_solicitar;
        $servicio->expensas_ord = $request->expensas_ord;
        $servicio->expensas_ord_solicitar = $request->expensas_ord_solicitar;
        $servicio->arba = $request->arba;
        $servicio->arba_solicitar = $request->arba_solicitar;
        $servicio->seguro = $request->seguro;
        $servicio->seguro_solicitar = $request->seguro_solicitar;
        $servicio->otros1_nombre = $request->otros1_nombre;
        $servicio->otros1 = $request->otros1;
        $servicio->otros1_solicitar = $request->otros1_solicitar;
        $servicio->otros2_nombre = $request->otros2_nombre;
        $servicio->otros2 = $request->otros2;
        $servicio->otros2_solicitar = $request->otros2_solicitar;
        $servicio->otros3_nombre = $request->otros3_nombre;
        $servicio->otros3 = $request->otros3;
        $servicio->otros3_solicitar = $request->otros3_solicitar;

        $servicio->post_id = $post->id;


        $servicio->save();


        $a_pagar_a_la_firma= new A_pagar_a_la_firma();

        $a_pagar_a_la_firma->adelanto = $request->adelanto;
        $a_pagar_a_la_firma->deposito_en_pesos = $request->deposito_en_pesos;
        $a_pagar_a_la_firma->deposito_en_usd = $request->deposito_en_usd;
        $a_pagar_a_la_firma->informes = $request->informes;

        $a_pagar_a_la_firma->post_id = $post->id;
       

        $a_pagar_a_la_firma->save();



        return redirect()->route('posts.show',$post->id);
        
    }


    public function edit(Post $post){

        return view('posts.edit',compact('post'));

    }

    public function update(Request $request,Post $post){


        $request->validate([

            'escalonado'=> 'required',
            'condicionfiscal'=> 'required',
            'rubro'=> 'required',
            'direccion'=> 'required',
            'localidad'=> 'required',
            'provincia'=> 'required',
            'codigo_postal'=> 'required',
            'fecha_estimada_de_firma'=> 'required',
    
            ]);

        $post->escalonado = $request->escalonado;
        $post->condicionfiscal = $request->condicionfiscal;
        $post->rubro = $request->rubro;
        $post->direccion = $request->direccion;
        $post->localidad = $request->localidad;
        $post->provincia = $request->provincia;
        $post->codigo_postal = $request->codigo_postal;      
        $post->fecha_estimada_de_firma = $request->fecha_estimada_de_firma;



        $post->user_id =Auth::user()->id;
        $post->team_id=Auth::user()->currentTeam->id;
        $post->category_id = $request->category_id; 

        $post->save();


        return view('posts.show',compact('post'));

    }

    public function destroy(Post $post){

        $post->delete();
        return redirect()->route('posts.index');
    }


    public function detalle_propuesta(Post $post){

        $fecha_estimada_de_firma= Carbon::createFromDate($post->fecha_estimada_de_firma)->format('d / m / Y');

        return view('posts.detalle_propuesta',compact('post','fecha_estimada_de_firma'));

    }

}
