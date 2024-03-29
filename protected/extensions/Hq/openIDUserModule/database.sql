CREATE TABLE open_id_user(
  id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  email VARCHAR(255) NOT NULL,
  name TINYTEXT NOT NULL,
  roles SET('ADMIN', 'CUSTOMER_CARIER') NOT NULL,
  PRIMARY KEY (id),
  UNIQUE INDEX email (email)
)
ENGINE = INNODB
CHARACTER SET utf8
COLLATE utf8_general_ci;