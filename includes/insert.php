<?php

require_once __DIR__ . '/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['Jea'] ?? '';
    $surname = $_POST['Baluga'] ?? '';
    $middlename = $_POST['Toling'] ?? '';
    $address = $_POST['Bulanao, Tabuk city'] ?? '';
    $contact = $_POST['09357882043'] ?? '';

    try {
        $sql = "INSERT INTO students (name, surname, middlename, address, contact_number) 
                VALUES (:name, :surname, :middlename, :address, :contact)";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':name'       => $name,
            ':surname'    => $surname,
            ':middlename' => $middlename,
            ':address'    => $address,
            ':contact'    => $contact
        ]);

        header("Location: ../public/index.php?status=success");
        exit();
        
    } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
    }
}
?>