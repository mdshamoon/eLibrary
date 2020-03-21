<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole= Role::where('name','admin')->first();
        $userRole= Role::where('name','user')->first();

        $admin = User::create(['name' => "Admin",
                                'email'=> "admin@admin.com",
                                'password'=> Hash::make("12345678") ]);
         
        $user = User::create(['name' => "Shamoon",
                                'email'=> "shamoon@gmail.com",
                                'password'=> Hash::make("12345678") ]);   
                                
        $admin->roles()->attach($adminRole);
        $user->roles()->attach($userRole);
                                
    }
}
