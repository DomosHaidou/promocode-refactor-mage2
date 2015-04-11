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
        if ($params->coupon->getUsageLimit() && $params->coupon->getTimesUsed() >= $params->coupon->getUsageLimit()) {
            $message = sprintf(
                'Your coupon was already used. It may only be used %s time(s).',
                $params->coupon->getUsageLimit()
            );
            throw new \Exception($message);
        }
    }
}
