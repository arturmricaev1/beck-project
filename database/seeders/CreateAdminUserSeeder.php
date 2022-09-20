<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
  
class CreateAdminUserSeeder extends Seeder {
    /**
     * Запустить начальные данные базы данных.
     *
     * @return void
     */
    public function run() {
        $user = User::create([
            'name' => 'ADMIN', 
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $role = Role::create(['name' => 'admin']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}