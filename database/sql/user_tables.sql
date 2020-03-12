USE sip_db;

CREATE TABLE IF NOT EXISTS `User` (
	id_user INT PRIMARY KEY AUTO_INCREMENT,
    second_name VARCHAR(255) NOT NULL,
    first_name VARCHAR(255) NOT NULL,
    patronymic VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    email_verified_at TIMESTAMP,
    password VARCHAR(255) NOT NULL
	/* remember tokens */
    /* timestamps */
);

CREATE TABLE IF NOT EXISTS `Teacher` (
	id_teacher INT NOT NULL PRIMARY KEY,
    id_post INT NOT NULL,
    id_post_type INT NOT NULL,
    id_degree INT NOT NULL
);
