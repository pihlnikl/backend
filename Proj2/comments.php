<?php
$conn = create_conn();
$sql = "SELECT id FROM users WHERE user=$user";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user);
$stmt->execute(); 

$result = $stmt->get_result();

while($row = $result->fetch_assoc())
{
    print("Kommentarer: " . $row["user"]);
}
?>