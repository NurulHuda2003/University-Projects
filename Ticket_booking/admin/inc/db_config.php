
<?php

$hostname = "localhost";
$username = 'root';
$pass = '';
$db = 'ticket_booking';

$con = mysqli_connect($hostname, $username, $pass, $db);

if (!$con) {
    die("Cannot connect to database" . mysqli_connect_error());
    //die stops the connection 
}

function filteration($data)  // this funtion will filter data (array will be pass in this)
{
    foreach ($data as $key => $value) {   //extracting key and value  
        //four function: 1.trim() 2.stripslahes()  3.htmlspecialchars() 4.strip_tags()
        $value = trim($value); // key value of that will be pass on trim
        $value = stripslashes($value);
        $value = strip_tags($value);
        $value = htmlspecialchars($value);



        $data[$key] = $value;
    }
    return $data; // this is the filtered data
}

function selectALL($table)
{
    $con = $GLOBALS['con'];
    $res = mysqli_query($con, "SELECT * from $table");
    return $res;
}

//Prepared statement
function select($sql, $values, $datatypes) //for prepared statement
{
    $con = $GLOBALS['con']; // cannot use global value without using GLOBALS

    if ($stmt = mysqli_prepare($con, $sql)) { //storing the prepared statement in variable if its true
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values); //... = splat operator for dynamic value input  // binding them 

        if (mysqli_stmt_execute($stmt)) { //executing them if true value return 
            $res = mysqli_stmt_get_result($stmt); // getting the result of the statement and then closing . cannot be after closing
            mysqli_stmt_close($stmt); // before everything finish have to close the statement 
            return $res;        // returning the value

        } else {  //if not true value return to execute then die
            mysqli_stmt_close($stmt);
            die("Query cannot be executed - Select");
        }
    } else { // if the prepared statement not posssible 
        die("Query cannot be prepared - Select");
    }
}

function update($sql, $value, $datatypes)
{
    $con = $GLOBALS['con'];
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$value); //here its not single value?   its arrays of values so .. needed
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            mysqli_stmt_close($stmt);
            die("Query cannot be executed-Update");
        }
    } else {
        die("Query cannot be prepared -Update");
    }
}

function insert($sql, $value, $datatypes)
{
    $con = $GLOBALS['con'];
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$value); //here its not single value?   its arrays of values so .. needed
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            mysqli_stmt_close($stmt);
            die("Query cannot be executed-INsert");
        }
    } else {
        die("Query cannot be prepared -Insert");
    }
}

function delete($sql, $value, $datatypes)
{
    $con = $GLOBALS['con'];
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$value); //here its not single value?   its arrays of values so .. needed
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            mysqli_stmt_close($stmt);
            die("Query cannot be executed-DELETE");
        }
    } else {
        die("Query cannot be prepared -DELETE");
    }
}

?>