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

    function it_should_create_a_general_validator_instance()
    {
        $this->create('GeneralValidator')
            ->shouldReturnAnInstanceOf('Imagine\Promocode\Model\Validator\GeneralValidator');
    }

    function it_should_create_a_global_validator_instance()
    {
        $this->create('GlobalValidator')
            ->shouldReturnAnInstanceOf('Imagine\Promocode\Model\Validator\GlobalValidator');
    }

    function it_should_create_a_customer_validator_instance()
    {
        $this->create('CustomerValidator')
            ->shouldReturnAnInstanceOf('Imagine\Promocode\Model\Validator\CustomerValidator');
    }
}
