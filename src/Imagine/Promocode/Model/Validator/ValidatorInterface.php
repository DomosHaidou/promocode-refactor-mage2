<?php

namespace Imagine\Promocode\Model\Validator;

interface ValidatorInterface
{
    public function validate($startingParam, $endingParam);
}
