<?php

namespace Imagine\Promocode\Model;

use Imagine\Promocode\Model\Validator as Validator;
use Magento\Framework\Event\Observer as EventObserver;

class Observer
{
    protected $ruleFactory;


    public function __construct(
        \Magento\SalesRule\Model\RuleFactory $ruleFactory
    ) {
        $this->ruleFactory = $ruleFactory;
    }
    /**
     *
     * @param EventObserver $observer
     */
    public function execute($observer)
    {
        $params = [];
        // Check configuration flag
        // Check if the rule exists and load it
        // Prepare params array
        $quote      = $observer->getEvent()->getQuote();
        $couponCode = $quote->getCouponCode();
        //$params = ['coupon' => null, 'rule' => null, 'quote'=> null];
        //$rule   = 
        // Call the Validator
        $validator = new Validator();
        $validator->validate($params);
    }
}

