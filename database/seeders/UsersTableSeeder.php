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
            'email' => '11111111@example.com ',
            'password' => Hash::make('11111111')
        ];
        User::insert($param);

        $param = [
            'name' => 'テスト次郎',
            'email' => '22222222@example.com ',
            'password' => Hash::make('22222222')
        ];
        User::insert($param);

        $param = [
            'name' => 'テスト三郎',
            'email' => '33333333@example.com ',
            'password' => Hash::make('33333333')
        ];
        User::insert($param);

        $param = [
            'name' => 'テスト四郎',
            'email' => '44444444@example.com ',
            'password' => Hash::make('44444444')
        ];
        User::insert($param);
        $param = [
            'name' => 'テスト五郎',
            'email' => '55555555@example.com ',
            'password' => Hash::make('55555555')
        ];
        User::insert($param);
    }
}
