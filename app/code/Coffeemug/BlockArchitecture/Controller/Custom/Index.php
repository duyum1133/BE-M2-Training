<?php
namespace Coffeemug\BlockArchitecture\Controller\Custom;

use Coffeemug\BlockArchitecture\Block\Template\NewBlock;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action 
{
    protected $customBlock;
    protected $pageFactory;

    public function __construct(Context $context, PageFactory $pageFactory, NewBlock $customBlock)
    {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
        $this->customBlock = $customBlock;
    }

    public function execute()
    {
        $resultPage = $this->pageFactory->create();
        $customBlock = $resultPage->getLayout()->createBlock(NewBlock::class);
        $customBlock->setTemplate('Coffeemug_BlockArchitecture::custom-template.phtml');
        $resultPage->getLayout()->setChild('content', $customBlock->getNameInLayout(), $customBlock);

        return $resultPage;
    }
}
