<?php
include("connect.php");

// Initialize arrays to hold the IDs and usernames
$ids = array();
$names = array();

// Query to select all user IDs and usernames
$select = mysqli_query($conn, "SELECT userid, username FROM user");

// Loop through the result set and add each ID and username to their respective arrays
while ($row = mysqli_fetch_assoc($select)) {
    $ids[] = $row["userid"];
    $names[] = $row["username"];
}
$n=array($ids,$names);
print_r($n);
$p=json_encode($n);
echo ($p);
// Convert the arrays to JSON strings
$ids_json = json_encode($ids);
$names_json = json_encode($names);
echo $names_json;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script>
        // Embed the JSON data directly into the JavaScript
        var ids = <?php echo $ids_json; ?>;
        var names = <?php echo $names_json; ?>;
        console.log(ids); // Use the array of IDs in JavaScript
        console.log(names); // Use the array of usernames in JavaScript
    </script>
</body>
</html>
