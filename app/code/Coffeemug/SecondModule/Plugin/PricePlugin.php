<?php
namespace Coffeemug\SecondModule\Plugin;

class PricePlugin
{
    public function afterGetPrice(\Magento\Catalog\Model\Product $subject, $result)
    {
        $result += 20;
        return $result;
    }
}