<?php

namespace Imagine\Promocode\Model;

class Observer
{
  public function execute()
  {
    throw new \InvalidArgumentException('Your coupon is not valid for');
  }
}
