<?php

namespace Database\Seeders;

use App\Models\Equipment;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Administrator',
                'username' => 'admin',
                'password' => Hash::make('password'),
            ]
        );

        $items = [
            ['Carbon Fiber Paddle', 'paddles', 2500, 'Lightweight carbon fiber paddle.', 'available'],
            ['Fiberglass Paddle', 'paddles', 1800, 'Fiberglass face recreational paddle.', 'available'],
            ['Indoor Pickleball Pack', 'balls', 450, 'Pack of indoor pickleballs.', 'available'],
            ['Outdoor Pickleball Pack', 'balls', 500, 'Pack of outdoor pickleballs.', 'unavailable'],
            ['Portable Pickleball Net', 'nets', 5200, 'Portable regulation-size net system.', 'available'],
            ['Replacement Net', 'nets', 2200, 'Replacement net for portable system.', 'unavailable'],
            ['Paddle Grip Tape', 'accessories', 150, 'Replacement overgrip tape.', 'available'],
            ['Pickleball Equipment Bag', 'accessories', 950, 'Storage bag for paddles and balls.', 'unavailable'],
        ];

        foreach ($items as [$name, $category, $price, $description, $status]) {
            Equipment::updateOrCreate(
                ['user_id' => $admin->id, 'equipment_name' => $name],
                [
                    'category' => $category,
                    'unit_price' => $price,
                    'description' => $description,
                    'availability_status' => $status,
                ]
            );
        }
    }
}
