CREATE DATABASE IF NOT EXISTS my_bd;
CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'password';
GRANT SELECT,UPDATE,INSERT,DELETE ON my_bd.* TO 'user'@'%';
FLUSH PRIVILEGES;

USE my_bd;
CREATE TABLE IF NOT EXISTS users (
  ID INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(20) NOT NULL,
  surname VARCHAR(40) NOT NULL,
  PRIMARY KEY (ID)
);
CREATE TABLE IF NOT EXISTS posts (
  ID INT(11) NOT NULL AUTO_INCREMENT,
  text text NOT NULL,
  ID_user INT(11) NOT NULL,
  FOREIGN KEY (ID_user) REFERENCES users(ID) ON DELETE CASCADE ON UPDATE CASCADE,
  PRIMARY KEY (ID)
);

INSERT INTO users (name, surname)
SELECT * FROM (SELECT 'Alex', 'Rover') AS tmp
WHERE NOT EXISTS (
    SELECT name FROM users WHERE name = 'Alex' AND surname = 'Rover'
) LIMIT 1;

INSERT INTO users (name, surname)
SELECT * FROM (SELECT 'Bob', 'Marley') AS tmp
WHERE NOT EXISTS (
    SELECT name FROM users WHERE name = 'Bob' AND surname = 'Marley'
) LIMIT 1;

INSERT INTO posts (text, ID_user)
SELECT * FROM (SELECT 'textetxttd', 1) AS tmp
WHERE NOT EXISTS (
    SELECT text FROM posts WHERE text = 'textetxttd' AND ID_user = 1
) LIMIT 1;

INSERT INTO posts (text, ID_user)
SELECT * FROM (SELECT 'tezxctd', 2) AS tmp
WHERE NOT EXISTS (
    SELECT text FROM posts WHERE text = 'tezxctd' AND ID_user = 2
) LIMIT 1;
