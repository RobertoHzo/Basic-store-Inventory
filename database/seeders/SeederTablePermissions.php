<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Permission;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeederTablePermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permissions = [

            'ver-usuarios',
            'crear-usuario',
            'editar-usuario',
            'eliminar-usuario',
            //rols table
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'eliminar-rol',

            // table producto
            'ver-productos',
            'crear-producto',
            'editar-producto',
            'eliminar-producto',

            // table proveedor
            'ver-proveedor',
            'crear-proveedor',
            'editar-proveedor',
            'eliminar-proveedor',

            // table area
            'ver-area',
            'crear-area',
            'editar-area',
            'eliminar-area',

            // table categoria
            'ver_categoria',
            'crear-categoria',
            'editar-categoria',
            'eliminar-categoria',

            // table materia_prima
            'ver-materia_prima',
            'crear-materia_prima',
            'editar-materia_prima',
            'eliminar-materia_prima',

            'ver_clientes',

            'ver_pedidos',
            'eliminar_pedidos'
        ];

        foreach ($permissions as $permission){
            Permission::create(['name'=>$permission]);
        }
    }
}
