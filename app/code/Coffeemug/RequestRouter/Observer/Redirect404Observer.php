<?php
namespace Coffeemug\RequestRouter\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\UrlInterface;

class Redirect404Observer implements ObserverInterface
{
    /**
     * @var \Magento\Framework\App\ResponseInterface
     */
    protected $response;

    /**
     * @var \Magento\Framework\UrlInterface
     */
    protected $url;

    /**
     * Redirect404Observer constructor.
     *
     * @param ResponseInterface $response
     * @param UrlInterface $url
     */
    public function __construct(
        ResponseInterface $response,
        UrlInterface $url
    ) {
        $this->response = $response;
        $this->url = $url;
    }

    /**
     * Observer execute method.
     *
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        /** @var ResponseHttp $response */
        $response = $this->response;
        if ($response->getHttpResponseCode() == 404) {
            $redirectUrl = $this->url->getUrl('');
            $response->setRedirect($redirectUrl);
        }
    }
}