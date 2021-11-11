CREATE DATABASE portfolio2 CHARACTER SET utf8 COLLATE utf8_general_ci;
USE portfolio2;
CREATE USER 'p_user'@'localhost';
GRANT ALL ON *.* to 'p_user'@'localhost';
SET PASSWORD FOR 'p_user'@'localhost' = PASSWORD('p0rtfo1io');

CREATE TABLE key_table(
key_id INT AUTO_INCREMENT,
key_value varchar(64) NOT NULL,
key_memo varchar(64),
delete_flag INT DEFAULT 0,
PRIMARY KEY (key_id)
);

CREATE TABLE log_table(
log_id INT AUTO_INCREMENT,
key_id INT,
log_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (log_id),
FOREIGN KEY(key_id) references key_table(key_id)
);

CREATE VIEW view_log AS 
SELECT log_id , log_date , key_table.key_memo
FROM log_table
INNER JOIN key_table
ON log_table.key_id = key_table.key_id
WHERE log_date;

INSERT INTO key_table(key_value,key_memo) VALUES ('test', 'テスト用');