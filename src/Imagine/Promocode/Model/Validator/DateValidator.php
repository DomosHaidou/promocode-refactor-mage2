<?php

namespace Imagine\Promocode\Model\Validator;

class DateValidator
{

    public function validate(
        \Magento\SalesRule\Model\Rule $rule,
        \Magento\Sales\Model\Quote $quote
    ) {
        // Check if the rule is is active
        if ($rule->getFromDate()) {
            $fromDate = new \Carbon\Carbon($rule->getFromDate());
            if (\Carbon\Carbon::now()->lte($fromDate)) {
                $message = sprintf('Your coupon is not valid yet. It will be active on %s', $fromDate->toDateString());
                throw new \Exception($message);
            }
        }
    }
}
