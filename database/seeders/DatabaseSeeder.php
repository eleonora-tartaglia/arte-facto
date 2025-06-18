<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 🔐 Utilisateurs
        User::factory()->create([
            'name' => 'Lara Croft',
            'email' => 'lara@example.com',
            'password' => Hash::make('lara'),
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Indiana Jones',
            'email' => 'indy@example.com',
            'password' => Hash::make('indi'),
            'role' => 'user',
        ]);

        User::factory()->create([
            'name' => 'Howard Carter',
            'email' => 'carter@example.com',
            'password' => Hash::make('ankh'),
            'role' => 'user',
        ]);
        
        User::factory()->create([
            'name' => 'Evelyn Carnahan',
            'email' => 'evelyn@example.com',
            'password' => Hash::make('scroll'),
            'role' => 'user',
        ]);

        // 📂 Catégories avec descriptions
        $artAfricain = Category::create([
            'name' => 'Art Africain',
            'description' => 'Masques, sculptures et objets rituels issus de l’Afrique subsaharienne, témoins d’un art sacré et ancestral.',
        ]);

        $egypte = Category::create([
            'name' => 'Égypte Antique',
            'description' => 'Trésors des pharaons, objets sacrés du Nil et vestiges du culte des dieux égyptiens, entre mythe et réalité.',
        ]);

        $grece = Category::create([
            'name' => 'Grèce Antique',
            'description' => 'Artefacts des cités grecques, offrandes aux dieux de l’Olympe et chefs-d’œuvre d’un art classique éternel.',
        ]);

        $precolombien = Category::create([
            'name' => 'Arts Précolombiens',
            'description' => 'Reliques des civilisations mésoaméricaines : Maya, Inca, Olmèques... entre or, jade et cosmogonie.',
        ]);

        $atlante = Category::create([
            'name' => 'Civilisation Atlante',
            'description' => 'Objets énigmatiques attribués à l’Atlantide disparue, témoignages d’une science oubliée et d’un peuple englouti.',
        ]);

        $mesopotamie = Category::create([
            'name' => 'Mésopotamie Ancienne',
            'description' => 'Objets issus des premières civilisations de Sumer, Babylone et Assur. Témoins matériels d’un monde où les dieux côtoyaient les scribes, entre argile, cuivre et symboles étoilés.',
        ]);

        // 🖼️ Articles historiques
        Article::insert([
            [
                'title' => 'Masque Tribu Fang',
                'locality' => 'Cameroun',
                'category_id' => $artAfricain->id,
                'description' => 'Masque Fang du XIXe siècle, utilisé pour des rituels de justice. Bois noirci, gravures géométriques, présence mystique des ancêtres palpable dans chaque courbe.',
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
                'category_id' => $egypte->id,
                'description' => 'Statuette en bronze représentant Anubis. Culte funéraire du Nouvel Empire. Inscriptions hiéroglyphiques et détails minutieux liés à l’au-delà et à la pesée de l’âme.',
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
                'category_id' => $grece->id,
                'description' => 'Coupe de banquet antique ornée de scènes de Dionysos. Céramique à figures rouges, finesse hellénique incarnée, témoin vivant des festins antiques.',
                'price' => 3200,
                'image' => 'https://cdn.midjourney.com/4a7988d3-ea52-4842-ae10-1534691ea662/0_3.png',
                'status' => 'available',
                'type' => 'immediate',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Masque Maya',
                'locality' => 'Tikal',
                'category_id' => $precolombien->id,
                'description' => 'Masque cérémoniel en jade et obsidienne, porté lors de rituels royaux. Relié aux divinités solaires mayas, pièce sacrée de l’élite.',
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
                'category_id' => $precolombien->id,
                'description' => 'Masque funéraire en or et turquoise, symbole de pouvoir impérial. Trouvé dans une tombe royale, chargé d’énergie cosmique inca.',
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
                'category_id' => $artAfricain->id,
                'description' => 'Sculpture royale en bronze de l’ancien royaume d’Edo. Symbole de pouvoir, hommage aux Obas béninois, finesse technique remarquable.',
                'price' => 7500,
                'image' => 'https://cdn.midjourney.com/989a41f8-81b9-4f58-bdf2-6ea1ef166e4e/0_3.png',
                'status' => 'available',
                'type' => 'immediate',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Fragment Atlante',
                'locality' => 'Mer Méditerranée',
                'category_id' => $atlante->id,
                'description' => 'Bas-relief mystérieux en orichalque, trouvé en profondeur près de Santorin. Relié aux mythes de Poséidon et de l’Atlantide. Trace d’un monde englouti.',
                'price' => 10100,
                'image' => 'https://cdn.midjourney.com/e91eb5d4-6681-4116-b3fb-c6b775507df9/0_1.png',
                'status' => 'available',
                'type' => 'auction',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Totem Dogon',
                'locality' => 'Mali',
                'category_id' => $artAfricain->id,
                'description' => 'Totem de bois sculpté à la main, représentant les esprits des ancêtres Dogons. Servait à protéger les villages des mauvais esprits. Figures élancées et géométrie mystique.',
                'price' => 2900,
                'image' => 'https://cdn.midjourney.com/bdcb02ab-6b53-45a6-a0c3-356589f65034/0_0.png',
                'status' => 'available',
                'type' => 'immediate',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Œil d’Horus en Lapis',
                'locality' => 'Louxor',
                'category_id' => $egypte->id,
                'description' => 'Amulette protectrice en lapis-lazuli. Porte-bonheur porté par les prêtres égyptiens. Symbole de régénération, décorée d’or et de lignes gravées.',
                'price' => 3600,
                'image' => 'https://cdn.midjourney.com/af9af385-f577-4f96-966f-031780511a1b/0_2.png',
                'status' => 'available',
                'type' => 'auction',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Casque Corinthien',
                'locality' => 'Sparte',
                'category_id' => $grece->id,
                'description' => 'Casque en bronze corinthien, orné de plumes. Pièce utilisée lors des batailles de la Grèce antique. Lignes élégantes et aura guerrière.',
                'price' => 5300,
                'image' => 'https://cdn.midjourney.com/c2cd4e1d-8d28-4347-99c3-028a75448f03/0_1.png',
                'status' => 'available',
                'type' => 'immediate',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Urne Zapotèque',
                'locality' => 'Monte Albán',
                'category_id' => $precolombien->id,
                'description' => 'Urne funéraire représentant un dieu zapotèque. Céramique grise et détails symboliques de la mort et de la fertilité. Élément central des rites ancestraux.',
                'price' => 4800,
                'image' => 'https://cdn.midjourney.com/3d06f67f-f73d-476f-a260-2e6740c134f0/0_1.png',
                'status' => 'available',
                'type' => 'auction',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Talisman Nok',
                'locality' => 'Nigéria',
                'category_id' => $artAfricain->id,
                'description' => 'Talisman en terre cuite de la civilisation Nok. Représente une figure hybride mi-homme mi-animal. Porte la mémoire de rites oubliés.',
                'price' => 3100,
                'image' => 'https://cdn.midjourney.com/fd48e6eb-e127-4f6f-b706-3e793a162c7d/0_2.png',
                'status' => 'available',
                'type' => 'immediate',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Médaillon du Soleil Mochica',
                'locality' => 'Pérou',
                'category_id' => $precolombien->id,
                'description' => 'Médaillon circulaire en or massif représentant le dieu solaire mochica. Utilisé par la royauté pour canaliser la puissance céleste.',
                'price' => 9900,
                'image' => 'https://cdn.midjourney.com/84566bd2-0cae-46ba-97ca-052d8e454245/0_1.png',
                'status' => 'available',
                'type' => 'auction',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Idole Cycladique',
                'locality' => 'Îles Cyclades',
                'category_id' => $grece->id,
                'description' => 'Sculpture minimaliste en marbre blanc, représentation féminine datant de 2800 av. J.-C. Élégance pure et mystère des origines européennes.',
                'price' => 4500,
                'image' => 'https://cdn.midjourney.com/49e165c3-026b-40a5-9c1c-931303ab9ac4/0_2.png',
                'status' => 'available',
                'type' => 'immediate',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Tablette d’Uruk',
                'locality' => 'Irak',
                'category_id' => $mesopotamie->id,
                'description' => 'Plaquette en argile gravée de signes proto-cunéiformes. Utilisée pour des comptes administratifs au sein des temples sumériens. Une des premières formes d’écriture de l’humanité.',
                'price' => 3900,
                'image' => 'https://cdn.midjourney.com/55ac4648-68b7-449e-bdb0-0f2336bc9cf8/0_0.png',
                'status' => 'available',
                'type' => 'immediate',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Sceau Cylindrique Akkadien',
                'locality' => 'Akkad',
                'category_id' => $mesopotamie->id,
                'description' => 'Sceau cylindrique en pierre dure gravé de scènes rituelles akkadiennes. Utilisé pour signer les tablettes d’argile en les roulant dessus. Motifs complexes : divinités, animaux et inscriptions.',
                'price' => 6200,
                'image' => 'https://cdn.midjourney.com/7ac9dfe1-8a15-469f-b41d-8fc6501599a8/0_3.png',
                'status' => 'available',
                'type' => 'auction',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ]);

        // 🌀 Articles générés automatiquement (faux articles)
        // Article::factory()->count(6)->create();
    }
}

