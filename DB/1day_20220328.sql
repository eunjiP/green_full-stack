-- DCL(데이터 제어어/유저 만들고, 유저 권한 주고)
-- 아직 안 배우기 전

-- DML(데이터 조작어)

-- DDL(데이터 정의어)
-- : create, drop, alter, truncate
membertbl
CREATE DATABASE test;
DROP DATABASE test;

USE test;
-- PRIMARY KEY를 넣는 방법1.
CREATE TABLE memberTBL (
	memberID CHAR(8) NOT NULL PRIMARY KEY,
	memberName CHAR(5) NOT NULL,
	memberAddress CHAR(20) NULL
);
-- PRIMARY KEY를 넣는 방법2.
CREATE TABLE memberTBL (
	memberID CHAR(8),
	memberName CHAR(5) NOT NULL,
	memberAddress CHAR(20) NULL
	PRIMARY KEY (memberID)
);

DROP TABLE membertbl;

CREATE TABLE producttbl (
	productName CHAR(4) PRIMARY KEY,
	cost INT NOT NULL,
	MAKEDATE DATE,
	company CHAR(5),
	amount INT NOT null
);

-- CRUD, DML(데이터 조작어)
-- Create( insert문)
INSERT INTO membertbl
(memberid, membername, memberaddress)
VALUES
(1, '홍길동', '서울시');

INSERT INTO membertbl
(memberid, membername, memberaddress)
VALUES
(2, '홍길동', '서울시');

INSERT INTO membertbl
(memberid, membername)
VALUES
(3, '홍길동');

-- membername은 not null이기 때문에 에러 발생
INSERT INTO membertbl
(memberid)
VALUES
(4);

INSERT INTO membertbl
(memberid, membername)
VALUES
(5,'신사임당'),
(6, '유관순'),
(7, '나이팅게일');

-- 컬럼명 생략하는 방법은 안 쓰는게 좋다.(참고만 하기)
INSERT INTO membertbl
VALUES
(8,'사나이','신사임당');

INSERT INTO membertbl
(membername, memberid)
VALUES
('신사임당', 10);

-- Read (select문)
/*
SELECT 보고싶은 컬럼명들 FROM 테이블명
[JOIN 테이블 연결]
[WHERE 보고싶은 조건]	- 부분만 보고 싶을때
[GROUP BY 그룹으로 묶는 조건]
[HAVING 그룹으로 묶는 조건에서의 조건]
[ORDER BY 레코드 순서지정]
[LIMIT 보고 싶은 레코드 수]
*/
SELECT memberid, membername, memberaddress
FROM membertbl;

SELECT * FROM membertbl;

SELECT membername
FROM membertbl;

SELECT * FROM membertbl
WHERE memberid = '1';

SELECT * FROM membertbl
WHERE membername = '홍길동';

SELECT * FROM membertbl
WHERE memberaddress = '서울시';

SELECT * FROM membertbl
WHERE memberaddress != '서울시';
-- == WHERE memberaddress <> '서울시'; DB만 가능

SELECT * FROM membertbl
WHERE memberaddress IS NULL;

SELECT * FROM membertbl
WHERE memberaddress IS not NULL;

-- 주소가 '부산시' 이면서 이름이 '사나이'인 레코드
SELECT * FROM test.membertbl
WHERE membername = '사나이'
and memberaddress = '부산시';

-- LIKE문은 문자열 포함된 레코드를 찾을때 사용
SELECT * FROM membertbl
WHERE membername LIKE '%팅%';	-- 어디 있든 상관없다.

SELECT * FROM membertbl
WHERE membername LIKE '사%';	--  앞 글자에 '사'

SELECT * FROM membertbl
WHERE membername LIKE '%이';	-- 뒷 글자에 '이'


-- Update (update문)
/*
	UPDATE 테이블명
	SET 수정하고 싶은 컬럼명 = 변경 하고 싶은 값
	WHERE 레코드 선택
*/
UPDATE membertbl
SET membername = '게일'
WHERE memberid = '7';	-- where절이 없으면 모든 레코드에 적용(수정/삭제시에는 백업 필수)

UPDATE membertbl
SET membername = 'gugu',
memberaddress = '강원도'
WHERE memberid = '9';

UPDATE membertbl
SET membername = '111',
memberaddress = '22'
WHERE memberid = '0';

/*
	my NAME IS hong
camel case	: myNameIsHong
pascal case	: MyNameIsHong
snke case	: my_name_is_hong  PHP에서 주로
cabob case 	: my-name-is-hong 
*/

-- Delete (delete문)
/*
DELETE FROM 테이블명 WHERE 절
*/
-- 주소가 null인 레코드는 삭제
DELETE FROM membertbl 
WHERE memberaddress IS NULL;

DELETE FROM membertbl 
WHERE memberid = '8';

/*
<   : 미만
<=  : 이하
>   : 초과
>=  : 이상
*/

-- 문자열인 memberid를 형변환 후 서울시인 주소 
SELECT * FROM membertbl
WHERE CONVERT(memberid, INT) BETWEEN 1 AND 10
AND memberaddress = '서울시';

-- 형변환 방법2
SELECT *, CAST(memberid AS INT)
FROM membertbl
WHERE memberid BETWEEN 1 AND 10;

-- DB는 프로그래밍 언어처럼 연결하지 않고 자동적으로 형을 변환해서 덧셈처리를 한다.
SELECT 'a' * '11' AS num;

-- 수의 연결을 원할때는 concat을 호출해야한다.
SELECT CONCAT('1', ' ','11');

-- CONCAT이 적용되는 순서
SELECT CONCAT('1', CONCAT(' ', CONCAT('11', '안녕')));
SELECT CONCAT('1', CONCAT(' ', '11안녕'));
SELECT CONCAT('1',' 11안녕');
SELECT '1 11안녕';

SELECT * FROM employees
WHERE emp_no >= 10010 AND emp_no <= 10020;

SELECT * FROM employees
WHERE emp_no BETWEEN 10010 AND 10020;

SELECT * FROM employees WHERE emp_no = 10000;

-- d001, d003, d005인 데이터를 가지고 와라
SELECT * FROM departments
WHERE dept_no = 'd001' 
or dept_no = 'd003' 
or dept_no = 'd005';

-- 가독성을 위해서 IN을 사용하는게 좋다.
SELECT * FROM departments
WHERE dept_no IN ('d001', 'd003', 'd005');

-- 홀수
SELECT * FROM employees
WHERE emp_no % 2 = 1;

-- 짝수
SELECT * FROM employees
WHERE emp_no % 2 = 0;





