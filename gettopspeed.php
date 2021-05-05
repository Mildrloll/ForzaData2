<?php
require_once 'connect.php';
$query = "SELECT year, manufacturer, model, division, pi, engine, top_speed_kph FROM cardata ORDER BY top_speed_kph DESC";
$response = @mysqli_query($con, $query);
echo '<a href="/Mysqltest/forside.php">Back</a><br>';
if ($response) {
    echo '<table align="left" cellspacing="5" cellpadding="8">
    <tr><td align="left"><b>Year</b></td>
    <td align="left"><b>Manufacturer</b></td>
    <td align="left"><b>Model</b></td>
    <td align="left"><b>Division</b></td>
    <td align="left"><b>PI</b></td>
    <td align="left"><b>Engine</b></td>
    <td align="left"><b>Top Speed (KPH)</b></td></tr>';
    while ($row = mysqli_fetch_array($response)) {
        echo '<tr><td align="left">' .
            $row['year'] . '</td><td align="left">' .
            $row['manufacturer'] . '</td><td align="left">' .
            $row['model'] . '</td><td align="left">' .
            $row['division'] . '</td><td align="left">' .
            $row['pi'] . '</td><td align="left">' .
            $row['engine'] . '</td><td align="left">' .
            $row['top_speed_kph'] . '</td><td align="left">';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo "it didn't work";
    echo mysqli_error($con);
}
mysqli_close($con);
