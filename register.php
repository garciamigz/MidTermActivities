<?php
$filename = "students.txt";

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $course = $_POST['course'];

    $entry = "Name: $name | Age: $age | Course: $course" . PHP_EOL;

    file_put_contents($filename, $entry, FILE_APPEND);

    $message = "Student registered successfully!";
}

if (isset($_POST['clear'])) {
    file_put_contents($filename, ""); 
    $message = "All student records cleared!";
}

$data = "";
if (file_exists($filename)) {
    $data = file_get_contents($filename);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; padding: 30px; }
        form { background: #fff; padding: 20px; border-radius: 8px; width: 300px; margin-bottom: 20px; }
        input, select, button { width: 100%; padding: 8px; margin: 6px 0; }
        textarea { width: 100%; height: 200px; margin-top: 10px; }
        .message { color: green; font-weight: bold; }
    </style>
</head>
<body>

    <h2>Student Registration Form</h2>
    
    <?php if (!empty($message)) echo "<p class='message'>$message</p>"; ?>

    <form method="post">
        <label>Student Name:</label>
        <input type="text" name="name" required>

        <label>Age:</label>
        <input type="number" name="age" required>

        <label>Course:</label>
        <input type="text" name="course" required>

        <button type="submit" name="register">Register</button>
        <button type="submit" name="clear" onclick="return confirm('Are you sure you want to clear all records?');">Clear Records</button>
    </form>

    <h3>Registered Students</h3>
    <textarea readonly><?php echo htmlspecialchars($data); ?></textarea>

</body>
</html>
