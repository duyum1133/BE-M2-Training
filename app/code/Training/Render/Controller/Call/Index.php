<?php
namespace Training\Render\Controller\Call;

use Magento\Cms\Block\Block;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $pageFactory;

    public function __construct(
        Context $context,
        PageFactory $pageFactory
    ) {
        $this->pageFactory = $pageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        // Your controller logic

        // Retrieve the CMS block content
        $blockId = 'call-from-controller';

        $resultPage = $this->pageFactory->create();
        $extraBlock = $resultPage->getLayout()->createBlock('Magento\Cms\Block\Block')->setBlockId($blockId);
        $resultPage->getLayout()->setChild('content', $extraBlock->getNameInLayout(), $extraBlock);

        return $resultPage;
    }
}
