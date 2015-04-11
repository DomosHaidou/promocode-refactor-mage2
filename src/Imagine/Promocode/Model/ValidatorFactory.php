<?php

namespace Imagine\Promocode\Model;

class ValidatorFactory
{

    public function create($className)
    {
        $class = $this->getClass($className);

        if (!class_exists($class)) {
            throw new \Exception("Class '$class' Not Found.");
        }

        return new $class;
    }

    protected function getClass($className)
    {
        return __NAMESPACE__ . "\\Validator\\$className";
    }
}
