<?php

namespace Imagine\Promocode\Model\Validator;

class GlobalValidator
{
    private $coupon;

    public static function validate($coupon)
    {
        $globalValidator = new GlobalValidator();
        $globalValidator->coupon = $coupon;

        return $globalValidator;
    }

    public function getMessage()
    {
        if ($this->coupon->getUsageLimit() && $this->coupon->getTimesUsed() >= $this->coupon->getUsageLimit()) {
            $message = sprintf(
                'Your coupon was already used. It may only be used %s time(s).',
                $this->coupon->getUsageLimit()
            );
            throw new \Exception($message);
        }
    }
}
