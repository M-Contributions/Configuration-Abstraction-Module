<?php
declare(strict_types=1);

/**
 * Base Configuration Class
 * @category    Ticaje
 * @package     Ticaje_Setting
 * @author      Hector Luis Barrientos <ticaje@filetea.me>
 */

namespace Ticaje\Configuration\Setting;

use Magento\Config\Model\ResourceModel\Config as ResourceConfig;
use Magento\Framework\App\Config\ScopeConfigInterface;

use Ticaje\Configuration\Traits\Base as BaseTrait;

/**
 * Class Base
 * @package Ticaje\Configuration\Setting
 */
abstract class Base implements ConfigInterface
{
    use BaseTrait;

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
