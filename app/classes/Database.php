<?php

class Database
{
    private $connection;
    private $statement;

    public function __construct(array $config, string $username = 'root', string $password = 'root')
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query(string $query, array $params = []): ?Database
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);

        return $this;
    }

    public function find(): ?array
    {
        return $this->statement->fetch() ?: null;
        // video 25
    }

    public function findOrFail(): ?array
    {
        $result = $this->find();

        if ($result === null) {
            abort();
        }

        return $result;
    }

    public function all(): ?array
    {
        return $this->statement->fetchAll();
    }
}
