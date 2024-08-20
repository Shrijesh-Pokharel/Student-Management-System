<?php
include 'header.php';
?>
<?php
include 'db.php';
$sql = "SELECT * FROM students";
$result = $conn->query($sql);
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        
<h3>Student List</h3>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Course</th>
            <th>Age</th>
            <th>Grade</th>
            <th>Attendence</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['course'] ?></td>
                <td><?= $row['age'] ?></td>
                <td><?= $row['grade']?></td>
                <td><?= $row['Attendence']?></td>
            </tr>
        <?php endwhile; ?>
    </table>
    <a href="dashboard.php" styles="align-margin: center">Go back</a>
    </div>
</body>
</html>