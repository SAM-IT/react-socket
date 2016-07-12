<?php


namespace SamIT\React\Socket;


use React\EventLoop\LoopInterface;

class Server extends \React\Socket\Server
{
    /**
     * @var LoopInterface
     */
    protected $loop;

    /**
     * @var ConnectionFactoryInterface
     */
    protected $factory;

    public function __construct(LoopInterface $loop, ConnectionFactoryInterface $factory)
    {
        $this->loop = $loop;
        parent::__construct($loop);
    }

    public function createConnection($socket)
    {
        return $this->factory->createConnection($socket, $this->loop);
    }


}