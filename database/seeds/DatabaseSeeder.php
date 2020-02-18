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
        /*\App\User::create(
            [
             'email'=>'jianyong0426@gmail.com',
             'name' =>'jianyong',
             'password'=>bcrypt('123')
            ]
        );
        */
        \App\Product::create(
            [
             'name'=>'cloth',
             'description' =>'100% cotton',
             'price'=>'30.00'
            ]
        );

        
        \App\Product::create(
            [
             'name'=>'shoes',
             'description' =>'leader',
             'price'=>'300.00'
            ]
        );

        
        \App\Product::create(
            [
             'name'=>'caps',
             'description' =>'100% cotton',
             'price'=>'80.00'
            ]
        );
        // $this->call(UsersTableSeeder::class);
        
    }
}
