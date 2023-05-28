<?php
namespace Coffeemug\SecondModule\Plugin;

class BreadcrumbsPlugin
{
    public function beforeAddCrumb(\Magento\Theme\Block\Html\Breadcrumbs $subject, $crumbName, $crumbInfo)
    {
        $crumbInfo['label'] .= '|';
        return [$crumbName , $crumbInfo];
    }
}