<?php

    class userCalendar extends controllers {
        public function __construct() {
            parent::__construct();
        }
        
        public function userCalendar($params) {
            $this->views->getView($this, "userCalendar");
        }

    }

?>