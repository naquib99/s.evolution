<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->string('staff_id')->unique();
            $table->string('name');
            $table->string('contact');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('position');
            $table->rememberToken();
            $table->primary('staff_id');
        });
        //kianfei01
        //leeyee02
        //yiwee03
        //cheekin04
        //chris01
        //ronald05
        DB::table('users')->insert([
            ['staff_id' => 'ST001', 'name' => 'Chin Kian Fei', 'contact' => '0123445943', 'email' => 'kianfei@gmail.com', 'password' =>  Hash::make('12345678'), 'position' => 'Staff'],
            ['staff_id' => 'ST002', 'name' => 'Shia Lee Yee', 'contact' => '0160083192', 'email' => 'leeyee@outlook.com', 'password' => Hash::make('12345678'), 'position' => 'Staff'],
            ['staff_id' => 'ST003', 'name' => 'Tan Yi Wee', 'contact' => '0175136689', 'email' => 'yiwee@hotmail.com', 'password' => Hash::make('12345678'), 'position' => 'Staff'],
            ['staff_id' => 'ST004', 'name' => 'Tan Chee Kin', 'contact' => '0121997653', 'email' => 'cheekin@gmail.com', 'password' => Hash::make('12345678'), 'position' => 'Staff'],
            ['staff_id' => 'ST005', 'name' => 'Ronald Lim Sheng Wei', 'contact' => '0168210692', 'email' => 'ronaldlim@outlook.com', 'password' => Hash::make('12345678'), 'position' => 'Staff'],
            ['staff_id' => 'AD001', 'name' => 'Chris Johnson', 'contact' => '0176534492', 'email' => 'chris@hotmail.com', 'password' => Hash::make('12345678'), 'position' => 'Admin'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}