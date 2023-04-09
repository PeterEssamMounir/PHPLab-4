<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
</head>
<body>
<style>
th, td {
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even){background-color: #f2f2f2}

    th {
        background-color: #4CAF50;
        color: white;
    }
</style>

    <h1>User List</h1>
    <a href="user_reg.php">Add New User</a>
    <br><br>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Mail Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Connect to the database
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "day4lab";
            $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // If form is submitted, insert new user into database
        if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['gender'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $gender = $_POST['gender'];

            // Insert user into database
            $sql = "INSERT INTO users (name, email, gender) VALUES ('$name', '$email', '$gender')";
            if ($conn->query($sql) === TRUE) {
                echo "New user created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        // Retrieve users from database and display them in a table
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["gender"] . "</td>";
                echo "<td>Not Sent</td>";
                echo "<td>Send Mail</td>";
                echo "</tr>";
            }
        } else {
            echo "0 results";
        }

        // Close database connection
        $conn->close();
        ?>
    </tbody>
</table>
</body>
</html>
