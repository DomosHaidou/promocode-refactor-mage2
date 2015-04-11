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
        \Magento\SalesRule\Model\Coupon $coupon
    ) {
        $coupon->getUsageLimit()->willReturn(1);
        $coupon->getTimesUsed()->willReturn(1);

        $params = array('coupon' => $coupon);
        $exception = new \Exception('Your coupon was already used. It may only be used 1 time(s).');
        $this->shouldThrow($exception)->duringValidate($params);
    }

    function it_should_validate_and_throw_exception_invalid_date(
        \Magento\SalesRule\Model\Rule $rule,
        \Magento\SalesRule\Model\Coupon $coupon
    ) {
        $rule->getFromDate()->willReturn('2017-01-01');
        $params = array(
            'rule' => $rule,
            'coupon' => $coupon
        );
        $exception  = new \Exception('Your coupon is not valid yet. It will be active on 2017-01-01');

        $this->shouldThrow($exception)->duringValidate($params);
    }
}
