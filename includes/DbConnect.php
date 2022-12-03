
<?php 

	class DbConnect{

        /* variable to store database link*/
		private $con; 

        /*class constructor */
		function __construct(){

		}

        /*connecting to the database*/
		function connect(){

			include_once dirname(__FILE__).'/Constants.php';
			$this->con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

            /*checking wthether the error occurred during connecting*/
			if(mysqli_connect_errno()){
				echo "Failed to connect with database".mysqli_connect_err(); 
			}

            /*returning the connection link*/
			return $this->con; 
		}
	}