<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    use WithPagination;


    public function index(){
        
        $post= Post::orderBy('updated_at','desc')->paginate(10);

        return view('posts.index', compact('post'));
    }

    public function show(Post $post){

        
        return view('posts.show',compact('post'));
    }


    public function category(Category $category){
        $posts = Post::where('category_id',$category->id)
                       ->latest('id')
                       ->paginate(6);

        return view('posts.category',compact('posts','category'));
    }


    public function create(){
        
        return view('posts.create');
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

        $post->user_id =Auth::user()->id;
        $post->team_id=Auth::user()->currentTeam->id;
        $post->category_id = $request->category_id; 
      
        $post->save();

        return redirect()->route('posts.index');
        
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



    

}
