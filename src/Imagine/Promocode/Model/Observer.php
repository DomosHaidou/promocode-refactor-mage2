<?php

namespace Imagine\Promocode\Model;

use Imagine\Promocode\Model\Validator as Validator;

class Observer
{
    public function execute()
    {
        $validator = new Validator();
        $validator->validate('COUPONCODE');
    }
}

