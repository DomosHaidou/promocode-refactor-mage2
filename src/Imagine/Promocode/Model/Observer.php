<?php

namespace Imagine\Promocode\Model;

use Imagine\Promocode\Model\Validator as Validator;
use Magento\Framework\Event\Observer as EventObserver;

class Observer
{
    protected $rule;
    protected $quote;
    protected $coupon;

    public function __construct(
        \Magento\SalesRule\Model\Rule $rule,
        \Magento\Sales\Model\Quote $quote,
        \Magento\SalesRule\Model\Coupon $coupon
    ) {
        $this->ruleFactory = $rule;
        $this->quote = $quote;
        $this->coupon = $coupon;
    }
    /**
     *
     * @param EventObserver $observer
     */
    public function execute($observer)
    {
        $quote      = $observer->getEvent()->getQuote();
        $couponCode = $this->coupon->loadByCode($this->quote->getCouponCode());

        $params = ['coupon' => $couponCode, 'rule' => $this->rule, 'quote'=> $quote];

        $validator = new Validator();
        $validator->validate($params);
    }
}

