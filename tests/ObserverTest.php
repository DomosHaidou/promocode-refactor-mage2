<?php

class ObserverTest extends PHPUnit_Framework_TestCase
{
  private $observer;

  protected function setup()
  {
      $ruleFactory = $this->getMockBuilder('\Magento\SalesRule\Model\RuleFactory')
          ->disableOriginalConstructor()
          ->getMock();

      $quote = $this->getMockBuilder('\Magento\Sales\Model\Quote')
          ->disableOriginalConstructor()
          ->getMock();

      $coupon = $this->getMockBuilder('\Magento\SalesRule\Model\Coupon')
          ->disableOriginalConstructor()
          ->getMock();

      $coupon->method('getUsageLimit')
          ->willReturn(1);

      $this->observer = new \Imagine\Promocode\Model\Observer($ruleFactory, $quote, $coupon);
  }

    /**
     * @expectedException InvalidArgumentException 
     * @expectedExceptionMessage Your coupon is not valid for 
     */
    public function testValidateCoupon()
    {
        $quote = $this->getMockBuilder('\Magento\Sales\Model\Quote')
            ->disableOriginalConstructor()
            ->getMock();
        
        $quoteService = $this->getMockBuilder('\Magento\Sales\Model\Service\Quote')
            ->disableOriginalConstructor()
            ->getMock();

        $quote->method('getCouponCode')
            ->willReturn('testCode');


        $observer = $this->getMockBuilder('\Magento\Framework\Event\Observer')
            ->setMethods(array('getEvent', 'getQuote'))
            ->getMock();

        $observer->expects($this->any())
            ->method('getEvent')
            ->will($this->returnSelf());

        $observer->expects($this->any())
            ->method('getQuote')
            ->willReturn($quote);

        $this->observer->execute($observer);
    }
}
