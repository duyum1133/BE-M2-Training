<?php
namespace Coffeemug\BlockArchitecture\Block;

use Magento\Catalog\Block\Product\View\Description;

class CustomDescription extends Description
{
    protected function _beforeToHtml()
    {
        $this->getProduct()->setDescription('This is my custom description');
        parent::_beforeToHtml();
    }

    public function customDescription()
    {
        return 'WebIDE Magento 2 from Coffeemug';
    }
}
