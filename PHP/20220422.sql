-- PRIMARY KEY:unique/not null/index(속도를 빠르게 해줌)
CREATE TABLE t_user (
	i_user INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	uid VARCHAR(20) UNIQUE NOT NULL,
	upw CHAR(30) NOT NULL,
	nm VARCHAR(5) NOT NULL,
	gender INT not null CHECK(gender IN(0, 1)),
	created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
	updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- 속성 변경(ALTER ~ modify)/칼럼명, 
-- 타입 변경(ALTER ~ change), 
-- ALTER ~ rename으로 테이블명 변경가능
ALTER TABLE t_user modify upw VARCHAR(30) NOT NULL; 

SELECT * FROM t_user;

CREATE TABLE t_board (
	i_board INT UNSIGNED AUTO_INCREMENT,
	title VARCHAR(100) NOT NULL,
	ctnt VARCHAR(2000) NOT NULL,
	i_user INT UNSIGNED NOT NULL,
	created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
	updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY(i_board),
	FOREIGN KEY (i_user) REFERENCES t_user(i_user)
);

SELECT * FROM t_board;