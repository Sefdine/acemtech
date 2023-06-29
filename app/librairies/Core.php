<?php
/*
 * App Core Class
 * Creates URL & loads controllers
 * URL FORMAT: controllers/method/params
 */
class Core {
    private $currentController = 'Accueil';
    private $currentMethod = 'index';
    /**
     * @var string[]
     */
    private $params;

    public function __construct() {
        $url = $this->getUrl();

        if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
            $this->currentController = ucwords($url[0]);
            unset($url[0]);
        }
        require_once '../app/controllers/' . $this->currentController . '.php';
        $this->currentController = new $this->currentController;

        if (isset($url[1])) {
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }

        // Get params
        $this->params = $url ? array_values($url) : [];
        
        if (!empty($this->params)) {
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
        } else {
            $this->params = [""];
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
        }
    }

    public function getUrl() {
        if (isset($_GET['url'])) {
            $url = trim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
