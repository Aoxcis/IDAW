<?php
/*
 * Plugin Name: Premier
 */

function afficher_heure() {
    $heure = date('H:i:s');
    return "<p>Il est $heure</p>";
}

function shortcode_heure() {
    return afficher_heure();
}

add_shortcode('heure', 'shortcode_heure');