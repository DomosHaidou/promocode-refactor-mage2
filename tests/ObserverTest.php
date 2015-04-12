<?php

class ObserverTest extends PHPUnit_Framework_TestCase
{
  private $observer;
  private $coupon;

  protected function setup()
  {
      $ruleFactory = $this->getMockBuilder('\Magento\SalesRule\Model\RuleFactory')
          ->disableOriginalConstructor()
          ->getMock();

      $quote = $this->getMockBuilder('\Magento\Sales\Model\Quote')
          ->setMethods(array('getCouponCode'))
          ->disableOriginalConstructor()
          ->getMock();
      
      $quote->expects($this->any())
            ->method('getCouponCode')
            ->willReturn('testCode');

      $this->coupon = $this->getMockBuilder('\Magento\SalesRule\Model\Coupon')
          ->setMethods(array('getUsageLimit', 'loadByCode','getTimesUsed'))
          ->disableOriginalConstructor()
          ->getMock();

      $this->coupon->expects($this->any())
          ->method('loadByCode')
          ->with('testCode')
          ->will($this->returnSelf());

      $this->coupon->method('getUsageLimit')->willReturn(1);
      $this->coupon->method('getTimesUsed')->willReturn(2);

      $this->observer = new \Imagine\Promocode\Model\Observer($ruleFactory, $quote, $this->coupon);
  }

    /**
     * @expectedException Exception
     * @expectedExceptionMessage Your coupon was already used. It may only be used 1 time(s).
     */
    public function testValidateCoupon()
    {
        $quote = $this->getMockBuilder('\Magento\Sales\Model\Quote')
            ->disableOriginalConstructor()
            ->getMock();
        
        $quoteService = $this->getMockBuilder('\Magento\Sales\Model\Service\Quote')
            ->disableOriginalConstructor()
            ->getMock();

        $quote->expects($this->any())
            ->method('getCouponCode')
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

        $this->coupon->method('loadByCode')
            ->willReturn($this->coupon);

        $this->observer->execute($observer);
    }
}
