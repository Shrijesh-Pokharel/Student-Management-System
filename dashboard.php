<?php
    include 'header.php';
?>
<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $course = $conn->real_escape_string($_POST['course']);
    $age = (int)$_POST['age'];

    if (isset($_POST['grade']) && isset($_POST['Attendence'])) 
    {
        $grade = (float)$_POST['grade'];
        $Attendence = (float)$_POST['Attendence'];

        if ($Attendence > 100 || $Attendence < 0) 
        {
            echo "Error: Attendance should be between 0 and 100.";
            exit();
        }
    }
    $sql = "INSERT INTO students (name, email, course, age, grade, Attendence) VALUES ('$name', '$email', '$course', '$age', '$grade', '$Attendence')";

    if ($conn->query($sql) === TRUE) 
    {
        echo "Student added successfully";
    }
     else 
     {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container"> 
    <h3>Add Student</h3>
    <form method="POST" action="dashboard.php">
        <label>Name:</label><br>
        <input type="text" name="name" required><br>
        <label>Email:</label><br>
        <input type="email" name="email" required><br>
        <label>Course:</label><br>
        <input type="text" name="course" required><br>
        <label>Age:</label><br>
        <input type="number" name="age" required><br>
        <label>Grade:</label><br>
        <input type="number" name="grade" placeholder="Grade" step="0.01" min="0" max="100" required><br>
        <label>Attendence:</label><br>
        <input type="number" name="Attendence" placeholder="Attendance (%)" step="0.01" min="0" max="100" required><br>
        <hr>
        <button type="submit">Add Student</button>
    </form>
    <a href="logout.php">Logout</a><br>

    <a href="data.php">data</a>
    </div>
</body>
</html>