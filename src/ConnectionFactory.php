<?php


namespace SamIT\React\Socket;


use React\EventLoop\LoopInterface;

class ConnectionFactory
{

    protected $map;

    /**
     * ConnectionFactory constructor.
     * @param array $map A map, mapping socket types to a connection class. The class may be given as string or closure.
     */
    public function __construct(array $map)
    {
        $this->map = $map;
    }

    public function createConnection($socket, LoopInterface $loop)
    {
        if (!is_resource($socket)) {
            throw new \InvalidArgumentException("Socket must be of type resource.");
        }

        $meta = stream_get_meta_data($socket);

        $definition = $this->map[$meta['stream_type']];
        if (is_string($definition)) {
                $result = new $definition($socket, $loop);
        } elseif ($definition instanceof \Closure) {
            $result = $definition($socket, $loop);
        } else {
            $result = new Connection($socket, $loop);
        }

        if (!$result instanceof ConnectionInterface) {
            throw new \UnexpectedValueException("Result must implement \\SamIT\\React\\Socket\\ConnectionInterface");
        }

        return $result;
    }

}