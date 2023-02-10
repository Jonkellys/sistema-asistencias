<?php

    class userHome extends controllers {
        public function __construct() {
            parent::__construct();
        }

        public function userHome($params) {

            $this->views->getView($this, "userHome");
        }
    }

?>