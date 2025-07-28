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

class Direction implements OptionSourceInterface
{
    /**
     * Get options for select field
     *
     * @return array
     */
    public function toOptionArray(): array
    {
        return [['value' => 'asc', 'label' => __('Ascending')], ['value' => 'desc', 'label' => __('Descending')]];
    }
}
