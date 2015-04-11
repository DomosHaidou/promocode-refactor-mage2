<?php

namespace spec\Imagine\Promocode\Model\Validator;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GlobalValidatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Imagine\Promocode\Model\Validator\GlobalValidator');
    }

    function let(\Magento\SalesRule\Model\Coupon $coupon)
    {
        $this->beConstructedThrough('validate', [$coupon]);
    }

    function it_should_throw_an_exception_for_coupons_used_more_than_specified_usage_limit(\Magento\SalesRule\Model\Coupon $coupon)
    {
        $coupon->getUsageLimit()->willReturn(1);
        $coupon->getTimesUsed()->willReturn(1);

        $params = array('coupon' => $coupon);

        $exception = new \Exception('Your coupon was already used. It may only be used 1 time(s).');

        $this->shouldThrow($exception)->duringWith($params);
    }
}
