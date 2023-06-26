<?php
namespace Coffeemug\BlockArchitecture\Controller\Text;

use Coffeemug\BlockArchitecture\Block\Handsome;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action 
{
    protected $handsomeBlock;
    protected $pageFactory;

    public function __construct(Context $context, PageFactory $pageFactory)
    {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
    }

    public function execute()
    {
        $resultPage = $this->pageFactory->create();
        $textBlock = $resultPage->getLayout()->createBlock(\Magento\Framework\View\Element\Text::class);
        $textBlock->setText('Rendered Text block');

        $resultPage->getLayout()->setChild('content', $textBlock->getNameInLayout(), $textBlock);

        return $resultPage;
    }
}
