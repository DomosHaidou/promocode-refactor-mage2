<?php

namespace Imagine\Promocode\Model\Validator;

class GlobalValidator
{
    public function validate(\Magento\SalesRule\Model\Coupon $coupon)
    {
        if ($coupon->getUsageLimit() && $coupon->getTimesUsed() >= $coupon->getUsageLimit()) {
            $message = sprintf(
                'Your coupon was already used. It may only be used %s time(s).',
                $coupon->getUsageLimit()
            );
            throw new \Exception($message);
        }
    }
}
