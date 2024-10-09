<?php
require_once('template_header.php');
?>


<body>
    <div class="flex-titre-logo">
        <h1 class="titre">SitePro</h1>
        <img class="logo" src="images/escargot.png" alt="Mon image">
    </div>
    <div class="flex-menu-content">
    <nav class="menu">
            <h2>Menu</h2>
            <ul>
                <?php
                    require_once('template_menu.php');
                    renderMenuToHTML('cv');
                ?>
            </ul>
        </nav>
    
    
        <div class="content">
            <h2>CV</h2>
            <p>Voici mon CV :</p>
            <img src="images/cv.png" alt="Mon CV">
        </div>
    </div>

    <?php 
        require_once('template_footer.php');
    ?>
</body>
</html>