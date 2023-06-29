<?php

// Simple page redirect
function redirect($page) {
    header('location:' . URLROOT . '/' . $page);
}

//    Truncate the body text to any limit
function limit_text($text, $limit) {
    $text = html_entity_decode(strip_tags($text));
    if (str_word_count($text, 0) > $limit) {
        $words = str_word_count($text, 2);
        $pos   = array_keys($words);
        $text  = substr($text, 0, $pos[$limit]) . '...';
    }
    return $text;
}

// Category color helper
function colors_category($category_name) {
    switch ($category_name) {
        case 'Nouveautes':
        case 'alaune':
            echo "category-alaune";
            break;

        case 'Festivites':
        case 'Festvites':
        case 'festivites':
            echo "category-festivites";
            break;

        case 'Communiques':
        case 'communiques':
            echo "category-communiques";
            break;

        case 'Innovation':
        case 'innovation':
            echo "category-innovation";
            break;

        case 'Projets':
        case 'projets':
            echo "category-projets";
            break;

        case 'Soutenances':
        case 'soutenances':
            echo "category-soutenances";
            break;

        case 'Archives':
        case 'archives':
            echo "category-archives";
            break;

        case 'Aides' :
        case 'aides':
            echo "category-aides";
            break;
    }
}

// OG description display
function og_desc_display() {
	if (!empty($data['post'])) { 
      
      echo limit_text($data['post']->body, 28); 
    
    } else { 
      
      echo "Solution innovante favorisant l’enrichissement et la valorisation des projets innovants, 
      cultivation d' esprit d’innovation, tout en facilitant l’esprit d’épanouissement.";
    
    }
}

function formatDate($date) {
  	
  	//$dt = DateTime::createFromFormat('!Y-m-d H:i:s', $date)->format('d M Y');
  	echo dateToFrench($date, "j F Y");
  
    
  	 //echo date('j M Y', $date);
}

function formatDateMin($date) {
    echo DateTime::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y H:i');
}

// Convertit une date ou un timestamp en français
function dateToFrench($date, $format) 
{
    $english_days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
    $french_days = array('lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche');
    $english_months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    $french_months = array('janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre');
    return str_replace($english_months, $french_months, str_replace($english_days, $french_days, date($format, strtotime($date) ) ) );
}

// Format url to get tidy 
function formatUrl($str, $sep='-')
    {
            $res = strtolower($str);
            $res = preg_replace('/[^[:alnum:]]/', ' ', $res);
            $res = preg_replace('/[[:space:]]+/', $sep, $res);
            return trim($res, $sep);
    }

