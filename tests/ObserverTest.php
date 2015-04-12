<?php

class ObserverTest extends PHPUnit_Framework_TestCase
{
  private $observer;

  protected function setup()
  {
    $this->observer = new \Imagine\Promocode\Model\Observer();
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

        $observer = $this->getMockBuilder('\Magento\Framework\Event\Observer')
            ->getMock();

        $quoteService = $this->getMockBuilder('\Magento\Sales\Model\Service\Quote')
            ->disableOriginalConstructor()
            ->getMock();

        $observer->method('getEvent')
            ->willReturn($observer);

        $observer->method('getQuote')
            ->willReturn($quoteService);


        $this->observer->execute($observer);
    }
}
