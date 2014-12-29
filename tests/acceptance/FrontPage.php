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
    
    private $URL = '/ru/';
    private $loginLink = "//a[@id='popup-login-link' and ancestor::div[@class='link relative' and ancestor::li[@class='login']]]";
    private $popup = " //div[@id='popup-login']";
    private $nick = "//input[@name='nick']";
    private $password = "//input[@name='passwd']";
    private $submit = "//span[@class='submit' and ancestor::form[ancestor::div[@class='popup-padding']]]";
    private $overview = "//h2[contains(@class,'_overview_text')]";
    
    /**
     * @var AcceptanceTester
     */
    protected $AcceptanceTester;
    
    public function __construct(AcceptanceTester $I)
    {
        $this->AcceptanceTester = $I;
    }
    
    public function login()
    {
        $I = $this->AcceptanceTester;
        
        $I->wantTo("login");
        $I->amOnPage($this->URL);
        $I->click($this->loginLink);
        $I->canSeeElement($this->popup);
        $I->fillField($this->nick, 'me0i@mail.ru');
        $I->fillField($this->password, '123698745');
        $I->click($this->submit);
        $I->waitForElement($this->overview,30);
        $I->seeElement($this->overview);

    }    
    
}

?>
