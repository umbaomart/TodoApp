<?php

/*
INSTRUCTIONS:
This exam tests you on the following.
(item#1) Basic connection using mysql
(item#2) Inner Join Query
(item#3) Calling and using functions declared in a class
(item#4) Basic output of array into a prepared html table
(item#5) Bonus Item - It is up to you how to do it

/* ------- item#1 ----------
Using the following information, connect to the database using mysql
host: 192.168.72.192
username: exam_user or exam_user2
password: exam_password
database name: exam_db
 */

// ITEM #1

// $link = mysqli_connect($host, $user, $pass, $db);

// if (!$link) {
//     echo "Error: Unable to connect to MySQL." . PHP_EOL;
//     echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
//     echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
//     exit;
// }

class User_List
{

	private $host = "192.168.72.192";
	private $user = "exam_user";
	private $pass = "exam_password";
	private $dbname = "exam_db";
	private $dbh;
	private $stmt;
	private $error;

	public function __construct() {
		// Set DSN
		$dsn = 'mysql:host='.$this->host.';dbname='.$this->dbname;
		$options = array(
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		);
		// Create PDO Instance
		try {
			$this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
		} catch (PDOException $e) {
			$this->error = $e->getMessage();
			echo $this->error;
		}
	}

	// Prepare statement with query
	public function query($sql) {
		$this->stmt = $this->dbh->prepare($sql);
		$this->stmt->execute();
	}
	// Bind values
	public function bind($param, $value, $type = null) {
		if (is_null($type)) {
			switch (true) {
				case is_int($value):
					$type = PDO::PARAM_INT;
					break;
				case is_bool($value):
					$type = PDO::PARAM_BOOL;
					break;
				case is_null($value):
					$type = PDO::PARAM_NULL;
					break;
				default:
					$type = PDO::PARAM_STR;
			}
		}
		$this->stmt->bindValue($param, $value, $type);
	}

	// Execute the prepared statement
	public function execute() {
		return $this->stmt->execute();
	}
	// Get result set as array of objects
	public function resultSet() {
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	public function single() {
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}
	public function rowCount() {
		return $this->stmt->rowCount();
	}

	
// ======================================================
    public function _query($sql_query)
    {
        $result = mysql_query($sql_query) or die(mysql_error());
        $rows   = array();
        while ($row = mysql_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function getStudentListArray()
    {
        $sql = 'SELECT * FROM student';
        return $this->_query($sql);
    }

    public function getStudentAndClassesArray()
    {
        /*
        ------- item#2 ----------
        Using SQL Joins, generate a query for fetching all the
        needed contents for the html output (refer to the exam)
        and store the result into an associative array
        Sample structure:
        array
        0 =>
        array
        'last_name' => string 'Geronimo'
        'first_name' => string 'Sarah'
        'school_name' => string 'North High School'
        'class_name' => string 'Communication Arts'
        1 =>
        array (size=4)
        'last_name' => string 'Pempengco'
        'first_name' => string 'Charice'
        'school_name' => string 'East High School'
        'class_name' => string 'Communication Arts'
         */

        $sql = '';

        return $this->_query($sql);
    }
    public function getStudentsWithClassCount()
    {
        /*
        ------- item#5 ----------
        This is a bonus problem. Create a function that returns the number of classes for each student.
         */
        $sql = '';

        return $this->_query($sql);
    }

}

/* ------- item#3 ----------
call the functions you have here and store the function outputs into a variable so you can use it in the tables below.
 */
//set this variable using the getStudentListArray() function from instantiated $newUserList
$newUserList = new User_List();

?>

<div class=content>
	<style>
		table { width:500px; border-color:lightgray; }
		td,th { padding:2px;}
		th {  background-color:lightblue; }
	</style>
	<table border="1" cellspacing='0' cellpadding='0'>
		<thead>
			<tr>
				<th colspan='4'>Basic List</th>
			</tr>

			<?php  
				$newUserList->query('SELECT first_name, last_name FROM student');
				$res = $newUserList->resultSet();

				$data = [
					'students' => $res
				];
				// echo print_r($data['students']);
				// echo print_r($res[0]);
				// foreach ($data['students'] as $students) {
				// 	echo $students['first_name'];
				// }
			?>
			<tr>
				<th>Last Name</th>
				<th>First Name</th>
			</tr>

			<?php foreach($data['students'] as $stud) : ?>
				<tr>
					<td><?php echo $stud['last_name']?></td>
					<td><?php echo $stud['first_name']?></td>
				</tr>
			<? endforeach; ?>
		</thead>
		<tbody>
			<!-- put the output here -->
				<tr>
					<td></td>
					<td></td>
				</tr>
		</tbody>
	</table>
	<br/>
	<table border="1" cellspacing='0' cellpadding='0'>
		<thead>
			<tr>
				<th colspan='4'>Student list with class and school names</th>
			</tr>
			<tr>
				<th>School</th>
				<th>Class</th>
				<th>Last Name</th>
				<th>First Name</th>
			</tr>
		</thead>
		<tbody>
			<?php //------- item#4 ---------- ?>
			<!-- put the output here -->
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
		</tbody>
	</table>
	<br/>
	<table border="1" cellspacing='0' cellpadding='0'>
		<thead>
			<tr>
				<th colspan='3'>Student list with class count</th>
			</tr>
			<tr>
				<th>Class Count</th>
				<th>Last Name</th>
				<th>First Name</th>
			</tr>
		</thead>
		<tbody>
			<?php //------- item#5 ---------- ?>
			<!-- put the output here -->
				<tr>
					<td></td>
					<td></td>
					<td></td>
				</tr>
		</tbody>
	</table>
</div>
