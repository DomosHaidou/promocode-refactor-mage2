<?php

namespace spec\Imagine\Promocode\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ValidatorFactorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Imagine\Promocode\Model\ValidatorFactory');
    }

    function it_should_create_a_date_validator_instance()
    {
        $this->create('DateValidator')
            ->shouldReturnAnInstanceOf('Imagine\Promocode\Model\Validator\DateValidator');
    }
}
