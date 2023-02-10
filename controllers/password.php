<?php

    class password extends controllers {
        public function __construct() {
            parent::__construct();
        }

        public function password($params) {

            $this->views->getView($this, "password");
        }
    }

?>