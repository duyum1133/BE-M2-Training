<?php

namespace Coffeemug\LogRouter\Controller\Log;

use Coffeemug\LogRouter\Router\RouterConfig;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Logger\Monolog;

class All extends Action
{
    /**
     * @var RouterConfig
     */
    protected $routeConfig;

    /**
     * @var Monolog
     */
    protected $logger;

    public function __construct(Context $context, RouterConfig $routeConfig, Monolog $logger)
    {
        $this->routeConfig = $routeConfig;
        $this->logger = $logger;
        parent::__construct($context);
    }

    public function execute()
    {
        $routers = $this->routeConfig->getRoutes();
        $routesList = [];

        foreach ($routers as $router) {
            $routesList[] = $router['frontName'];
        }
        
        $logMessage = 'List of all routes: ' . implode(', ', $routesList);
        $this->logger->info($logMessage);

        die("All routers have been printed");
    }
}
