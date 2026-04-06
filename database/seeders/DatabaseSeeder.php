<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Appointment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin user (same password hash as original MySQL dump)
        User::firstOrCreate(
            ['email' => 'admin@movewell.com'],
            [
                'name' => 'Admin',
                'is_admin' => true,
                'password' => '$2y$12$kddRhMaDgPMSx63OgKhCh.0A1yDWIZ5dSV.l6R0ZqlOJ2vJoh1Uf2',
                'created_at' => '2026-03-31 03:42:44',
                'updated_at' => '2026-04-03 02:40:27',
            ]
        );

        // Appointment data from original MySQL dump
        $appointments = [
            [
                'name' => 'test',
                'phone' => '1234567890',
                'service' => 'Knee Surgery',
                'preferred_date' => '2026-04-16',
                'preferred_time' => '10:00 AM - 12:00 PM',
                'status' => 'pending',
                'created_at' => '2026-04-03 08:26:33',
                'updated_at' => '2026-04-03 08:26:33',
            ],
            [
                'name' => 'test order',
                'phone' => '9373111709',
                'service' => 'Knee Surgery',
                'preferred_date' => '2026-04-25',
                'preferred_time' => '10:00 AM - 12:00 PM',
                'status' => 'pending',
                'created_at' => '2026-04-03 08:28:31',
                'updated_at' => '2026-04-03 08:43:31',
            ],
            [
                'name' => 'test',
                'phone' => '7030281823',
                'status' => 'pending',
                'created_at' => '2026-04-03 14:15:24',
                'updated_at' => '2026-04-03 14:15:24',
            ],
            [
                'name' => 'new',
                'phone' => '34333131311',
                'service' => 'Hip Surgery',
                'preferred_date' => '2026-04-23',
                'preferred_time' => '12:00 PM - 02:00 PM',
                'status' => 'pending',
                'created_at' => '2026-04-03 14:30:17',
                'updated_at' => '2026-04-03 14:30:17',
            ],
        ];

        foreach ($appointments as $appointment) {
            Appointment::firstOrCreate(
                ['phone' => $appointment['phone'], 'created_at' => $appointment['created_at']],
                $appointment
            );
        }
    }
}
