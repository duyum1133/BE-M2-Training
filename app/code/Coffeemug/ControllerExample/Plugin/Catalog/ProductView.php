<?php
namespace Coffeemug\ControllerExample\Plugin\Catalog;

class ProductView
{
    public function afterExecute(\Magento\Catalog\Controller\Product\View $subject, $result)
    {
        $result->getConfig()->getTitle()->prepend(__('Plugined'));
        return $result;
    }
}