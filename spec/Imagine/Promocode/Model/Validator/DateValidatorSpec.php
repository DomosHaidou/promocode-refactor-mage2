<?php

namespace spec\Imagine\Promocode\Model\Validator;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DateValidatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Imagine\Promocode\Model\Validator\DateValidator');
    }

    function let()
    {
        $this->beConstructedThrough('validate', []);
    }

    function it_should_throw_an_invalid_date_exception(
        \Magento\SalesRule\Model\Rule $rule,
        \Magento\Sales\Model\Quote $quote
    ) {
        $rule->getFromDate()->willReturn('2017-01-01');
        $params = array('rule' => $rule);
        $exception  = new \Exception('Your coupon is not valid yet. It will be active on 2017-01-01');
        $this->shouldThrow($exception)->duringWith($params);
    }

    function it_should_throw_a_expired_date_exception(
        \Magento\SalesRule\Model\Rule $rule,
        \Magento\Sales\Model\Quote $quote
    ) {
        $rule->getFromDate()->willReturn('2014-01-01');
        $params = array('rule' => $rule);
        $exception  = new \Exception('Your coupon is no longer valid. It expired on 2014-01-01');
        $this->shouldThrow($exception)->duringWith($params);
    }
}
