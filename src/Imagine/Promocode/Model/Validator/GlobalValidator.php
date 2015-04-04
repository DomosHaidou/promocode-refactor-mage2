<?php

namespace Imagine\Promocode\Model\Validator;

class GlobalValidator
{

    public function validate($startingParam, $endingParam)
    {
        if ($startingParam >= $endingParam)
        {
            $test = (int)$startingParam;
            throw new \Exception(sprintf('Your coupon was already used. It may only be used %s time(s).', $test));
        }
    }
}
