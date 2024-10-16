
<?php
    function renderMenuToHTML($currentPageId, $currentLanguage) {
    // un tableau qui d'efinit la structure du site
        $mymenu = array(
        // idPage titre
            'accueil' => array('fr' => 'Accueil', 'en' => 'Home'),
            'cv' => array('fr' => 'Cv', 'en' => 'Resume'),
            'projets' => array('fr' => 'Mes Projets', 'en' => 'My Projects'),
            'contact' => array('fr' => 'Contact', 'en' => 'Contact')
            );
        echo "<nav class='menu'>";
        echo "<h2>Menu</h2>";
        echo "<ul>";
        // ...
        foreach($mymenu as $pageId => $pageParameters) {
            $title = $pageParameters[$currentLanguage];
            if ($pageId == $currentPageId) {
                // Affiche l'élément du menu avec une classe 'selected' pour la page courante
                echo "<li><a href='index.php?page=$pageId&lang=$currentLanguage'>{$title}</a></li>";
            } else {
                // Affiche les autres éléments du menu
                echo "<li><a href='index.php?page=$pageId&lang=$currentLanguage'>{$title}</a></li>";
            }
        }
        echo "</ul>";  
        echo "</nav>";
    }
?>
