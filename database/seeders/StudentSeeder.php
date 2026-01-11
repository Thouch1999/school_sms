<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void

    {
                // ❗ Clear students table first
        DB::table('students')->truncate();
        
        DB::table('students')->insert([
          [
                'student_code'  => 'STU001',
                'full_name'     => 'John Doe',
                'gender'        => 'Male',
                'date_of_birth' => '2002-01-15',
                'phone'         => '010111222',
                'email'         => 'john.doe@example.com',
                'address'       => 'Phnom Penh',
                'nationality'   => 'Cambodian',
                'photo'         => null,
                'status'        => 'Active',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'student_code'  => 'STU002',
                'full_name'     => 'Sok Dara',
                'gender'        => 'Male',
                'date_of_birth' => '2001-05-22',
                'phone'         => '010333444',
                'email'         => 'sok.dara@example.com',
                'address'       => 'Kandal',
                'nationality'   => 'Cambodian',
                'photo'         => null,
                'status'        => 'Active',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'student_code'  => 'STU003',
                'full_name'     => 'Srey Neang',
                'gender'        => 'Female',
                'date_of_birth' => '2003-03-10',
                'phone'         => '011555666',
                'email'         => 'srey.neang@example.com',
                'address'       => 'Takeo',
                'nationality'   => 'Cambodian',
                'photo'         => null,
                'status'        => 'Active',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'student_code'  => 'STU004',
                'full_name'     => 'Chan Vuthy',
                'gender'        => 'Male',
                'date_of_birth' => '2000-07-19',
                'phone'         => '012777888',
                'email'         => 'chan.vuthy@example.com',
                'address'       => 'Battambang',
                'nationality'   => 'Cambodian',
                'photo'         => null,
                'status'        => 'Inactive',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'student_code'  => 'STU005',
                'full_name'     => 'Phanith Chan',
                'gender'        => 'Female',
                'date_of_birth' => '2002-09-05',
                'phone'         => '015999000',
                'email'         => 'phanith.chan@example.com',
                'address'       => 'Kampong Cham',
                'nationality'   => 'Cambodian',
                'photo'         => null,
                'status'        => 'Graduated',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'student_code'  => 'STU006',
                'full_name'     => 'Alex Kim',
                'gender'        => 'Other',
                'date_of_birth' => '1999-12-12',
                'phone'         => '016123456',
                'email'         => 'alex.kim@example.com',
                'address'       => 'Phnom Penh',
                'nationality'   => 'Korean',
                'photo'         => null,
                'status'        => 'Active',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'student_code'  => 'STU007',
                'full_name'     => 'Maria Lopez',
                'gender'        => 'Female',
                'date_of_birth' => '2001-06-30',
                'phone'         => '017456789',
                'email'         => 'maria.lopez@example.com',
                'address'       => 'Siem Reap',
                'nationality'   => 'Spanish',
                'photo'         => null,
                'status'        => 'Suspended',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'student_code'  => 'STU008',
                'full_name'     => 'David Lee',
                'gender'        => 'Male',
                'date_of_birth' => '2000-04-08',
                'phone'         => '018888999',
                'email'         => 'david.lee@example.com',
                'address'       => 'Phnom Penh',
                'nationality'   => 'American',
                'photo'         => null,
                'status'        => 'Active',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
        ]);

    }
}
