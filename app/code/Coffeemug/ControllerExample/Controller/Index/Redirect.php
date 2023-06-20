<?php

namespace Coffeemug\ControllerExample\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Catalog\Model\CategoryRepository;

class Redirect extends Action
{

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @var CategoryRepository
     */
    protected $categoryRepository;

    public function __construct(Context $context, PageFactory $resultPageFactory, CategoryRepository $categoryRepository)
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->categoryRepository = $categoryRepository;
    }

    public function execute()
    {
        try {
            $categoryId = 41;

            $category = $this->categoryRepository->get($categoryId);
            $categoryUrl = $category->getUrl();
            
            $resultRedirect = $this->resultRedirectFactory->create();
            $resultRedirect->setUrl($categoryUrl);
            return $resultRedirect;
        } catch (\Magento\Framework\Exception\NoSuchEntityException $e) {
            echo 'Category not found';
        }

    }
}
