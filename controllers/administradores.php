<?php

    class administradores extends controllers {
        public function __construct() {
            parent::__construct();
        }
        
        public function administradores($params) {
            $this->views->getView($this, "administradores");
        }

    }

?>