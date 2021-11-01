<?php
namespace App;

use Psr\Log\LoggerInterface;

class TestClass
{
    private object $logger;
    private string $name;
    
    public function __construct(LoggerInterface $logger, string $name)
    {
        $this->logger = $logger;
        $this->name = 'Evgeny';
    }
    
    public function getName():string
    {
        $this->logger->debug('Сообщение из ' . __CLASS__, [
            'method_name' => __METHOD__,
            'var_name'    => $this->name,
        ]);
        return $this->name;
    }
}