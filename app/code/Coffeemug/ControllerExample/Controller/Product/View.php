<?php

namespace Coffeemug\ControllerExample\Controller\Product;

use Magento\Catalog\Controller\Product\View as OriginalView;

class View extends OriginalView
{
    public function execute()
    {
        echo 'Customize the catalog product view controller using preferences.';

        return parent::execute();
    }
}