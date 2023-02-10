<?php

    class userRegistros extends controllers {
        public function __construct() {
            parent::__construct();
        }

        public function userRegistros($params) {

            $this->views->getView($this, "userRegistros");
        }
    }

?>