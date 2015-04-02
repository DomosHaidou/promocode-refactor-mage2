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

    function it_should_validate_a_coupon_to_date(\Magento\SalesRule\Model\Coupon $coupon,
                                                   \Magento\SalesRule\Model\Rule $rule)
    {
        throw new PendingException();
    }
    
    function it_should_validate_a_coupon_from_date(\Magento\SalesRule\Model\Coupon $coupon,
                                                   \Magento\SalesRule\Model\Rule $rule)
    {
        throw new PendingException();
    }

    function it_should_validate_a_coupon_use_limit(\Magento\SalesRule\Model\Coupon $coupon
                                                   \Magento\SalesRule\Model\Rule $rule)
    {
        throw new PendingException();
    }
}
