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
      $this->observer->execute('Testcode');
    }
}
