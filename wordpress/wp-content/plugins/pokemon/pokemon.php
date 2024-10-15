<?php
/*
    * Plugin Name: Pokemon
*/




function get_pokemon_normal(){
    $url = 'https://pokeapi.co/api/v2/pokemon/'.rand(151, 252);
    $response = wp_remote_get($url);

    if(is_wp_error($response)){
        return "Error fetching pokemon data";
    }

    $body = wp_remote_retrieve_body($response);
    $pokemon = json_decode($body, true);

    if(!empty($pokemon) && isset($pokemon['name'])){
        return "<p style='font-size:300%; text-align:center;'> Le pokemon est : ".ucfirst($pokemon['name'])."</p>".
        "<img style='width: 150px; height: 150px;' class='img_pokemon' src='".$pokemon['sprites']['front_default']."'>".
        "<img style='width: 150px; height: 150px;' class='img_pokemon' src='".$pokemon['sprites']['front_shiny']."'>".
        "<p style='font-size:150%; text-align:center;'> Le pokemon est de type : ".$pokemon['types'][0]['type']['name']."</p>".
        "<audio controls autoplay>".
        "<source src='".$pokemon['cries']['latest']."' type='audio/ogg'>".
        "</audio>";
    
    }else{
        return "No pokemon found";
    }
}




add_shortcode('show_pokemon', 'get_pokemon_normal');