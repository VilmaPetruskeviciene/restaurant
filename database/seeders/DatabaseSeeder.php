<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $time = Carbon::now();
        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('123'),
            'created_at' => $time,
            'updated_at' => $time,
            'role' => 1
        ]);
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'),
            'created_at' => $time,
            'updated_at' => $time,
            'role' => 10
        ]);

        foreach(['Vanille', 'Grilis', 'Džiaugsmas', 'Nineteen', 'Amandus'] as $rest) {
            DB::table('restoranas')->insert([
                'title' => $rest,
                'town' => 'Vilnius',
                'address' => 'Krivių 5',
                'work_time' => '11 - 22',
                'created_at' => $time->addSeconds(1),
                'updated_at' => $time
            ]);
        }

        
        foreach([
            'Vištos krūtinėlių suktinukai',
            'Maltos kiaulienos terinas su žirneliais',
            'Ėrienos šonkauliukai su pistacijomis',
            'Pilno grūdo spagečiai su pievagrybiais',
            'Karka su daržovėmis',
            'Netikras zuikis iš maltos vištienos',
            'Antiena su aštriu šokolado padažu',
            'Jautienos kepsnys tešloje'
        ] as $patiekalas) {
            DB::table('patiekalas')->insert([
                'title' => $patiekalas,
                'price' => rand(100, 1000) / 100,
                'restoranas_id' => rand(1, 5),
                'created_at' => $time->addSeconds(1),
                'updated_at' => $time
            ]);
        }
    }
}
