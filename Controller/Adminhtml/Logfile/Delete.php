<?php
declare(strict_types=1);

/**
 * @category    BugsBunny Enterprise
 * @package     BugsBunny_OrderComment
 * @copyright   Copyright (c) 2023 BugsBunny Enterprise
 * @author      dawoodgondaldev@gmail.com
 */

namespace BugsBunny\LogViewer\Controller\Adminhtml\Logfile;

use BugsBunny\LogViewer\Block\LogFile;
use BugsBunny\LogViewer\Helper\Data;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Controller\Adminhtml\System;
use Magento\Framework\App\Response\Http\FileFactory;
use Magento\Framework\Exception\FileSystemException;
use Magento\Framework\Filesystem\Driver\File;

class Delete extends System
{

    public const ADMIN_RESOURCE = 'BugsBunny_LogViewer::log_viewer_delete';
    /**
     * @var FileFactory
     */
    protected $fileFactory;
    /**
     * @var LogFile
     */
    protected $logFile;
    /**
     * @var File
     */
    protected $driver;

    /**
     * @param Context $context
     * @param FileFactory $fileFactory
     * @param LogFile $logFile
     * @param File $driver
     */
    public function __construct(Context $context, FileFactory $fileFactory, LogFile $logFile, File $driver)
    {
        $this->fileFactory = $fileFactory;
        $this->logFile = $logFile;
        $this->driver = $driver;
        parent::__construct($context);
    }

    /**
     * @return void
     * @throws FileSystemException
     */
    public function execute()
    {
        $fileName = $this->getRequest()->getParam('file');
        $file = BP . '/var/log/' . $fileName;
        $fp = $this->driver->fileOpen($file, "r+");
        ftruncate($fp, 0);
        $this->driver->fileClose($fp);
        $this->messageManager->addSuccessMessage(__("File content of %1 has been deleted", $fileName));
        $this->_redirect('logviewer/logfile/view', ['file' => $fileName]);
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed(self::ADMIN_RESOURCE);
    }
}
