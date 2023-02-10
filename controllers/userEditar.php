<?php

    class userEditar extends controllers {
        public function __construct() {
            parent::__construct();
        }
        
        public function userEditar($params) {
            $this->views->getView($this, "userEditar");
        }

    }

?>