<?php

$dishes = [
    ['id' => '1','category_id' => '1', 'title' => 'Croustillant de St Jacques', 'description' => 'Noix de Saint Jacques Croustillantes, Combawa et Coriandre Fraîche, Salade de Nouilles Chinoises et Cacahuètes', 'price' => '28', 'image' => 'https://img.mesrecettesfaciles.fr/2020-01/noix-de-saint-jacques-beurre-1.jpg' ],
    ['id' => '2','category_id' => '1', 'title' => 'Soufflé de Cointreau', 'description' => 'Soufflé au Cointreau et sa Glace, Tuile craquante', 'price' => '17', 'image' => 'https://www.anjou-tourisme.com/sites/public_files/styles/bandeau_325/public/upload/bandeau/Le_Souffle_au_Cointreau-AnjouTourisme-%28c%29Benoit_MARTIN-1920px.JPG?itok=evhS1kWp' ],
    ['id' => '3','category_id' => '1', 'title' => 'Cervelle de Veau', 'description' => 'Cervelle de Veau cuisinée au vinaigre de Framboises', 'price' => '34', 'image' => 'https://horecamagazine.be/wp-content/uploads/2021/01/GERECHT_0000_HM207_Bioul-014-1280x640_0004_HMxxx_LesEleveurs-014.jpg' ]
];


$menus = [
    ['id' => '1', 'title' => 'Menu Vivaldi', 'description' => 'Entrée - Plat ou Plat - Dessert', 'price' => '78' ],
    ['id' => '2', 'title' => 'Menu Gourmand', 'description' => 'Entrée - Plat', 'price' => '80'],
    ['id' => '3', 'title' => 'Menu Saison', 'description' => 'Entrée - Plat -Dessert', 'price' => '56' ]
];

$categories = [
    ['id' => '1', 'title' => 'Entrée'],
    ['id' => '2', 'title' => 'Plat'],
    ['id' => '3', 'title' => 'Dessert']
];


/**
 * $id = $_GET['id];
 * 
 * <?= $dish[$id]['title'] ?>
 * 
 * / 