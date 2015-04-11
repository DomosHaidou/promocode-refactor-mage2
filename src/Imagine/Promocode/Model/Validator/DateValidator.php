<?php

namespace Imagine\Promocode\Model\Validator;

class DateValidator
{
    public static function validate()
    {
        $dateValidator = new DateValidator;
        return $dateValidator;
    }

    public function with($params) {
        // Check if the rule is active
        if(!isset($params['rule']))
        {
            return;
        }

        $rule = $params['rule'];
        if ($rule->getFromDate()) {
            $fromDate = new \Carbon\Carbon($rule->getFromDate());
            if (\Carbon\Carbon::now()->lte($fromDate)) {
                $message = sprintf('Your coupon is not valid yet. It will be active on %s', $fromDate->toDateString());
                throw new \Exception($message);
            }
        }

        // Check if the rule has expired
        if ($rule->getFromDate()) {
            $fromDate = new \Carbon\Carbon($rule->getFromDate());
            if (\Carbon\Carbon::now()->gt($fromDate)) {
                $message = sprintf('Your coupon is no longer valid. It expired on %s', $fromDate->toDateString());
                throw new \Exception($message);
            }
        }
    }
}
