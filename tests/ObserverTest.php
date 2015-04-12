<?php

class ObserverTest extends PHPUnit_Framework_TestCase
{
  private $observer;
  private $coupon;
  private $rule;

  protected function setup()
  {
      $this->rule = $this->getMockBuilder('\Magento\SalesRule\Model\Rule')
          ->setMethods(array('getFromDate'))
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

      $this->observer = new \Imagine\Promocode\Model\Observer($this->rule, $quote, $this->coupon);
  }

    /**
     * @expectedException Exception
     * @expectedExceptionMessage Your coupon was already used. It may only be used 1 time(s).
     */
    public function testValidateCoupon()
    {
        $this->coupon->method('getUsageLimit')->willReturn(1);
        $this->coupon->method('getTimesUsed')->willReturn(2);

        $quote = $this->getMockBuilder('\Magento\Sales\Model\Quote')
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

    /**
     * @expectedException Exception
     * @expectedExceptionMessage Your coupon is not valid yet. It will be active on 2017-01-01
     */
    public function testValidateDateCoupon()
    {
        $this->rule->method('getFromDate')->willReturn('2017-01-01');

        $quote = $this->getMockBuilder('\Magento\Sales\Model\Quote')
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
