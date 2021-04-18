<?php
use Illuminate\Database\Seeder;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create 1 user using the user factory
        factory(App\User::class, 1)->create();
    }
}
