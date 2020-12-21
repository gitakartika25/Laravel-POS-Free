<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

     $admin = new \App\User;
 $admin->name = "administrator";
 $admin->email = "admin@gmail.com";
 $admin->password = \Hash::make("admin123");
 $admin->roles = "Administrator";
 $admin->save();
 $this->command->info("Admin berhasil ditambah");
 
    }
}
