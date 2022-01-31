<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Attendance;

class AttendancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => '1',
            'start_attendance' => '2022-01-16 10:00:00',
            'end_attendance' => '2022-01-16 20:00:00',
        ];
        Attendance::insert($param);

        $param = [
            'user_id' => '2',
            'start_attendance' => '2022-01-16 10:00:10',
            'end_attendance' => '2022-01-16 20:00:00',
        ];
        Attendance::insert($param);
        $param = [
            'user_id' => '3',
            'start_attendance' => '2022-01-16 10:00:20',
            'end_attendance' => '2022-01-16 20:00:00',
        ];
        Attendance::insert($param);
        $param = [
            'user_id' => '4',
            'start_attendance' => '2022-01-16 10:00:30',
            'end_attendance' => '2022-01-16 20:00:00',
        ];
        Attendance::insert($param);
        $param = [
            'user_id' => '5',
            'start_attendance' => '2022-01-16 10:00:40',
            'end_attendance' => '2022-01-16 20:00:00',
        ];
        Attendance::insert($param);
        $param = [
            'user_id' => '6',
            'start_attendance' => '2022-01-16 10:00:50',
            'end_attendance' => '2022-01-16 20:00:00',
        ];
        Attendance::insert($param);
        $param = [
            'user_id' => '1',
            'start_attendance' => '2022-01-17 10:00:00',
            'end_attendance' => '2022-01-17 20:00:00',
        ];
        Attendance::insert($param);

        $param = [
            'user_id' => '2',
            'start_attendance' => '2022-01-17 10:00:00',
            'end_attendance' => '2022-01-17 20:00:00',
        ];
        Attendance::insert($param);
        $param = [
            'user_id' => '3',
            'start_attendance' => '2022-01-17 10:00:00',
            'end_attendance' => '2022-01-17 20:00:00',
        ];
        Attendance::insert($param);
        $param = [
            'user_id' => '4',
            'start_attendance' => '2022-01-17 10:00:00',
            'end_attendance' => '2022-01-17 20:00:00',
        ];
        Attendance::insert($param);
        $param = [
            'user_id' => '5',
            'start_attendance' => '2022-01-17 10:00:00',
            'end_attendance' => '2022-01-17 20:00:00',
        ];
        Attendance::insert($param);
        $param = [
            'user_id' => '6',
            'start_attendance' => '2022-01-17 10:00:00',
            'end_attendance' => '2022-01-17 20:00:00',
        ];
        Attendance::insert($param);

        $param = [
            'user_id' => '1',
            'start_attendance' => '2022-01-18 10:00:00',
            'end_attendance' => '2022-01-18 20:00:00',
        ];
        Attendance::insert($param);

        $param = [
                'user_id' => '2',
                'start_attendance' => '2022-01-18 10:00:00',
                'end_attendance' => '2022-01-18 20:00:00',
            ];
        Attendance::insert($param);
        $param = [
            'user_id' => '3',
            'start_attendance' => '2022-01-18 10:00:00',
            'end_attendance' => '2022-01-18 20:00:00',
        ];
        Attendance::insert($param);
        $param = [
            'user_id' => '4',
            'start_attendance' => '2022-01-18 10:00:00',
            'end_attendance' => '2022-01-18 20:00:00',
        ];
        Attendance::insert($param);
        $param = [
            'user_id' => '5',
            'start_attendance' => '2022-01-18 10:00:00',
            'end_attendance' => '2022-01-18 20:00:00',
        ];
        Attendance::insert($param);
        $param = [
            'user_id' => '6',
            'start_attendance' => '2022-01-18 10:00:00',
            'end_attendance' => '2022-01-18 20:00:00',
        ];
        Attendance::insert($param);
        $param = [
            'user_id'=>'1',
            'start_attendance' => '2022-01-19 10:00:00',
            'end_attendance' => '2022-01-19 20:00:00',
        ];
        Attendance::insert($param);

        $param = [
            'user_id' => '2',
            'start_attendance' => '2022-01-19 10:00:00',
            'end_attendance' => '2022-01-19 20:00:00',
        ];
        Attendance::insert($param);
        $param = [
            'user_id' => '3',
            'start_attendance' => '2022-01-19 10:00:00',
            'end_attendance' => '2022-01-19 20:00:00',
        ];
        Attendance::insert($param);
        $param = [
            'user_id' => '4',
            'start_attendance' => '2022-01-19 10:00:00',
            'end_attendance' => '2022-01-19 20:00:00',
        ];
        Attendance::insert($param);
        $param = [
            'user_id' => '5',
            'start_attendance' => '2022-01-19 10:00:00',
            'end_attendance' => '2022-01-19 20:00:00',
        ];
        Attendance::insert($param);
        $param = [
            'user_id' => '6',
            'start_attendance' => '2022-01-19 10:00:00',
            'end_attendance' => '2022-01-19 20:00:00',
        ];
        Attendance::insert($param);

        
    }
}
