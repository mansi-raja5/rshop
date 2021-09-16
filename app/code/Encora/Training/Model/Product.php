<?php
namespace Encora\Training\Model;

class Product extends \Magento\Catalog\Model\Product
{
    public function getName()
    {
        $name = parent::getName();
        $price = $this->getData('price');
        if($price < 60) {
            $name .= " - Yeah!";
        } else {
            $name .= " - Nope!";
        }
        return $name;
    }
}