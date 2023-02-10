<?php

    class dashboard extends controllers {
        public function __construct() {
            parent::__construct();
        }

        public function dashboard($params) {

            $this->views->getView($this, "dashboard");
        }
    }

?>