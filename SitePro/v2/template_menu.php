
<?php
    function renderMenuToHTML($currentPageId) {
    // un tableau qui d'efinit la structure du site
        $mymenu = array(
        // idPage titre
            'index' => 'Accueil',
            'cv' => 'Cv' ,
            'projets' => 'Mes Projets'
            );

        echo "<nav class='menu'>";
        echo "<h2>Menu</h2>";
        echo "<ul>";
        // ...
        foreach($mymenu as $pageId => $pageParameters) {
            if ($pageId == $currentPageId) {
                // Affiche l'élément du menu avec une classe 'selected' pour la page courante
                echo "<li><a href='$pageId.php'>{$pageParameters}</a></li>";
            } else {
                // Affiche les autres éléments du menu
                echo "<li><a href='$pageId.php'>{$pageParameters}</a></li>";
            }
        }
        echo "</ul>";  
        echo "</nav>";
    }
?>
