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

    function it_should_validate_and_throw_exception_for_global_usage_coupon_code(
        \Magento\SalesRule\Model\Coupon $coupon,
        \Imagine\Promocode\Model\Validator\GlobalValidator $globalValidator
    ) {
        $coupon->getUsageLimit()->willReturn(1);
        $coupon->getTimesUsed()->willReturn(1);

        $exception = new \Exception('Your coupon was already used. It may only be used 1 time(s).');

        $this->shouldThrow($exception)->duringValidate($coupon);
    }

}
