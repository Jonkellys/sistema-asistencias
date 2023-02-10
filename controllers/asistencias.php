<?php

    class asistencias extends controllers {
        public function __construct() {
            parent::__construct();
        }
        
        public function asistencias($params) {
            $this->views->getView($this, "asistencias");
        }

    }

?>