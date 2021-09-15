<?php
namespace Encora\Training\Plugins;

class Product
{
    public function aftergetName(\Magento\Catalog\Model\Product $product, $name)
    {
        $price = $product->getData('price');
        if($price < 60) {
            $name .= " - Cheeper!";
        } else {
            $name .= " - Expensive!";
        }
        return $name;
    }
}