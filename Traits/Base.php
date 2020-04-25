<?php
declare(strict_types=1);

/**
 * Base Configuration Trait
 * @category    Ticaje
 * @package     Ticaje_Setting
 * @author      Hector Luis Barrientos <ticaje@filetea.me>
 */

namespace Ticaje\Configuration\Traits;

use Magento\Config\Model\ResourceModel\Config as ResourceConfig;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;
use Magento\Store\Model\Store;

/**
 * Trait Base
 * @package Ticaje\Configuration\Traits
 * Classes using this trait must implement Ticaje\Configuration\Setting\ConfigInterface
 */
trait Base
{
    protected $scopeConfig;

    protected $resourceConfig;

    /**
     * @param null $path
     * @param null $storeId
     * @return string
     */
    public function getConfig($path = null, $storeId = null): string
    {
        return $this->scopeConfig->getValue($path, ScopeInterface::SCOPE_STORE, $storeId) ?: '';
    }

    /**
     * @param null $path
     * @param null $storeId
     * @return bool
     */
    public function getConfigFlag($path = null, $storeId = null): bool
    {
        return (bool)$this->getConfig($path, $storeId);
    }

    /**
     * @param $scopeConfig
     */
    public function setScopeConfig($scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @param ResourceConfig $resourceConfig
     */
    public function setResourceConfig(ResourceConfig $resourceConfig)
    {
        $this->resourceConfig = $resourceConfig;
    }

    /**
     * @param $path
     * @param $value
     * @param null $storeId
     * @return $this
     */
    public function setConfig($path, $value, $storeId = null): self
    {
        $storeId = $storeId ?: Store::DEFAULT_STORE_ID;
        $scope = $storeId == Store::DEFAULT_STORE_ID ? ScopeConfigInterface::SCOPE_TYPE_DEFAULT : ScopeInterface::SCOPE_STORES;
        $this->resourceConfig->saveConfig($path, $value, $scope, $storeId);
        return $this;
    }

    /**
     * @param $field
     * @param $value
     * @param null $storeId
     * @return Base
     */
    public function setConfigFlag($field, $value, $storeId = null): self
    {
        $value = (string)(int)(bool)$value;
        return $this->setConfig($field, $value, $storeId);
    }

    /**
     * @inheritDoc
     */
    public function setValue($path, $value, $storeId = null)
    {
        return $this->setConfig($path, $value, $storeId);
    }
}
