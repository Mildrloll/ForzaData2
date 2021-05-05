<html>

<head>
    <title>Add Data</title>
</head>

<body>
    <?php
if (isset($_POST['submit'])) {
    $data_missing = array();
    if (empty($_POST['year'])) {
        $data_missing[] = 'Year';
    } else {
        $year = trim($_POST['year']);
    }
    if (empty($_POST['manufacturer'])) {
        $data_missing[] = 'Manufacturer';
    } else {
        $manufacturer = trim($_POST['manufacturer']);
    }
    if (empty($_POST['model'])) {
        $data_missing[] = 'Model';
    } else {
        $model = trim($_POST['model']);
    }
    if (empty($_POST['value'])) {
        $data_missing[] = 'Value';
    } else {
        $value = trim($_POST['value']);
    }
    if (empty($_POST['division'])) {
        $data_missing[] = 'Division';
    } else {
        $division = trim($_POST['division']);
    }
    if (empty($_POST['pi'])) {
        $data_missing[] = 'PI';
    } else {
        $pi = trim($_POST['pi']);
    }
    if (empty($_POST['engine'])) {
        $data_missing[] = 'Engine';
    } else {
        $engine = trim($_POST['engine']);
    }
    if (empty($_POST['engine_layout'])) {
        $data_missing[] = 'Engine Layout';
    } else {
        $engine_layout = trim($_POST['engine_layout']);
    }
    if (empty($_POST['drivetrain'])) {
        $data_missing[] = 'Drivetrain';
    } else {
        $drivetrain = trim($_POST['drivetrain']);
    }
    if (empty($_POST['power_kw'])) {
        $data_missing[] = 'Power (KW)';
    } else {
        $power_kw = trim($_POST['power_kw']);
    }
    if (empty($_POST['touge_nm'])) {
        $data_missing[] = 'Touge (NM)';
    } else {
        $touge_nm = trim($_POST['touge_nm']);
    }
    if (empty($_POST['weight_kg'])) {
        $data_missing[] = 'Weight (KG)';
    } else {
        $weight_kg = trim($_POST['weight_kg']);
    }
    if (empty($_POST['top_speed_kph'])) {
        $data_missing[] = 'Top Speed (KPH)';
    } else {
        $top_speed_kph = trim($_POST['top_speed_kph']);
    }
    if (empty($_POST['lap_time'])) {
        $data_missing[] = 'Lap Time';
    } else {
        $lap_time = trim($_POST['lap_time']);
    }
    if (empty($data_missing)) {
        require_once 'connect.php';
        $query = "INSERT INTO cardata (id, year, manufacturer, model,
        value, division, pi, engine, engine_layout, drivetrain, power_kw, touge_nm,
        weight_kg, top_speed_kph, lap_time) VALUES (NOW(), ?, ?,
        ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "ssssssssssssss", $year, $manufacturer, $model, $value, $division, $pi, $engine, $engine_layout, 
        $drivetrain, $power_kw, $touge_nm, $weight_kg, $top_speed_kph, $lap_time);
        mysqli_stmt_execute($stmt);
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        if ($affected_rows == 1) {
            echo 'Data Entered';
            mysqli_stmt_close($stmt);
            mysqli_close($con);
        } else {
            echo 'Error Occurred<br />';
            echo mysqli_error($con);
            mysqli_stmt_close($stmt);
            mysqli_close($con);
        }

    } else {
        echo 'You need to enter the following data<br />';
        foreach ($data_missing as $missing) {
            echo "$missing<br />";
        }

    }

}

?>
    <form action="http://localhost/Mysqltest/dataadded.php" method="post">
        <b>Add a New Data</b>
        <p>Year:
            <input type="text" name="year" size="30" value="" />
        </p>
        <p>Manufacturer:
            <input type="text" name="manufacturer" size="30" value="" />
        </p>
        <p>Model:
            <input type="text" name="model" size="30" value="" />
        </p>
        <p>Value:
            <input type="text" name="value" size="30" value="" />
        </p>
        <p>Division:
            <input type="text" name="division" size="30" value="" />
        </p>
        <p>PI:
            <input type="text" name="pi" size="30" value="" />
        </p>
        <p>Engine:
            <input type="text" name="engine" size="30" value="" />
        </p>
        <p>Engine Layout:
            <input type="text" name="engine_layout" size="30" value="" />
        </p>
        <p>Drivetrain:
            <input type="text" name="drivetrain" size="30" value="" />
        </p>
        <p>Power (KW):
            <input type="text" name="power_kw" size="30" value="" />
        </p>
        <p>Touge (NM):
            <input type="text" name="touge_nm" size="30" value="" />
        </p>
        <p>Weight (KG):
            <input type="text" name="weight_kg" size="30" value="" />
        </p>
        <p>Top Speed (KPH):
            <input type="text" name="top_speed_kph" size="30" value="" />
        </p>
        <p>Lap Time:
            <input type="text" name="lap_time" size="30" value="" />
        </p>
        <p>
            <input type="submit" name="submit" value="Send" />
        </p>
    </form>
</body>

</html>