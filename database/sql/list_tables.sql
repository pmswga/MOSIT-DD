USE sip_db;

CREATE TABLE IF NOT EXISTS `ListUserType` (
	id_user_type INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    caption VARCHAR(255) NOT NULL
);

INSERT INTO `ListUserType` (`caption`) VALUES
	("Методист"),
	("Преподаватель"),
    ("Администратор");

CREATE TABLE IF NOT EXISTS `ListPost` (
	id_post INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    caption VARCHAR(255) NOT NULL
);

INSERT INTO `ListPost` (`caption`) VALUES
	("Заведующий кафедрой"),
    ("Преподаватель"),
    ("Старший преподаватель"),
    ("Асисстент"),
	("Доцент"),
    ("Профессор");

CREATE TABLE IF NOT EXISTS `ListPostType` (
	id_post_type INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    caption VARCHAR(255) NOT NULL
);

INSERT INTO `ListPostType` (`caption`) VALUES
	("Штатный"),
	("Внутренний совместитель"),
    ("Внешний совместитель");

CREATE TABLE IF NOT EXISTS `ListDegree` (
	id_degree INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    caption VARCHAR(255) NOT NULL
);

INSERT INTO `ListDegree` (`caption`) VALUES
	("Старший научный сотрудник"),
	("Кандидат тех. наук"),
	("Доктор тех. наук"),
	("Доцент"),
	("Доктор физмат. наук"),
    ("Профессор");

СНС, Доцент, Профессор - Звания
