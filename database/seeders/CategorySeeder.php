<?php

namespace Database\Seeders;

use App\Models\Category;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category= new Category();
        $category->name="Propuesta de alquiler";
        $category->slug="Propuesta_de_alquiler";
        $category->save();

        $category2= new Category();
        $category2->name="Reserva de venta";
        $category2->slug="Reserva_de_venta";
        $category2->save();

        $category3= new Category();
        $category3->name="Archivo de documentos";
        $category3->slug="Archivo_de_documentos";
        $category3->save();

        $category4= new Category();
        $category4->name="Contratos por vencer";
        $category4->slug="Contratos_por_vencer";
        $category4->save();

        $category5= new Category();
        $category5->name="Administracion";
        $category5->slug="Administracion";
        $category5->save();

        
    }
}
