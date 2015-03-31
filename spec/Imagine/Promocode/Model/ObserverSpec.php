<?php

namespace spec\Imagine\Promocode\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ObserverSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Imagine\Promocode\Model\Observer');
    }

    function it_should_validate_coupon_code(\Magento\SalesRule\Model\Coupon $coupon)
    {
        $coupon->getCode()->willReturn('ABC123');
    }
}
