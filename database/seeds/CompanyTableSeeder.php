<?php

use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Company::class, 5)->create()->each(function($u) {
            $u->employes()->save(factory(App\Models\Employe::class)->make());
            $u->positions()->save(factory(App\Models\Position::class)->make());
            // $u->comments()->save(factory(App\Models\Comment::class)->make());

        });
    }
}
