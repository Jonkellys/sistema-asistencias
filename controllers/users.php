<?php

    class users extends controllers {
        public function __construct() {
            parent::__construct();
        }

        public function users($params) {

            $this->views->getView($this, "users");
        }

    }

?>