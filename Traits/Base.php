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

    protected $xmlGroupPath;

    protected $xmlBasePath;

    /**
     * @param null $field
     * @param null $storeId
     * @return string
     */
    public function getConfig($field = null, $storeId = null): string
    {
        return $this->scopeConfig->getValue($this->getXmlPathForField($field), ScopeInterface::SCOPE_STORE, $storeId) ?: '';
    }

    /**
     * @param null $field
     * @param null $storeId
     * @return bool
     */
    public function getConfigFlag($field = null, $storeId = null): bool
    {
        return (bool)$this->getConfig($field, $storeId);
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
     * @param $field
     * @param $value
     * @param null $storeId
     * @return $this
     */
    public function setConfig($field, $value, $storeId = null): self
    {
        $storeId = $storeId ?: Store::DEFAULT_STORE_ID;
        $scope = $storeId == Store::DEFAULT_STORE_ID ? ScopeConfigInterface::SCOPE_TYPE_DEFAULT : ScopeInterface::SCOPE_STORES;
        $this->resourceConfig->saveConfig($this->getXmlPathForField($field), $value, $scope, $storeId);
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
     * @return string
     */
    public function getXmlBasePath(): string
    {
        return $this->xmlBasePath;
    }

    /**
     * @param null $field
     * @return string
     */
    public function getXmlPathForField($field = null): string
    {
        $xmlPath = $this->getXmlBasePath() . '/' . $this->getXmlGroupPath();
        if ($field) {
            $xmlPath .= '/' . $field;
        }
        return $xmlPath;
    }
}
