<?php  use App\Models\User;     ?>

<x-app-layout>


    




   

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 bg-gray-300 ">

      <h1 class="text-2xl font-bold">{{$category->name}}</h1>
      <br>
        
      <section >
        <header class="flex items-center justify-between">
          <form class="relative w-10/12">
            <svg width="20" height="20" fill="currentColor" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-800">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
            </svg>
            <input class="focus:border-gray-500 focus:ring-1 focus:ring-gray-500 focus:outline-none w-full text-sm text-black placeholder-gray-500 border border-gray-200 rounded-md py-2 pl-10" placeholder="Filter projects" />
          </form>
          <button class="hover:bg-gray-200 hover:text-gray-800 h-10 flex bg-gray-800 text-gray-200 text-sm px-4 py-2 rounded-md">
            <svg class="group-hover:text-gray-600 text-gray-500 mr-2" width="12" height="20" fill="currentColor">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M6 5a1 1 0 011 1v3h3a1 1 0 110 2H7v3a1 1 0 11-2 0v-3H2a1 1 0 110-2h3V6a1 1 0 011-1z"/>
            </svg>
            <strong>New</strong>
          </button>
          
        </header>
        <br>
        
     
          
            <div class="flex flex-col py-3">
             
             <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
               <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                 <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                   <table class="min-w-full divide-y divide-gray-200">
                     <thead class="bg-gray-800">
                       <tr>
                         <th scope="col" class="px-6 py-3 text-left font-medium text-gray-100 text-sm uppercase tracking-wider">
                           direccion 
                           
                         </th>
                         <th scope="col" class="px-6 py-3 text-left font-medium text-gray-100 text-sm uppercase tracking-wider">
                           Tipo de escrito
                           <br>
                           
                         </th>
                         <th scope="col" class="px-6 py-3 text-left  font-medium text-gray-100 text-sm uppercase tracking-wider">
                           Locador
                         </th>
                         <th scope="col" class="px-6 py-3 text-left  font-medium text-gray-100 text-sm uppercase tracking-wider">
                           Locatario
                         </th>
                         <th scope="col" class="relative px-6 py-3">
                           <span class="sr-only">Edit</span>
                         </th>
                         
                       </tr>
                     </thead>
                     <tbody class="bg-white divide-y divide-gray-200">
         
                         @foreach ($posts as $posts)
                         <?php if (Auth::user()->currentTeam->id == $posts->team_id) { ?>
                       
                       <tr>
                           
                         <td class="px-6 py-4 whitespace-nowrap">
                           <div class="flex items-center">
                             <div class="ml-4">
                               <div class="text-sm font-medium text-gray-900">
                                 {{$posts->direccion}}
                               </div>
                               <div class="text-sm text-gray-500">
                               Creado por: {{ User::find($posts->user_id)->name}} | Fecha{{$posts->created_at}}
                               </div>
                             </div>
                           </div>
                         </td>
                         <td class="px-6 py-4 whitespace-nowrap">
                           <div class="text-sm text-gray-900">{{   $posts->condicionfiscal    }}</div>
                           <div class="text-sm text-gray-500">Optimization</div>
                         </td>
                         <td class="px-6 py-4 whitespace-nowrap">
                           <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                             Active
                           </span>
                         </td>
                         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                           Admin
                         </td>
                         <td>
                         <a href="{{route('posts.show',$posts)}}">
                         <button class="bg-green-400 hover:bg-green-200 rounded-md px-4 py-1 mr-1 text-green-800 ">
                             Editar
                         </button>
                         </a>
                         <a href="/">
                         <button class="bg-red-400 hover:bg-red-200 rounded-md px-2 py-1 text-red-800">
                             Eliminar
                         </button>
                         </a>
                         </td>
                       </tr>
                       <?php } ?>
                       @endforeach
           
                       
                     </tbody>
                   </table>
                 </div>
               </div>
             </div>
             
           </div>
           
         

      
    </div>
</x-app-layout>