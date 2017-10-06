<?php

namespace Kaliber5\LoggerBundle;

use Psr\Log\LoggerInterface;

/**
 * Interface LoggingInterface
 *
 * This Interface is used for AutoConfiguration
 *
 * @package Kaliber5\LoggerBundle
 */
interface LoggingInterface
{
    /**
     * set the logger
     *
     * @param LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger);
}
