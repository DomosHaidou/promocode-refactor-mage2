<?php

namespace Imagine\Promocode\Model;

class Validator
{
    public function validate($params)
    {
        \Imagine\Promocode\Model\Validator\GlobalValidator::validate()->with($params);
        \Imagine\Promocode\Model\Validator\DateValidator::validate()->with($params);
    }
}
