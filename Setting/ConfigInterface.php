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
 * Interface ConfigInterface
 * @package Ticaje\Configuration\Setting
 */
interface ConfigInterface
{
    /**
     * @param null $field
     * @param null $storeId
     * @return mixed
     */
    public function getConfig($field = null, $storeId = null);

    /**
     * @param $field
     * @param null $storeId
     * @return bool
     */
    public function getConfigFlag($field, $storeId = null): bool;

    /**
     * @param $field
     * @param $value
     * @param null $storeId
     * @return mixed
     */
    public function setConfig($field, $value, $storeId = null);

    /**
     * @param $field
     * @param $value
     * @param null $storeId
     * @return mixed
     */
    public function setConfigFlag($field, $value, $storeId = null);
}
