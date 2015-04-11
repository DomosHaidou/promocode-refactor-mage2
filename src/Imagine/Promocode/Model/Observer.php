<?php

namespace Imagine\Promocode\Model;

use Imagine\Promocode\Model\Validator as Validator;

class Observer
{
    public function execute($event)
    {
        $params = new \stdClass();
        $params->coupon = $event->getCoupon();
        $params->rule = $event->getRule();
        $params->quote = $event->getQuote();


        $validator = new Validator();
        $validator->validate($params);
    }
}

