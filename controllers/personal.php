<?php

    class personal extends controllers {
        public function __construct() {
            parent::__construct();
        }

        public function personal($params) {

            $this->views->getView($this, "personal");
        }
    }

?>