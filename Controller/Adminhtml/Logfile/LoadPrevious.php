<?php
declare(strict_types=1);

/**
 * @category    BugsBunny Enterprise
 * @package     BugsBunny_OrderComment
 * @copyright   Copyright (c) 2023 BugsBunny Enterprise
 * @author      dawoodgondaldev@gmail.com
 */

namespace BugsBunny\LogViewer\Controller\Adminhtml\Logfile;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\Result\Json;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Filesystem\Driver\File;
use SplFileObject;

class LoadPrevious extends Action
{
    /**
     * Authorization level of a basic admin session
     */
    public const ADMIN_RESOURCE = 'BugsBunny_LogViewer::log_viewer_view';

    /**
     * @var JsonFactory
     */
    protected $jsonFactory;

    /**
     * @var File
     */
    protected $driver;

    /**
     * LoadPrevious constructor.
     * @param Context $context
     * @param JsonFactory $jsonFactory
     * @param File $driver
     */
    public function __construct(Action\Context $context, JsonFactory $jsonFactory, File $driver)
    {
        $this->jsonFactory = $jsonFactory;
        $this->driver = $driver;
        parent::__construct($context);
    }

    /**
     * Load logs action
     *
     * @return Json
     */
    public function execute()
    {
        $result = $this->jsonFactory->create();

        $file = $this->getRequest()->getParam('file');
        $offset = (int)$this->getRequest()->getParam('offset');
        $lines = (int)$this->getRequest()->getParam('lines');
        $logPath = BP . '/var/log/' . $file;

        $data = [];
        $hasMore = false;

        if ($this->driver->isReadable($logPath)) {
            $file = new SplFileObject($logPath, 'r');
            $file->seek(PHP_INT_MAX);
            $totalLines = $file->key();

            $from = max(0, $totalLines - $offset - $lines);
            $safeLines = min($lines, $totalLines - $from);

            $file->seek($from);
            $readLines = 0;

            while (!$file->eof() && $readLines < $safeLines) {
                $data[] = rtrim($file->fgets(), "\n");
                $readLines++;
            }

            $hasMore = ($offset + $lines) < $totalLines;
        }

        return $result->setData(['success' => true, 'data' => implode("\n", $data), 'has_more' => $hasMore]);
    }

    /**
     * @inheritdoc
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed(self::ADMIN_RESOURCE);
    }
}
