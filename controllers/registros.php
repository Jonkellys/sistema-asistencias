<?php

    class registros extends controllers {
        public function __construct() {
            parent::__construct();
        }

        public function registros($params) {

            $this->views->getView($this, "registros");
        }
    }

?>