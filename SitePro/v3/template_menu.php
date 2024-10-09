
<?php
    function renderMenuToHTML($currentPageId, $currentLanguage) {
    // un tableau qui d'efinit la structure du site
        $mymenu = array(
        // idPage titre
            'accueil' => 'Accueil',
            'cv' => 'Cv' ,
            'projets' => 'Mes Projets',
            'contact' => 'Contact'
            );
        echo "<nav class='menu'>";
        echo "<h2>Menu</h2>";
        echo "<ul>";
        // ...
        foreach($mymenu as $pageId => $pageParameters) {
            if ($pageId == $currentPageId) {
                // Affiche l'élément du menu avec une classe 'selected' pour la page courante
                echo "<li><a href='index.php?page=$pageId'>{$pageParameters}</a></li>";
            } else {
                // Affiche les autres éléments du menu
                echo "<li><a href='index.php?page=$pageId'>{$pageParameters}</a></li>";
            }
        }
        echo "</ul>";  
        echo "</nav>";
    }
?>
