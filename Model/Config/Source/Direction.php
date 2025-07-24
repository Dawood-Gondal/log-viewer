<?php
declare(strict_types=1);

/**
 * @category    BugsBunny Enterprise
 * @package     BugsBunny_OrderComment
 * @copyright   Copyright (c) 2023 BugsBunny Enterprise
 * @author      dawoodgondaldev@gmail.com
 */

namespace BugsBunny\LogViewer\Model\Config\Source;

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
