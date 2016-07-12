<?php

namespace SamIT\React\Socket;

use React\EventLoop\LoopInterface;
use React\Socket\ConnectionInterface;

interface ConnectionFactoryInterface
{
    /**
     * @param resource $socket
     * @param LoopInterface $loop
     * @return ConnectionInterface
     */
    public function createConnection($socket, $loop);
}