<?php

    class calendar extends controllers {
        public function __construct() {
            parent::__construct();
        }
        
        public function calendar($params) {
            $this->views->getView($this, "calendar");
        }

    }

?>