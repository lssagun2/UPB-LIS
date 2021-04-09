CREATE TABLE MATERIAL (
	mat_id 				INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	mat_acc_num			VARCHAR(20)	UNIQUE NOT NULL,
	mat_barcode			VARCHAR(20) UNIQUE,
	mat_call_num		VARCHAR(20),
	mat_title			TEXT,
	mat_author			VARCHAR(20),
	mat_volume			INT,
	mat_year			INT(4),
	mat_edition			INT,
	mat_publisher		VARCHAR(40),
	mat_pub_year		INT(4),
	mat_circ_type		VARCHAR(20),
	mat_type 			VARCHAR(20),
	mat_status			VARCHAR(10),
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
	mat_id				INT UNSIGNED PRIMARY KEY,
	mat_acc_num			VARCHAR(20)	UNIQUE NOT NULL,
	mat_barcode			VARCHAR(20) UNIQUE,
	inv_2020			INT,
	date_2020			DATETIME,
	staff_id_2020		VARCHAR(20),
	inv_2019			INT,
	date_2019			DATETIME,
	staff_id_2019		VARCHAR(20),
	inv_2018			INT,
	date_2018			DATETIME,
	staff_id_2018		VARCHAR(20),
	CONSTRAINT inv_mat_id
		FOREIGN KEY (mat_id)
		REFERENCES MATERIAL (mat_id)
		ON DELETE CASCADE,
	CONSTRAINT inv_mat_acc_num
		FOREIGN KEY (mat_acc_num)
		REFERENCES MATERIAL (mat_acc_num)
		ON UPDATE CASCADE,
	CONSTRAINT inv_mat_barcode
		FOREIGN KEY (mat_barcode)
		REFERENCES MATERIAL (mat_barcode)
		ON UPDATE CASCADE
);

CREATE TABLE CHANGES (
	change_id			INT	UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	staff_id 			INT NOT NULL,
	mat_id				VARCHAR(20) NOT NULL,
	change_type			VARCHAR(10) NOT NULL,
	change_date			DATETIME NOT NULL,
	change_prev_info	TEXT
);
