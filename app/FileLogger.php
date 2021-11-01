<?php
namespace App;

use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

class FileLogger implements LoggerInterface
{
    public function log($level, \Stringable|string $message, array $context = []): void
    {
        $oDate = new \DateTime();
        $dateFormatted = $oDate->format('Y-m-d H:i:s');
        
        $contextString = json_encode($context);
        
        $message = sprintf(
            '[%s] %s: %s %s%s',
            $dateFormatted,
            $level,
            $message,
            $contextString,
            PHP_EOL
        );
        
        file_put_contents('gb.log', $message, FILE_APPEND);
    }
    
    public function emergency(\Stringable|string $message, array $context = []): void
    {
        $this->log(LogLevel::EMERGENCY, $message, $context);
    }
    
    public function warning(\Stringable|string $message, array $context = []): void
    {
        $this->log(LogLevel::WARNING, $message, $context);
    }
    
    public function notice(\Stringable|string $message, array $context = []): void
    {
        $this->log(LogLevel::NOTICE, $message, $context);
    }
    
    public function debug(\Stringable|string $message, array $context = []): void
    {
        $this->log(LogLevel::DEBUG, $message, $context);
    }
    
    public function alert(\Stringable|string $message, array $context = []): void
    {
        $this->log(LogLevel::ALERT, $message, $context);
    }
    
    public function critical(\Stringable|string $message, array $context = []): void
    {
        $this->log(LogLevel::CRITICAL, $message, $context);
    }
    
    public function error(\Stringable|string $message, array $context = array()):void
    {
        $this->log(LogLevel::ERROR, $message, $context);
    }
    
    public function info(\Stringable|string $message, array $context = []): void
    {
        $this->log(LogLevel::INFO, $message, $context);
    }
}