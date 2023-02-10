<?php

    class userPersonal extends controllers {
        public function __construct() {
            parent::__construct();
        }

        public function userPersonal($params) {

            $this->views->getView($this, "userPersonal");
        }
    }

?>