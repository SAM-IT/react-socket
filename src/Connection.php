<?php


namespace SamIT\React\Socket;


class Connection extends \React\Socket\Connection implements ConnectionInterface
{

    /**
     * @return int|null The remote port for this connection.
     */
    public function getRemotePort()
    {
        $parts = explode(':', stream_socket_get_name($this->stream, true));
        return array_pop($parts);
    }
}