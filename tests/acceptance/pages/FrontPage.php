<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FrontPage
 *
 * @author s.lugovskiy
 */
class FrontPage  {
    
    private $URL = '/';
    private $dashboardUrl = '/webmaster/office/dashboard';
    private $loginLink = "//a[@id='popup-login-link' and ancestor::div[@class='link relative' and ancestor::li[@class='login']]]";
    private $popup = " //div[@id='popup-login']";
    private $nick = "//input[@name='nick']";
    private $password = "//input[@name='passwd']";
    private $submit = "//span[@class='submit' and ancestor::form[ancestor::div[@class='popup-padding']]]";
    private $overview = "//h2[contains(@class,'_overview_text')]";
    private $spinner = "//div[@role='spinner']";
    

    
    /**
     * @var AcceptanceTester
     */
    private $I;
    
    public function __construct(AcceptanceTester $I)
    {
        $this->I = $I;
    }
    
    public function login()
    {
        $this->I->wantTo("login");
        $this->I->click($this->loginLink);
        $this->I->canSeeElement($this->popup);
        $this->I->fillField($this->nick, 'me0i@mail.ru');
        $this->I->fillField($this->password, '123698745');
        $this->I->click($this->submit);
        $this->I->waitForElement($this->overview,30);
        $this->waitSpinner();
        $this->I->canSeeElement($this->overview);
    }
 
    
    public function openMainPage(){
        $this->I->amOnPage($this->URL);
    }
    
    public function goToDashboard(){
        $this->I->amOnPage($this->dashboardUrl);
        $this->I->waitForElement($this->overview,30);
        $this->waitSpinner();
    }
    
    public function waitSpinner(){
        $this->I->waitForElementNotVisible($this->spinner);
    }
    
}

?>
