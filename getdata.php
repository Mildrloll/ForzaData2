<?php
require_once 'connect.php';
$query = "SELECT year, manufacturer, model, value, division, pi, engine, engine_layout, drivetrain, power_kw, touge_nm, weight_kg, top_speed_kph, lap_time FROM cardata";
$response = @mysqli_query($con, $query);
echo '<a href="/Mysqltest/forside.php">Back</a><br>';
echo '<a href="/Mysqltest/adddata.php">Add Data</a><br>';
if ($response) {
    echo '<table align="left" cellspacing="5" cellpadding="8">
    <tr><td align="left"><b>Year</b></td>
    <td align="left"><b>Manufacturer</b></td>
    <td align="left"><b>Model</b></td>
    <td align="left"><b>Value</b></td>
    <td align="left"><b>Division</b></td>
    <td align="left"><b>PI</b></td>
    <td align="left"><b>Engine</b></td>
    <td align="left"><b>Engine Layout</b></td>
    <td align="left"><b>Drivetrain</b></td>
    <td align="left"><b>Power (KW)</b></td>
    <td align="left"><b>Touge (NM)</b></td>
    <td align="left"><b>Weight (KG)</b></td>
    <td align="left"><b>Top Speed (KPH)</b></td>
    <td align="left"><b>Lap Time</b></td></tr>';
    while ($row = mysqli_fetch_array($response)) {
        echo '<tr><td align="left">' .
            $row['year'] . '</td><td align="left">' .
            $row['manufacturer'] . '</td><td align="left">' .
            $row['model'] . '</td><td align="left">' .
            $row['value'] . '</td><td align="left">' .
            $row['division'] . '</td><td align="left">' .
            $row['pi'] . '</td><td align="left">' .
            $row['engine'] . '</td><td align="left">' .
            $row['engine_layout'] . '</td><td align="left">' .
            $row['drivetrain'] . '</td><td align="left">' .
            $row['power_kw'] . '</td><td align="left">' .
            $row['touge_nm'] . '</td><td align="left">' .
            $row['weight_kg'] . '</td><td align="left">' .
            $row['top_speed_kph'] . '</td><td align="left">' .
            $row['lap_time'] . '</td><td align="left">';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo "it didn't work";
    echo mysqli_error($con);
}
mysqli_close($con);
