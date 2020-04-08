<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$user =  User::where('email','ahmed.yousry.nagi12@gmail.com')->first();
          $user =  DB::table('users')->where('email','mohamed.yousry.shabaan12@gmail.com')->get()->first();
          
          if(!$user){
              
              User::create([
                  'name'=>'mohamed',
                  'email'=>'mohamed.yousry.shabaan12@gmail.com',
                  'password'=>Hash::make('mohamed6789'),
              ]); 
              
          }
    }
}
