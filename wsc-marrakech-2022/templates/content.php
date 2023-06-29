<?php ob_start();

require_once('contents/showcase.php');
require_once('contents/historique.php');
require_once('contents/programme.php');
require_once('contents/organisateurs.php');
require_once('contents/sponsors.php');
require_once('contents/contact.php');

$content = ob_get_clean();
require_once('layout.php');
?>
