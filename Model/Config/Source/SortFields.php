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

class SortFields implements OptionSourceInterface
{
    public function toOptionArray()
    {
        return [['value' => 'name', 'label' => __('File Name')], ['value' => 'mod_time', 'label' => __('Last Modified')]];
    }
}
