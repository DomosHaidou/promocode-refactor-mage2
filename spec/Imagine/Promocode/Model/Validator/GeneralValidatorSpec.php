<?php

namespace spec\Imagine\Promocode\Model\Validator;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GeneralValidatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Imagine\Promocode\Model\Validator\GeneralValidator');
    }
}