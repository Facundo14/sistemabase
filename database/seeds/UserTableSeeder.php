<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Limpiar la tabla
        Permission::truncate();
        Role::truncate();

        User::truncate();

        //Crea usuario Admin y le asigna el rol Admin

        $adminRole = Role::create(['name' => 'Admin','display_name' => 'Administrador']);
        $escritorRole = Role::create(['name' => 'Escritor','display_name' => 'Escritor']);

        $verUsuarioPermission = Permission::create([
            'name' => 'view_usuarios',
            'display_name' => 'Ver usuarios'
        ]);

        $CrearUsuarioPermission = Permission::create([
            'name' => 'create_usuarios',
            'display_name' => 'Crear usuarios'
        ]);

        $ActualizarUsuarioPermission = Permission::create([
            'name' => 'edit_usuarios',
            'display_name' => 'Editar usuarios'
        ]);

        $EliminarUsuarioPermission = Permission::create([
            'name' => 'delete_usuarios',
            'display_name' => 'Eliminar usuarios'
        ]);

        $verRolesPermission = Permission::create([
            'name' => 'view_roles',
            'display_name' => 'Ver  roles'
        ]);

        $CrearRolesPermission = Permission::create([
            'name' => 'create_roles',
            'display_name' => 'Crear roles'
        ]);

        $ActualizarRolesPermission = Permission::create([
            'name' => 'edit_roles',
            'display_name' => 'Editar roles'
        ]);

        $EliminarRolesPermission = Permission::create([
            'name' => 'delete_roles',
            'display_name' => 'Eliminar roles'
        ]);

        $verPermisosPermission = Permission::create([
            'name' => 'view_permisos',
            'display_name' => 'Ver permisos'
        ]);

        $ActualizarPermisosPermission = Permission::create([
            'name' => 'edit_permisos',
            'display_name' => 'Editar permisos'
        ]);

        //
        //Permisos Empresa
        //
        $verEmpresaPermission = Permission::create([
            'name' => 'view_empresas',
            'display_name' => 'Ver empresas'
        ]);

        $CrearEmpresaPermission = Permission::create([
            'name' => 'create_empresas',
            'display_name' => 'Crear empresas'
        ]);

        $ActualizarEmpresaPermission = Permission::create([
            'name' => 'edit_empresas',
            'display_name' => 'Editar empresas'
        ]);

        $EliminarEmpresaPermission = Permission::create([
            'name' => 'delete_empresas',
            'display_name' => 'Eliminar empresas'
        ]);

        //
        //Permisos Paises
        //
        $verPaisPermission = Permission::create([
            'name' => 'view_paises',
            'display_name' => 'Ver paises'
        ]);

        $CrearPaisPermission = Permission::create([
            'name' => 'create_paises',
            'display_name' => 'Crear paises'
        ]);

        $ActualizarPaisPermission = Permission::create([
            'name' => 'edit_paises',
            'display_name' => 'Editar paises'
        ]);

        $EliminarPaisPermission = Permission::create([
            'name' => 'delete_paises',
            'display_name' => 'Eliminar paises'
        ]);

        //
        //Permisos Provincias
        //
        $verProvinciaPermission = Permission::create([
            'name' => 'view_provincias',
            'display_name' => 'Ver provincias'
        ]);

        $CrearProvinciaPermission = Permission::create([
            'name' => 'create_provincias',
            'display_name' => 'Crear provincias'
        ]);

        $ActualizarProvinciaPermission = Permission::create([
            'name' => 'edit_provincias',
            'display_name' => 'Editar provincias'
        ]);

        $EliminarProvinciaPermission = Permission::create([
            'name' => 'delete_provincias',
            'display_name' => 'Eliminar provincias'
        ]);

        //
        //Permisos parámetros
        //
        $VerParametroPermission = Permission::create([
            'name' => 'view_parametros_usuario',
            'display_name' => 'Ver parámetro'
        ]);
        //
        //Permisos parámetros generales
        //
        $VerParametroGeneralesPermission = Permission::create([
            'name' => 'view_parametros_usuario_generales',
            'display_name' => 'Ver parámetros generales'
        ]);


        $admin = new User;

        $admin->username = 'admin';
        $admin->name = 'Facundo';
        $admin->email = 'admin@admin.com';
        $admin->password = '123456';//Aca no se encripta ya que en el modelo User hay un encriptador hecho.
        $admin->dni = 34734593;
        $admin->save();
        $admin->givePermissionTo($VerParametroPermission);
        $admin->givePermissionTo($VerParametroGeneralesPermission);
        $admin->assignRole($adminRole);


        //Crea usuario Escritor y le asigna el rol Escritor


        $escritor = new User;

        $escritor->username = 'user';
        $escritor->name = 'Tanovich';
        $escritor->email = 'user@user.com';
        $escritor->password = '123456';
        $escritor->dni = 32609147;
        $escritor->save();

        $escritor->assignRole($escritorRole);
    }
}
