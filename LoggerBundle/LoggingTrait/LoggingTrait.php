<?php
/**
 * Created by PhpStorm.
 * User: andreasschacht
 * Date: 28.04.16
 * Time: 15:21
 */

namespace Kaliber5\LoggerBundle\LoggingTrait;

use Psr\Log\LoggerInterface;

/**
 * A Trait that simplifies the logging
 *
 * Class LoggingTrait
 * @package Kaliber5\LoggerBundle\LoggingTrait
 */
trait LoggingTrait
{

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * set the logger
     * @param LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * logs a debug message
     *
     * @param string          $message
     * @param \Exception|null $exception
     */
    public function logDebug($message, \Exception $exception = null)
    {
        $this->logMessage('debug', $message, $exception);
    }

    /**
     * logs an error message
     *
     * @param string          $message
     * @param \Exception|null $exception
     */
    public function logError($message, \Exception $exception = null)
    {
        $this->logMessage('error', $message, $exception);
    }

    /**
     * logs an alert message
     *
     * @param string          $message
     * @param \Exception|null $exception
     */
    public function logAlert($message, \Exception $exception = null)
    {
        $this->logMessage('alert', $message, $exception);
    }

    /**
     * logs a critical message
     *
     * @param string          $message
     * @param \Exception|null $exception
     */
    public function logCritical($message, \Exception $exception = null)
    {
        $this->logMessage('critical', $message, $exception);
    }

    /**
     * logs an info message
     *
     * @param string          $message
     * @param \Exception|null $exception
     */
    public function logInfo($message, \Exception $exception = null)
    {
        $this->logMessage('info', $message, $exception);
    }

    /**
     * logs an emergency message
     *
     * @param string          $message
     * @param \Exception|null $exception
     */
    public function logEmergency($message, \Exception $exception = null)
    {
        $this->logMessage('emergency', $message, $exception);
    }

    /**
     * logs an notice message
     *
     * @param string          $message
     * @param \Exception|null $exception
     */
    public function logNotice($message, \Exception $exception = null)
    {
        $this->logMessage('notice', $message, $exception);
    }

    /**
     * logs an warning message
     *
     * @param string          $message
     * @param \Exception|null $exception
     */
    public function logWarning($message, \Exception $exception = null)
    {
        $this->logMessage('warning', $message, $exception);
    }

    /**
     * @param string          $method
     * @param string          $message
     * @param \Exception|null $exception
     */
    protected function logMessage($method, $message, \Exception $exception = null)
    {
        try {
            if ($this->logger && method_exists($this->logger, $method)) {
                $this->logger->$method('{'.get_class($this).'} '.$message);
                if ($exception) {
                    $this->logMessage($method, $exception->getMessage());
                    $this->logMessage($method, $exception->getTraceAsString());
                }
            }
        } catch (\Exception $e) {
            // Failures on logging should never break the process
            // so catch all exceptions and continue
        }
    }
}
