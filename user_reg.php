<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
</head>
<body>
    <h1>User Registration</h1>
    <form method="post" action="user_list1.php">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label>Gender:</label>
        <label for="male">Male</label>
        <input type="radio" id="male" name="gender" value="male" required>

        <label for="female">Female</label>
        <input type="radio" id="female" name="gender" value="female" required><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
