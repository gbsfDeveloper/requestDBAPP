<?php
class dbManager
{
    function __construct($server, $connectionInfo)
    {
        $this->server = $server;
        $this->connectionInfo = $connectionInfo;
    }

    public function startConnection()
    {
        $serverName = $this->server;
        $connectionInfo = $this->connectionInfo;
        $connection = sqlsrv_connect($serverName, $connectionInfo);
        return $connection;
    }

    public function endConnection($connection)
    {
        sqlsrv_close($connection);
    }
}
