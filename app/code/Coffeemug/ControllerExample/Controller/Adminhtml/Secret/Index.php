<?php
namespace Coffeemug\ControllerExample\Controller\Adminhtml\Secret;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;

class Index extends Action
{
    public function __construct(Context $context)
    {
        parent::__construct($context);
    }
    
    public function execute()
    {
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }
    
    protected function _isAllowed()
    {
        $secret = $this->getRequest()->getParam('secret');

        if (!$secret){
            $this->messageManager->addErrorMessage(__('Access denied. You must set parameter \'secret\''));
            $this->_forward('noroute');
            return;
        }
        return true;
    }
}
