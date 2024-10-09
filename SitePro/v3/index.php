<?php
    require_once("template_header.php");
    echo "<div class='flex-menu-content'>";
    require_once("template_menu.php");
    $currentPageId = 'accueil';
    $currentLanguage = 'fr';
    if(isset($_GET['page'])) {
        $currentPageId = $_GET['page'];
    }
    if(isset($_GET['lang'])) {
        $currentLanguage = $_GET['lang'];
    }
?>

<?php
    renderMenuToHTML($currentPageId, $currentLanguage);
?>

<section class="corps">
    <?php
    $pageToInclude = $currentPageId . ".php";
    if(is_readable($pageToInclude))
        require_once($pageToInclude);
    else
        require_once("error.php");
    echo "</div>";
    ?>
</section>

<?php
    require_once("template_footer.php");
?>