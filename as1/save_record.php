<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $grade = $_POST['grade'];

    $stmt = $conn->prepare("INSERT INTO student_records (name, grade) VALUES (?, ?)");
    $stmt->bind_param("si", $name, $grade);

    if ($stmt->execute()) {
        header('Location: add_content.html');
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

