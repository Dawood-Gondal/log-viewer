<?php
declare(strict_types=1);
/**
 * @category    BugsBunny Enterprise
 * @package     BugsBunny_OrderComment
 * @copyright   Copyright (c) 2023 BugsBunny Enterprise
 * @author      dawoodgondaldev@gmail.com
 */

namespace BugsBunny\LogViewer\Controller\Adminhtml\Logfile;

use Exception;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Controller\Adminhtml\System;
use Magento\Framework\App\Response\Http\FileFactory;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;

class Download extends System
{

    public const ADMIN_RESOURCE = 'BugsBunny_LogViewer::log_viewer_download';
    /**
     * @var FileFactory
     */
    protected $fileFactory;

    public function __construct(Context $context, FileFactory $fileFactory)
    {
        parent::__construct($context);
        $this->fileFactory = $fileFactory;
    }

    /**
     * @return ResponseInterface|ResultInterface
     * @throws Exception
     */
    public function execute()
    {
        $fileName = $this->getRequest()->getParam('file');
        $filePath = 'var/log/' . $fileName;

        return $this->fileFactory->create($fileName, ['type' => 'filename', 'value' => $filePath]);
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed(self::ADMIN_RESOURCE);
    }
}
