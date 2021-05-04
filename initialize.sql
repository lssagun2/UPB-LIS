CREATE TABLE MATERIAL (
	mat_id 				INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	mat_acc_num			VARCHAR(20)	UNIQUE NOT NULL,
	mat_acc_num1		VARCHAR(3),
	mat_acc_num2		VARCHAR(6),
	mat_barcode			VARCHAR(20),
	mat_call_num		VARCHAR(20),
	mat_call_num1		VARCHAR(4),
	mat_call_num2		VARCHAR(4),
	mat_call_num3		VARCHAR(4),
	mat_call_num4		VARCHAR(4),
	mat_call_num5		VARCHAR(4),
	mat_call_num6		VARCHAR(4),
	mat_call_num7		VARCHAR(4),
	mat_call_num8		VARCHAR(4),
	mat_title			VARCHAR(1000),
	mat_author			VARCHAR(100),
	mat_volume			INT,
	mat_year			INT(4),
	mat_edition			INT,
	mat_publisher		VARCHAR(1000),
	mat_pub_year		INT(4),
	mat_circ_type		VARCHAR(100),
	mat_type 			VARCHAR(20),
	mat_status			VARCHAR(10),
	mat_location		VARCHAR(100),
	mat_source			VARCHAR(20),
	mat_lastinv_year	INT(4)
);

CREATE TABLE STAFF (
	staff_id			INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	staff_username		VARCHAR(20) NOT NULL,
	staff_firstname		VARCHAR(20) NOT NULL,
	staff_lastname		VARCHAR(20) NOT NULL,
	staff_password		VARCHAR(20) NOT NULL
);

CREATE TABLE INVENTORY (
	mat_id				INT UNSIGNED PRIMARY KEY
);

CREATE TABLE CHANGES (
	change_id			INT	UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	staff_id 			INT NOT NULL,
	mat_id				VARCHAR(20) NOT NULL,
	change_type			VARCHAR(10) NOT NULL,
	change_date			DATETIME NOT NULL,
	change_prev_info	TEXT
);
