<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::factory()->create([
            'name' => 'Lara Croft',
            'email' => 'lara@example.com',
            'password' => Hash::make('lara'),
            'role' => 'admin',
        ]);

        // Utilisateur simple
        User::factory()->create([
            'name' => 'Indiana Jones',
            'email' => 'indy@example.com',
            'password' => Hash::make('indi'),
            'role' => 'user',
        ]);

        // 🖼️ 8 articles précis
        Article::insert([
            [
                'title' => 'Masque Tribu Fang',
                'locality' => 'Cameroun',
                'category' => 'Artisanat Africain',
                'description' => 'Masque tribal sculpté à la main, XIXe siècle. Gravures géométriques fines.',
                'price' => 1800,
                'image' => 'https://cdn.midjourney.com/4ff414eb-7015-4559-b1f7-49437d36e074/0_1.png',
                'status' => 'available',
                'type' => 'immediate',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Statuette d\'Anubis',
                'locality' => 'Égypte',
                'category' => 'Égypte Antique',
                'description' => 'Statuette en bronze, Nouvel Empire. Gravures hiéroglyphiques, culte de Râ.',
                'price' => 8500,
                'image' => 'https://cdn.midjourney.com/4d61902e-3e29-4836-8536-d5fd6b73bb52/0_1.png',
                'status' => 'available',
                'type' => 'auction',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Kylix Athénien',
                'locality' => 'Athènes',
                'category' => 'Grèce Antique',
                'description' => 'Coupe de symposium avec scènes de Dionysos. Céramique noire et rouge.',
                'price' => 3200,
                'image' => 'https://cdn.midjourney.com/4a7988d3-ea52-4842-ae10-1534691ea662/0_3.png',
                'status' => 'in_cart',
                'type' => 'immediate',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Masque Maya',
                'locality' => 'Tikal',
                'category' => 'Art précolombiens',
                'description' => 'Masque cérémoniel en jade et obsidienne, utilisé dans les rituels royaux.',
                'price' => 4200,
                'image' => 'https://cdn.midjourney.com/ae925cb6-d28f-4c4e-a150-5176b43cbf3c/0_2.png',
                'status' => 'available',
                'type' => 'auction',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Masque Inca',
                'locality' => 'Cuzco',
                'category' => 'Art précolombiens',
                'description' => 'Masque funéraire en or et turquoise découvert dans une tombe impériale.',
                'price' => 6200,
                'image' => 'https://cdn.midjourney.com/58ab26f2-a77f-4b16-b012-7382eacfdbce/0_1.png',
                'status' => 'available',
                'type' => 'auction',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Tête Bénin',
                'locality' => 'Bénin',
                'category' => 'Artisanat Africain',
                'description' => 'Sculpture en bronze provenant de l’ancien royaume d’Edo, symbole de royauté.',
                'price' => 7500,
                'image' => 'https://cdn.midjourney.com/989a41f8-81b9-4f58-bdf2-6ea1ef166e4e/0_3.png',
                'status' => 'available',
                'type' => 'immediate',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Couronne Royale',
                'locality' => 'Yoruba',
                'category' => 'Artisanat Africain',
                'description' => 'Coiffe cérémonielle incrustée de perles et de symboles cosmiques.',
                'price' => 9200,
                'image' => 'https://cdn.midjourney.com/fa3ca222-56a3-4ab5-a249-aaa661ffbe7b/0_0.png',
                'status' => 'available',
                'type' => 'auction',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Fragment Atlante',
                'locality' => 'Mer Méditerranée',
                'category' => 'Civilisation Atlante',
                'description' => 'Fragment de bas-relief retrouvé en profondeur, supposé appartenir à Oricalque.',
                'price' => 10100,
                'image' => 'https://cdn.midjourney.com/e91eb5d4-6681-4116-b3fb-c6b775507df9/0_1.png',
                'status' => 'available',
                'type' => 'auction',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // 🌀 Faux articles
        Article::factory()->count(6)->create();
    }
}
