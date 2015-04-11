<?php

namespace Imagine\Promocode\Model;

class Validator
{
    public function validate($services)
    {
        \Imagine\Promocode\Model\Validator\GlobalValidator::validate()->with($services);
    }
}
