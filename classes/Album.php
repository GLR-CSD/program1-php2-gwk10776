<?php

class Album
{
    private ?int $id;
    private string $naam;

    /**
     * @param int|null $id
     * @param string $naam
     */
    public function __construct(?int $id, string $naam)
    {
        $this->id = $id;
        $this->naam = $naam;
    }

    public static function getAll(PDO $pdo): array
    {

        // Voorbereiden van de query
        $stmt = $pdo->query("SELECT * FROM album");

        // Array om albums in op te slaan
        $albums = [];

        // Itereren over de resultaten en personen toevoegen aan de array
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $album = new Album(
                $row['id'],
                $row['naam']
            );
            $albums[] = $album;
        }

        // Retourneer array met albums
        return $albums;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getNaam(): string
    {
        return $this->naam;
    }

    public function setNaam(string $naam): void
    {
        $this->naam = $naam;
    }

}