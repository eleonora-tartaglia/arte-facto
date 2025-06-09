<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

class ArticleFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'locality' => fake()->city(),
            'category_id' => Category::inRandomOrder()->first()?->id ?? 1, // 🧙‍♂️ Sécurité si pas encore seedé
            'description' => fake()->paragraph(4),
            'price' => fake()->randomFloat(2, 500, 15000),
            'image' => fake()->randomElement([
                'https://cdn.midjourney.com/9c50c0c6-0cae-4cd3-bb59-94e33a3e0430/0_2.png',
                'https://cdn.midjourney.com/f0325806-e437-4bad-8d33-90938d953563/0_1.png',
                'https://cdn.midjourney.com/9afba89d-12ac-451a-8ed8-40243979cdfe/0_2.png',
                'https://cdn.midjourney.com/1caee229-c700-4c62-8e92-45947f1e1bc2/0_1.png',
                'https://cdn.midjourney.com/c703df3a-421d-4503-b7d4-a240122bc381/0_3.png',
                'https://cdn.midjourney.com/946212ab-2f35-4bec-8e69-ef9ad4ec4ade/0_3.png',
            ]),
            'status' => fake()->randomElement(['available', 'sold', 'in_cart']),
            'type' => fake()->randomElement(['immediate', 'auction']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
