<?php
declare(strict_types=1);

/**
 * Status Trait
 * @category    Ticaje
 * @package     Ticaje_Configuration
 * @author      Hector Luis Barrientos <ticaje@filetea.me>
*/

namespace Ticaje\Configuration\Traits;

/**
 * Trait Status
 * @package Ticaje\Configuration\Traits
 * Classes using this trait must implement Ticaje\Configuration\Setting\StatusInterface
 */
trait Status
{
    /**
     * @param null $storeId
     * @return bool
     */
    public function isEnabled($storeId = null): bool
    {
        return $this->getConfigFlag(self::XML_FIELD_ENABLED, $storeId);
    }

    /**
     * @param null $storeId
     */
    public function enable($storeId = null)
    {
        $this->setConfigFlag(self::XML_FIELD_ENABLED, self::ENABLED_VALUE, $storeId);
    }

    /**
     * @param null $storeId
     */
    public function disable($storeId = null)
    {
        $this->setConfigFlag(self::XML_FIELD_ENABLED, self::DISABLED_VALUE, $storeId);
    }
}
