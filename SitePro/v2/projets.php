<?php
require_once('template_header.php');
?>


<body>
    <div class="flex-titre-logo">
        <h1 class="titre">SitePro</h1>
        <img class="logo" src="images/escargot.png" alt="Mon image">
    </div>
    <div class="flex-menu-content">
        <?php
            require_once('template_menu.php');
        ?>
    
    
        <div class="content">
            <h2>Projets : </h2>
            <div class="projet">
                
                <h3>Space Invaders</h3>
                <p>Voici un projet de jeu en pharo</p>
                <video width="480" height="360" controls>
                    <source src="videos/SpaceInvaders.mp4" type="video/mp4">
                </video>
            </div>

            <div class="projet">
                <h3>SitePro</h3>
                <p>Voici un projet de site web en html et css</p>
                <!-- <video width="480" height="360" controls>
                    <source src="videos/SpaceInvaders.mp4" type="video/mp4">
                </video> -->
            </div> 
        </div>
    </div>

    <?php 
        require_once('template_footer.php');
    ?>
</body>
</html>