<?php

namespace SamIT\React\Socket;

interface ConnectionInterface extends \React\Socket\ConnectionInterface
{
    /**
     * @return int|null The remote port for this connection.
     */
    public function getRemotePort();
}