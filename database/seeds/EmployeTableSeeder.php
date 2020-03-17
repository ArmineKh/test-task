<?php

use Illuminate\Database\Seeder;

class EmployeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         factory(App\Models\Employe::class, 5)->create();
  
    }
}
