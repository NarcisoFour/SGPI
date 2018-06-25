<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Desactivar Protección: Asignación de datos en masa');
        Eloquent::unguard();
        $tables = [
            'roles',
            'users',
        ];
        $this->command->info('Vaciando Tablas: ' . implode(',', $tables));
        DB::statement('TRUNCATE TABLE ' . implode(',', $tables) . ' CASCADE;');
        $this->call([
            PermissionsTableSeeder::class,
            UsersTableSeeder::class,
            RolesTableSeeder::class
        ]);
        $this->command->info('Habilitando Protección: Asignación de datos en masa');
        Eloquent::reguard();
        // DB::statement('SET FOREIGN_KEY_CHECKS=0;'); // Mysql
        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
