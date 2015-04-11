<?php

namespace Imagine\Promocode\Model\Validator;

class GlobalValidator
{
    public static function validate()
    {
        $globalValidator = new GlobalValidator();

        return $globalValidator;
    }

    public function with($params)
    {
        $coupon = $params['coupon'];

        if ($coupon->getUsageLimit() && $coupon->getTimesUsed() >= $coupon->getUsageLimit()) {
            $message = sprintf(
                'Your coupon was already used. It may only be used %s time(s).',
                $coupon->getUsageLimit()
            );
            throw new \Exception($message);
        }
    }
}
