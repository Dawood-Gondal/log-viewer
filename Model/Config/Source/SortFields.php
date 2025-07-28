<?php
/**
 * @category    M2Commerce Enterprise
 * @package     M2Commerce_OrderComment
 * @copyright   Copyright (c) 2025 M2Commerce Enterprise
 * @author      dawoodgondaldev@gmail.com
 */

declare(strict_types=1);

namespace M2Commerce\LogViewer\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;

class SortFields implements OptionSourceInterface
{
    /**
     * @return array[]
     */
    public function toOptionArray()
    {
        return [['value' => 'name', 'label' => __('File Name')], ['value' => 'mod_time', 'label' => __('Last Modified')]];
    }
}
