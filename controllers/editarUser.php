<?php

    class editarUser extends controllers {
        public function __construct() {
            parent::__construct();
        }
        
        public function editarUser($params) {
            $this->views->getView($this, "editarUser");
        }

    }

?>