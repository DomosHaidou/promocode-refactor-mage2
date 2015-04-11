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

    function let()
    {
        $this->beConstructedThrough('validate', []);
    }

    function it_should_throw_an_exception_for_coupons_used_more_than_specified_usage_limit(\StdClass $params,\Magento\SalesRule\Model\Coupon $coupon)
    {
        $params->coupon->willReturn($coupon);
//        $coupon->getUsageLimit()->willReturn(1);
//        $coupon->getTimesUsed()->willReturn(1);

        $exception = new \Exception('Your coupon was already used. It may only be used 1 time(s).');

        $this->shouldThrow($exception)->duringWith($params);
    }
}
