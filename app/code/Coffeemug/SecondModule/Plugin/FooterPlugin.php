<?php
namespace Coffeemug\SecondModule\Plugin;

class FooterPlugin
{
    public function afterGetCopyright(\Magento\Theme\Block\Html\Footer $subject, $result)
    {
        $result = 'Customized copyright!';
        return $result;
    }
}