<?php
namespace Coffeemug\LogLayout\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\View\LayoutInterface;
use Psr\Log\LoggerInterface;

class LogLayoutObserver implements ObserverInterface
{
    /**
     * @var \Psr\Log\LoggerInterface
     */
    protected $logger;

    /**
     * @var \Magento\Framework\View\LayoutInterface
     */
    protected $layout;

    /**
     * LogLayoutObserver constructor.
     *
     * @param LoggerInterface $logger
     * @param LayoutInterface $layout
     */
    public function __construct(
        LoggerInterface $logger,
        LayoutInterface $layout
    ) {
        $this->logger = $logger;
        $this->layout = $layout;
    }

    /**
     * Observer execute method.
     *
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        // Load the layout handle for the product view page
        $layout = $this->layout->getUpdate()->getFileLayoutUpdatesXml('catalog_product_view')->asNiceXml();

        $this->logger->info('XML layout');
        $this->logger->info(($layout));
    }
}