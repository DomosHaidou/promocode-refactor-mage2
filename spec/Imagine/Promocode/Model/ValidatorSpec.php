<?php

namespace spec\Imagine\Promocode\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use PhpSpec\Exception\Example\PendingException;

class ValidatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Imagine\Promocode\Model\Validator');
    }

    function it_should_validate_a_coupon_code(\Magento\SalesRule\Model\Coupon $coupon,
                                              \Magento\Sales\Model\Quote $quote)
    {
        throw new PendingException(); 
        $coupon->getCode()->willReturn('ABC123');
    }
}
