<?php
declare(strict_types=1);

/**
 * Status Trait
 * @category    Ticaje
 * @package     Ticaje_Configuration
 * @author      Hector Luis Barrientos <ticaje@filetea.me>
 */

namespace Ticaje\Configuration\Traits;

use Magento\Store\Model\ScopeInterface;

/**
 * Trait Status
 * @package Ticaje\Configuration\Traits
 * Classes using this trait must implement Ticaje\Configuration\GeneralInterface
 */
trait Status
{
    /**
     * @inheritDoc
     */
    public function isEnabled($storeId = null): bool
    {
        $field = self::XML_FIELD_ENABLED;
        $config = $this->scopeConfig->getValue($this->getXmlGeneralPath($field), ScopeInterface::SCOPE_STORE, $storeId) ?: '';
        return (bool)$config;
    }

    /**
     * @inheritDoc
     */
    public function enable($storeId = null)
    {
        $value = (string)(int)(bool)self::ENABLED_VALUE;
        $this->setValue(self::XML_FIELD_ENABLED, $value, $storeId);
    }

    /**
     * @inheritDoc
     */
    public function disable($storeId = null)
    {
        $value = (string)(int)(bool)self::DISABLED_VALUE;
        $this->setValue(self::XML_FIELD_ENABLED, $value, $storeId);
    }
}
