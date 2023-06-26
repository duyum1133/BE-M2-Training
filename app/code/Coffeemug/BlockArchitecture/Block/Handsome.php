<?php
namespace Coffeemug\BlockArchitecture\Block;

use Magento\Framework\View\Element\AbstractBlock;

class Handsome extends AbstractBlock
{
    protected function _toHtml()
    {
        $html = '<div>Khánh Duy đẹp trai</div>';
        return $html;
    }
}
