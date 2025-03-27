<?php 

class Mangas
{
    public static function deleteMangas($man_id)
    {
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM 76_mangas WHERE man_id = :man_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':man_id', $man_id, PDO::PARAM_INT);
        $stmt->execute();
    }
}