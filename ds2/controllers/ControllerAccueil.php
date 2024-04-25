<?php

require_once('views/view.php');

class ControllerAccueil
{
      private $_articleManager;
      private $_view;

        public function __construct($url)
        {
            if(isset($url) > 1  && count($url) > 1)
            throw new Exception('page introuvable');

            else
            $this->articles();
        }

        private function articles()
        {
            $this->_articleManager = new articleManager;
            $articles = $this->_articleManager->getArticles();

            $this->_view = new view('Accueil');
            $this->_view->generate(array('articles' => $articles));

        }
    }