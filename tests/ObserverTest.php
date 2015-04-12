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
        $quote = $this->prophesize('\Magento\Sales\Model\Quote');
        $quote->reveal();

        $observer = $this->prophesize('\Magento\Framework\Event\Observer');

        $quoteService = $this->prophesize('\Magento\Sales\Model\Service\Quote');
        $quoteService->reveal();
        
        $observer->getEvent()->willReturn($quoteService);
        $observer->getEvent()->getQuote()->willReturn($quote);

        $this->observer->execute($observer);
    }
}
