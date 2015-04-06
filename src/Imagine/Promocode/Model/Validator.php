<?php

namespace Imagine\Promocode\Model;

class Validator
{
    public function validate($coupon = NULL, $rule = NULL)
    {
        \Imagine\Promocode\Model\Validator\GlobalValidator::validate($coupon)->getMessage();
    }
}
