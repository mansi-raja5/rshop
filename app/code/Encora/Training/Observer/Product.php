<?php

namespace Encora\Training\Observer;

use Magento\Framework\Event\ObserverInterface;

class Product implements ObserverInterface
{
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $collection = $observer->getEvent()->getData('collection');
        foreach($collection as $product)
        {
            $price = $product->getData('price');
            $name = $product->getData('name');
            if($price < 60) {
                $name .= " - wow!";
            } else {
                $name .= " - No!";
            }
            $product->setData('name',$name);
        }
    }
}