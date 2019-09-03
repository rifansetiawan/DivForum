<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::tambah_user("Luke","admin@div.com","admin","0875442556","Jalan Ikan Kue no 40","Pria","20-01-1996","logo.png","Admin");
    }
}
