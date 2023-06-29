<nav id="main-navbar">
        <div class="container">
          <div class="logo-search">
            <a href="<?php echo URLROOT; ?>/accueil"><img src="<?php echo URLROOT; ?>/public/images/logo.png" alt="acmefes news logo" class="logo"></a>
            <form action="<?php echo URLROOT; ?>/posts/resultat" id="search-form" method="post">
                <input type="search" name="content" placeholder="Rechercher un article">
                <!-- Make the a tag behave as a submit button -->
                <a href="javascript:{}" onclick="document.getElementById('search-form').submit();"><i class="fas fa-search"></i></a>
            </form>
          </div>
            <ul>
              <li><a class="<?php $data['current_home'] ? print($data['current_home']) : '';?>" href="<?php echo URLROOT; ?>/accueil">Accueil</a></li>
              <li><a href="<?php echo URLROOT; ?>/apropos" class="<?php $data['current_about'] ? print($data['current_about']) : '';?>">A propos</a></li>

                <?php if(isloggedIn()) { ?>

                    <li><a class="text-lowercase <?php $data['current_dashboard'] ? print($data['current_dashboard']) : '';?>" href="<?php echo URLROOT; ?>/posts/index">dashboard</a></li>
<!--                    <li><a class="text-lowercase --><?php //$data['current_profile'] ? print($data['current_profile']) : '';?><!--" href="--><?php //echo URLROOT; ?><!--/utilisateurs/profile">profile</a></li>-->
                    <li><a class="text-lowercase <?php $data['current_deconnexion'] ? print($data['current_deconnexion']) : '';?>" href="<?php echo URLROOT; ?>/utilisateurs/deconnexion">deconnexion</a></li>

                <?php } else { ?>
               
              <!--<li><a class="text-lowercase <?php $data['current_register'] ? print($data['current_register']) : '';?>" href="<?php echo URLROOT; ?>/utilisateurs/inscription">inscription</a></li>-->
              <!--<li><a class="text-lowercase <?php $data['current_login'] ? print($data['current_login']) : '';?>" href="<?php echo URLROOT; ?>/utilisateurs/connexion">connexion</a></li>-->
                    
                    <?php } ?>
            </ul>
        </div>
      </nav>