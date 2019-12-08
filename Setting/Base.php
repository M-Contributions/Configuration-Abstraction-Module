<?php
declare(strict_types=1);

/**
 * Base Configuration Class
 * @category    Ticaje
 * @package     Ticaje_Configuration
 * @author      Hector Luis Barrientos <ticaje@filetea.me>
 */

namespace Ticaje\Configuration\Setting;

use Magento\Config\Model\ResourceModel\Config as ResourceConfig;
use Magento\Framework\App\Config\ScopeConfigInterface;

use Ticaje\Configuration\Traits\Base as BaseTrait;
use Ticaje\Configuration\Traits\Status as StatusTrait;

/**
 * Class Base
 * @package Ticaje\Configuration\Setting
 */
abstract class Base implements ConfigInterface, StatusInterface
{
    use BaseTrait, StatusTrait;

    /**
     * Base constructor.
     * @param ScopeConfigInterface $scopeConfig
     * @param ResourceConfig $resourceConfig
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig,
        ResourceConfig $resourceConfig
    ) {
        $this->setScopeConfig($scopeConfig);
        $this->setResourceConfig($resourceConfig);
    }
}
