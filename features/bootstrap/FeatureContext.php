<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

use Behat\MinkExtension\Context\RawMinkContext;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends RawMinkContext implements Context, SnippetAcceptingContext
{

    private $couponCode;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @Given I have a valid coupon code :couponCode
     */
    public function iHaveAValidCouponCode($couponCode)
    {
        $this->couponCode = $couponCode;
    }

    /**
     * @When I try to redeem the coupon code
     */
    public function iTryToUseRedeemTheCouponCode()
    {
        $this->visitPath('/joust-duffle-bag.html');
        $this->getSession()->getPage()->find('css', '.tocart')->click();
        // checkout page
        $this->visitPath('/checkout/cart/');

        $this->getSession()->getPage()->fillField('coupon_code', $this->couponCode);
        // apply the voucher code
        $this->getSession()->getPage()->find('xpath', '//*[@id="discount-coupon-form"]/div/div[2]/div/button')->click();
    }

    /**
     * @Then I should see the error message :message
     */
    public function iShouldSeeTheErrorMessage($message)
    {
        $output = $this->getSession()->getPage()->find('css', '.message-error')->getHtml();

        expect(strip_tags($output))->toBe($message);
    }

    /**
     * @Given I am logged in as a “Return visitor” customer
     */
    public function iAmLoggedInAsAReturnVisitorCustomer()
    {
        throw new PendingException();
    }

    private function generateHtmlPage($fileName, $html)
    {
        file_put_contents($fileName, $html);
    }
}
