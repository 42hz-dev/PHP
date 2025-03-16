<?php
class Database
{
    private $connection;

    public function __construct(array $config, string $username = 'root', string $password = 'root')
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query(string $query, array $params = []): ?PDOStatement
    {
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
        } catch (Exception $e) {
            echo "Not Found Databases";
        }

        return $statement;

    }
}
