<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

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
        $param = [
            'name' => 'test',
            'email' => '12345678@example.com ',
            'password' => Hash::make('12345678')
        ];
        User::insert($param);
        $param = [
            'name' => 'テスト太郎',
            'email' => 'tarou@example.com ',
            'password' => Hash::make('tarou')
        ];
        User::insert($param);

        $param = [
            'name' => 'テスト次郎',
            'email' => 'jirou@example.com ',
            'password' => Hash::make('jirou')
        ];
        User::insert($param);

        $param = [
            'name' => 'テスト三郎',
            'email' => 'saburou@example.com ',
            'password' => Hash::make('saburou')
        ];
        User::insert($param);

        $param = [
            'name' => 'テスト四郎',
            'email' => 'sirou@example.com ',
            'password' => Hash::make('sirou')
        ];
        User::insert($param);
        $param = [
            'name' => 'テスト五郎',
            'email' => 'gorou@example.com ',
            'password' => Hash::make('gorou')
        ];
        User::insert($param);
    }
}
