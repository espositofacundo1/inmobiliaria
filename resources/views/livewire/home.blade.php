<div>
    <form class="w-10/12" action="{{route('posts.index')}}" method="GET" >
            
        <div class="flex items-center gap-3">
          <input class="focus:border-gray-500 focus:ring-1 focus:ring-gray-500 focus:outline-none  text-sm text-black placeholder-gray-500 border border-blue-700 rounded-md py-2 px-1 " placeholder="Direccion" name="texto" value="{{$texto}}" />
          <input class="focus:border-gray-500 focus:ring-1 focus:ring-gray-500 focus:outline-none  text-sm text-black placeholder-gray-500 border border-blue-700 rounded-md py-2 px-1 " placeholder="Rubro" name="texto_rubro" value="{{$texto_rubro}}" />
          <input type="date" class="focus:border-gray-500 focus:ring-1 focus:ring-gray-500 focus:outline-none  text-sm text-black placeholder-gray-500 border border-blue-700 rounded-md py-2 px-1 " placeholder="dd/mm/aa"  name="texto_vigencia_de_contrato" value="{{$texto_vigencia_de_contrato}}" />
        <button type="submit" class="hover:bg-gray-700 hover:text-gray-200 h-10 flex bg-gray-800 text-gray-200 text-sm px-4 py-2 rounded-md ">        
          <svg width="20" height="20" fill="currentColor" class=" text-green-400  animate-pulse">
            <path fill-rule="evenodd"  clip-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
          </svg>     
        </button>
       

        </div>
        
      </form>
</div>
