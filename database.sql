
CREATE DATABASE intranet_escola;
USE intranet_escola;
CREATE TABLE IF NOT EXISTS users (
  user_id int(4) NOT NULL AUTO_INCREMENT,
  username varchar(50) NOT NULL,
  user_password varchar(32) NOT NULL,
  user_first_name varchar(255) NOT NULL,
  user_last_name varchar(255) NULL,
  sex char(1) null,
  user_birth_date date NULL,
  user_date_creation date NULL,
  PRIMARY KEY(user_id) 
) ;


INSERT INTO users (user_id, username, user_password, user_first_name, user_birth_date, user_date_creation) VALUES
(1, 'admin', '6b52c479ec73a4fea208ae447ded9ca4', 'Administrador', CURRENT_DATE(), CURRENT_DATE() );


