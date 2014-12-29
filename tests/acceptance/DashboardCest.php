<?php

use \AcceptanceTester;

include_once('pages/FrontPage.php');

class DashboardCest {
    
    private $page;

    public function _before(AcceptanceTester $I) {
       $this->page = new FrontPage($I);
       $this->page->openMainPage();
    }

    public function _after(AcceptanceTester $I) {
       $this->page->openMainPage();
    }

    public function loginTest(AcceptanceTester $I) {
        $this->page->login();
    }
 

}