<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
       
            //administrator
        [
        'name' => 'admin mnyone',
        'email' => 'admin@gmail.com',
        'phone' => '0758564018',
        'address'=>'Kisasa,Dodoma',
        'photo'=> 'NULL',
        'password' => Hash::make('123'),
        'role' => 'administrator',
        ],

        //technician
       [
        'name' => 'technician mnyone',
        'email' => 'technician@gmail.com',
        'phone' => '0758564018',
        'address'=>'Kisasa,Dodoma',
        'photo'=> 'NULL',
        'password' => Hash::make('123'),
        'role' => 'technician',
       ],

        //engineer
        [
        'name' => 'engineer mnyone',
        'email' => 'engineer@gmail.com',
        'phone' => '0758564018',
        'address'=>'Kisasa,Dodoma',
        'photo'=> 'NULL',
        'password' => Hash::make('123'),
        'role' => 'engineer',
        ],
        

       ]);
    }
}
