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

class ListPerPage implements OptionSourceInterface
{
    /**
     * @return array[]
     */
    public function toOptionArray()
    {
        return [
            ['value' => 5, 'label' => '5'],
            ['value' => 10, 'label' => '10'],
            ['value' => 25, 'label' => '25'],
            ['value' => 50, 'label' => '50'],
            ['value' => 100, 'label' => '100']
        ];
    }
}
