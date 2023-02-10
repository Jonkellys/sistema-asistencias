<?php

    class userAsistencias extends controllers {
        public function __construct() {
            parent::__construct();
        }

        public function userAsistencias($params) {

            $this->views->getView($this, "userAsistencias");
        }
    }

?>