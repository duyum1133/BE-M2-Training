<?php
namespace Coffeemug\LogRouter\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Logger\Monolog;

class CaptureHtmlObserver implements ObserverInterface
{
    /**
     * @var Monolog
     */
    protected $logger;

    public function __construct(Monolog $logger)
    {
        $this->logger = $logger;
    }

    public function execute(Observer $observer)
    {
        $html = $observer->getEvent()->getData('response');
        $this->logger->info('Generated HTML:');
        // $this->logger->info($html);
    }
}