<?php
declare(strict_types=1);

/**
 * Configuration Interface
 * @category    Ticaje
 * @package     Ticaje_Setting
 * @author      Hector Luis Barrientos <ticaje@filetea.me>
 */

namespace Ticaje\Configuration\Setting;

/**
 * Interface StatusInterface
 * @package Ticaje\Configuration\Setting
 */
interface StatusInterface
{
    const XML_FIELD_ENABLED = 'enabled';

    const ENABLED_VALUE = 1;

    const DISABLED_VALUE = 0;

    /**
     * @param null $storeId
     * @return mixed
     */
    public function isEnabled($storeId = null);

    /**
     * @param null $storeId
     * @return mixed
     */
    public function enable($storeId = null);

    /**
     * @param null $storeId
     * @return mixed
     */
    public function disable($storeId = null);
}
