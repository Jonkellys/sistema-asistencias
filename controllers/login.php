<?php

    class login extends controllers {
        public function __construct() {
            parent::__construct();
        }

        public function login() {

            $this->views->getView($this, "login");
        }

    }

?>