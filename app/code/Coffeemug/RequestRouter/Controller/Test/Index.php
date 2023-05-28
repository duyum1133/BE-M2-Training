<?php

namespace Coffeemug\RequestRouter\Controller\Test;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    public function __construct(Context $context, PageFactory $resultPageFactory)
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        $resultPage =  $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Convert Request'));
        return $resultPage;
    }
}
