<?php
// fetch_users.php

include("connect.php");

$table = "<table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>users</th>
                    <th>status</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>";

function last_activity($user_id, $conn) {
    $query = mysqli_query($conn, "SELECT * FROM user WHERE userid=$user_id ORDER BY last_activity DESC LIMIT 1");
    if ($query) {
        $row = mysqli_fetch_assoc($query);
        if ($row) {
            return $row['last_activity'];
        }
    }
}
$current_datetime=null;
$select = mysqli_query($conn, "SELECT * FROM user");
while ($row = mysqli_fetch_assoc($select)) {
    $status = '';
    $current_datetime = strtotime(date('Y-m-d H:i:s') . '-10 second +1 hour');
    $current_datetime = date('Y-m-d H:i:s', $current_datetime);
    
    $userlastactive = last_activity($row['userid'], $conn);
    
    if ($userlastactive >= $current_datetime) {
        $status = "<td class='online'>online</td>";
    } else {
        $status = "<td class='offline'>offline</td>";
    }
    
    $table .= "<tr>
                    <td>{$row['userid']}</td>
                    <td>{$row['username']}</td>";
                    $table.=$status;
                    $table.="
                    <td><input type='submit' value='remove'></td>
                </tr>";
}

$table .= "</tbody></table>";
echo $table;
echo $current_datetime;
?>
