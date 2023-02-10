<?php

    class editarAdmin extends controllers {
        public function __construct() {
            parent::__construct();
        }
        
        public function editarAdmin($params) {
            $this->views->getView($this, "editarAdmin");
        }

    }

?>