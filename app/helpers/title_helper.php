<?php
//    Title higlighter (active page)
// $view = explode($view, '/');
function showTitle($view) {
    switch ($view) {
        case ('pages/index'):
            return $title = 'Accueil';
            break;
        case ('pages/apropos'):
            return $title = 'A propos';
            break;
        case ('utilisateurs/inscription'):
            return $title = 'Inscription';
            break;
        case ('utilisateurs/connexion'):
            return $title = 'Connexion';
            break;
        case ('utilisateurs/index'):
			return $title = 'Dashboard';
            break;
        case ('posts/index'):
            return $title = 'Dashboard';
            break;
        case ('posts/ajouterarticle'):
            return $title = 'Ajouter un article';
            break;
        case ('posts/categorie'):
            return $title = 'Categorie';
            break;
        default:
            return 'acemtech.org';
    }
}
