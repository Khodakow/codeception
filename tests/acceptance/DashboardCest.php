<?php

use \AcceptanceTester;

include_once('FrontPage.php');

class DashboardCest {
    
    private $page;

    public function _before(AcceptanceTester $I) {
       $this->page = new FrontPage($I);
    }

    public function _after(AcceptanceTester $I) {
        
    }

    public function loginTest(AcceptanceTester $I) {
        $this->page->login();
    }

}