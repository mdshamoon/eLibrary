<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
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
       

        

        $admin = User::create(['name' => "Admin",
                                'email'=> "admin@admin.com",
                                'password'=> Hash::make("12345678") ]);
         
        $user = User::create(['name' => "Shamoon",
                                'email'=> "shamoonmalik143@gmail.com",
                                'password'=> Hash::make("12345678") ]);   
                                
        $admin->assignRole('admin');
        $user->assignRole('reader');

                                
    }
}
