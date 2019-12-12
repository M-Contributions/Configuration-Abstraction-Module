<?php
declare(strict_types=1);

/**
 * Status Trait
 * @category    Ticaje
 * @package     Ticaje_Setting
 * @author      Hector Luis Barrientos <ticaje@filetea.me>
 */

namespace Ticaje\Configuration\Traits;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;
use Magento\Store\Model\Store;
use Ticaje\Configuration\Setting\GeneralInterface;

/**
 * Trait General
 * @package Ticaje\Configuration\Traits
 * Classes using this trait must implement Ticaje\Configuration\Setting\GeneralInterface
 * @Disclaimer: This trait provides the general methods for operating with all configurations within General section of adminhtml/system.xml
 */
trait General
{
    protected $generalPath = 'general'; // Could be overridden by client classes

    /**
     * @inheritDoc
     */
    public function getGeneralConfig($field = null, $storeId = null): string
    {
        return $this->scopeConfig->getValue($this->getXmlGeneralPath($field), ScopeInterface::SCOPE_STORE, $storeId) ?: '';
    }

    /**
     * @inheritDoc
     */
    public function setValue($field, $value, $storeId = null): GeneralInterface
    {
        $storeId = $storeId ?: Store::DEFAULT_STORE_ID;
        $scope = $storeId == Store::DEFAULT_STORE_ID ? ScopeConfigInterface::SCOPE_TYPE_DEFAULT : ScopeInterface::SCOPE_STORES;
        $this->resourceConfig->saveConfig($this->getXmlGeneralPath($field), $value, $scope, $storeId);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getXmlGeneralPath($field): string
    {
        $xmlPath = $this->getXmlBasePath() . '/' . $this->getGeneralPath();
        if ($field) {
            $xmlPath .= '/' . $field;
        }
        return $xmlPath;
    }

    /**
     * @inheritDoc
     */
    public function getGeneralPath(): string
    {
        return $this->generalPath;
    }
}
