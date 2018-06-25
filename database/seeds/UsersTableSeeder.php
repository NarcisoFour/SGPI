<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Creando 4 Usuarios');
        factory(App\User::class, 4)->create();
        $this->command->info('Creando Usuario Base');
        User::create([
            'name' => "Narciso",
            'email' => "narcisofour@gmail.com",
            'password' => bcrypt("admin"),
            'remember_token' => str_random(10),
        ]);
    }
}
