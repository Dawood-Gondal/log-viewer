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

class ListPerPage implements OptionSourceInterface
{
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
