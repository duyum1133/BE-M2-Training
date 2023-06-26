<?php
namespace Coffeemug\BlockArchitecture\Controller\Index;

use Coffeemug\BlockArchitecture\Block\Handsome;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action 
{
    protected $handsomeBlock;
    protected $pageFactory;

    public function __construct(Context $context, PageFactory $pageFactory, Handsome $handsomeBlock)
    {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
        $this->handsomeBlock = $handsomeBlock;
    }

    public function execute()
    {
        $resultPage = $this->pageFactory->create();
        $handsomeBlock = $resultPage->getLayout()->createBlock(Handsome::class);
        $resultPage->getLayout()->setChild('content', $handsomeBlock->getNameInLayout(), $handsomeBlock);

        return $resultPage;
    }
}
