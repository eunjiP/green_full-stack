CREATE TABLE t_todo (
	itodo INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	todo VARCHAR(100) NOT NULL,
	created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

