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
 * Interface GeneralInterface
 * @package Ticaje\Configuration\Setting
 */
interface GeneralInterface
{
    const XML_FIELD_GENERAL = 'general';

    /**
     * @param null $field
     * @param null $storeId
     * @return string
     */
    public function getGeneralConfig($field = null, $storeId = null): string;

    /**
     * @param $field
     * @param $value
     * @param null $storeId
     * @return GeneralInterface
     */
    public function setValue($field, $value, $storeId = null): GeneralInterface;

    /**
     * @return string
     */
    public function getGeneralPath(): string;

    /**
     * @param $field
     * @return string
     */
    public function getXmlGeneralPath($field): string;
}
