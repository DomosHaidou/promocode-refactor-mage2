<?php

namespace Imagine\Promocode\Model;

use Imagine\Promocode\Model\Validator as Validator;

class Observer
{
    /**
     *
     * @param EvenObserver $observer
     */
    public function execute($observer)
    {
        // Check configuration flag
        // Check if the rule exists and load it
        // Prepare params array
        $quote = $observer->getEvent()->getQuote();
        // Call the Validator
        $validator = new Validator();
        $validator->validate('COUPONCODE');
    }
}

