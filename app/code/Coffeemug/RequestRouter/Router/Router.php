<?php

namespace Coffeemug\RequestRouter\Router;

use Magento\Framework\App\ActionFactory;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\Response\Http;
use Magento\Framework\App\RouterInterface;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\Logger\Monolog;
use Magento\Framework\UrlInterface;

class Router implements RouterInterface
{
    /**
     * @var ActionFactory
     */
    protected $actionFactory;

    /**
     * @var UrlInterface
     */
    protected $url;

    /**
     * @var Monolog
     */
    protected $logger;

    /**
     * @var RedirectFactory
     */
    protected $redirectFactory;

    /**
     * Router constructor.
     *
     * @param ActionFactory $actionFactory
     * @param UrlInterface $url
     */
    public function __construct(ActionFactory $actionFactory, UrlInterface $url, Monolog $logger, RedirectFactory $redirectFactory)
    {
        $this->actionFactory = $actionFactory;
        $this->url = $url;
        $this->logger = $logger;
        $this->redirectFactory = $redirectFactory;
    }

    /**
     * Match the request
     *
     * @param RequestInterface $request
     * @return bool
     */
    public function match(RequestInterface $request)
    {
        $pathInfo = trim($request->getPathInfo(), '/');
        $params = explode('-', $pathInfo);

        if (count($params) >= 4 && $params[0] === 'test') {
            // // Perform the redirect
            $request->setPathInfo($params[1].'/'.$params[2].'/'.$params[3]);
            
            return $this->actionFactory->create(\Magento\Framework\App\Action\Forward::class);
        }


        return false;
    }
}