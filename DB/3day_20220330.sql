-- dept_emp 테이블에서 dept_no의 종류가 몇개가 있는지?
-- DISTINCT : 내가 알고 싶은 컬럼에서 같은 종류는 1개만 나오게 하는것
SELECT DISTINCT dept_no FROM dept_emp;

-- 문제)사원의 직무가 무엇이 있는지 select 해주시오.//총 7종류의 직업
SELECT DISTINCT title 
FROM titles
ORDER BY title;


-- ## LIMIT ? (인자값 1개)/ LIMIT ?, ? (인자값 2개)
-- 처음 부터 ?개 (정렬했다면 정렬한 처음 부터 ?개)
SELECT * FROM employees
LIMIT 30;

-- 앞의 인자 : 인덱스 (0 - 처음) /뒤의 인자 : 갯수
SELECT * FROM employees
LIMIT 20, 10;
-- 처음부터 10개만 보여줘

/*
LIMIT 문제)가장 많은 연봉을 받은 금액 3개만 나오도록 해주세요.
(사람, 연도 상관없음)
*/
SELECT * FROM salaries
ORDER BY salary DESC
LIMIT 3;

/*
LIMIT 문제 심화)위의 결과에서 5~10위만 나오도록
*/
SELECT * FROM salaries
ORDER BY salary DESC
LIMIT 4, 6;


-- 테이블에서 복사하면 스키마만 복사
-- 안에 내용까지 복사하는 방법(하지만 제약 조건까지는 복사안됨)
CREATE TABLE departments_temp
(SELECT * FROM departments);

-- 테이블 칼럼, 데이터 타입, 레코드 복사.(스키마 X)
CREATE TABLE departments_temp2 AS 
SELECT * FROM departments;

-- 테이블 스키마 복사(레코드X)
CREATE TABLE departments_temp3
LIKE departments;
-- 스키마를 복사한 테이블에 내용 삽입
INSERT into departments_temp3
SELECT * FROM departments;


-- 그룹 함수 min(최소), max(최대), sum(합-null은 제외됨), avg(평균-null은 제외됨), count(갯수)

-- group by를 사용 안 했을때는 전체에서  값을 가져온다.(전체라는게 중요)
SELECT MIN(salary), MAX(salary), SUM(salary), AVG(salary), COUNT(emp_no) 
FROM salaries;


-- group by 사용(DISTINCT와 비슷한데 그룹함수와 쓰기 위한 용도 차이)
-- 각각의 그룹 별로 함수를 적용가능
-- group by 에 적은 컬럼만 SELECT할 수 있다고 생각하는게 좋다.
SELECT emp_no, MIN(salary), MAX(salary), SUM(salary), AVG(salary), COUNT(emp_no)
FROM salaries
GROUP BY emp_no;

/*
group by 문제) 부서별 사원 수
*/
-- 틀림) 직업별 직원 수
SELECT title, COUNT(emp_no)
FROM titles
GROUP BY title;


-- 답)
SELECT dept_no, COUNT(*) FROM dept_emp
GROUP BY dept_no
ORDER BY COUNT(*) DESC;


-- HAVING : group by절안에서 조건을 더 주고 싶을 때 사용
-- 부서별 사원수, 부서별 사원수가 20,000명 이상인 부서만 나오도록 한다.
SELECT dept_no, COUNT(*) FROM dept_emp
GROUP BY dept_no
HAVING COUNT(*) >= 20000
ORDER BY COUNT(*) DESC;


-- ROLLUP총합이 필요할 경우 사용
SELECT dept_no, COUNT(*)
FROM dept_emp
GROUP BY dept_no
WITH ROLLUP;


-- 응용 문제) 가장 적은 salary를 받은 사람의 이름이 나오도록 해주세요.
-- 내가 생각한 답1) 서브쿼리3번, 그룹 함수 이용한 방법
SELECT * FROM employees
WHERE emp_no = (SELECT emp_no FROM salaries
WHERE salary = (SELECT min(salary) FROM salaries));
-- 만약 최저가 2명이상일 경우
SELECT * FROM employees
WHERE emp_no IN (SELECT emp_no FROM salaries
WHERE salary = (SELECT min(salary) FROM salaries));

-- 내가 생각한 답2) 서브쿼리 1번, order by와 limit 활용 (LIMIT랑 all, any, in사용 불가)
SELECT * FROM employees
WHERE emp_no = (
SELECT emp_no FROM salaries
ORDER BY salary
LIMIT 1);

-- AUTO_INCREMENT : 자동 숫자 증가//실수하더라도 카운트 됨
-- 옵션이 여러가지 존재 (ex-2개씩 증가 라던지, 실수 일때 카운트 안되게 하는 방법)
USE `test`;

CREATE TABLE t_hobbit(
   i_hobbit INT UNSIGNED AUTO_INCREMENT,
   nm VARCHAR(10) UNIQUE NOT NULL,
   PRIMARY KEY (i_hobbit)
);

-- 취미만 넣어도 자동적으로 i_hobbit 증가
INSERT INTO t_hobbit (nm)
VALUES ('농구');

INSERT INTO t_hobbit (nm)
VALUES ('축구');

INSERT INTO t_hobbit (nm)
VALUES ('배구');

SELECT * FROM t_hobbit;


CREATE TABLE t_hobbit2(
   hobbit_id INT UNSIGNED PRIMARY KEY,
   name VARCHAR(20) NOT NULL,
   created_at DATETIME DEFAULT NOW()
);
-- 초기값으로 입력
INSERT INTO t_hobbit2 (hobbit_id, NAME)
VALUES (1, '핸드볼');
-- 날짜만 수정(시간은 00:00:00으로 입력됨)
INSERT INTO t_hobbit2 (hobbit_id, NAME, created_at)
VALUES (2, '등산', '2022-02-10');
-- 날짜, 시간 모두 수정
INSERT INTO t_hobbit2 (hobbit_id, NAME, created_at)
VALUES (3, '독서', '2022-02-10 12:12:13');

SELECT * FROM t_hobbit;
SELECT * FROM t_hobbit2;


-- PK의 중복으로 입력 안됨//오류
INSERT INTO t_hobbit2
(hobbit_id, NAME)
SELECT i_hobbit, nm FROM t_hobbit;

-- 중복 안되게 +3 시켜서 입력(가공)
INSERT INTO t_hobbit2
(hobbit_id, NAME)
SELECT i_hobbit + 3, nm FROM t_hobbit;



-- 각 직업별로 평균 급여를 보고 싶으면 어떻게 하면 될까요?(join을 사용)
USE `employees`;
SELECT * FROM salaries;

SELECT title, AVG(salary) AS avg_salary
FROM titles A
INNER JOIN salaries B
ON A.emp_no = B.emp_no
GROUP BY A.title;


-- emp_no : 10001의 모든 salary를 1,000씩 올리고 싶다.
UPDATE salaries
SET salary = salary + 1000		-- 프로그래밍 언어 +=는 사용 불가
WHERE emp_no = 10001;


SELECT * FROM salaries;
WHERE emp_no = 10001;


-- INSERT IGNORE 
-- 오류 나면 뒤에 있는 모든 것 또한 안됨
SELECT * FROM t_hobbit2;
INSERT INTO t_hobbit2 ( hobbit_id, NAME) VALUES (8, '탁구');
INSERT INTO t_hobbit2 ( hobbit_id, NAME) VALUES (9, '스키');

-- 오류난 거는 무시하고 뒤에꺼는 실행(경고창은 동일하게 뜬다)
SELECT * FROM t_hobbit2;
INSERT IGNORE INTO t_hobbit2 ( hobbit_id, NAME) VALUES (8, '탁구');
INSERT IGNORE INTO t_hobbit2 ( hobbit_id, NAME) VALUES (9, '스키');

-- 첫번째 줄만 실행 시에는 오류가 나서 있는지 확인 후에 수정
INSERT INTO t_hobbit2 ( hobbit_id, NAME) VALUES (7, '탁구');

-- 하지만 아래 ON DUPLICATE KEY UPDATE를 사용하면 없으면 추가하고 있으면 수정해라
-- PK와 unique 모두 적용됨
INSERT INTO t_hobbit2 ( hobbit_id, NAME) VALUES (7, '탁구')
ON DUPLICATE KEY UPDATE NAME = '수영';


-- ON DUPLICATE KEY 예시
DROP TABLE t_board;
CREATE table t_board (
i_board INT UNSIGNED PRIMARY KEY,
title VARCHAR(20) UNIQUE NOT NULL,
hits INT UNSIGNED DEFAULT 0
);
 
SELECT * FROM t_board;
-- 없으면 값을 1, 0을 넣고 있으면 있으면 hits가 +1이 된다.
-- 만약 values 안에 있는 PK가 없으면 존재하는 순서에 마지막 항목에만 추가가 되지만,
-- 존재하는 PK값이면 그 값에만 추가가 이루어진다.
INSERT INTO t_board (i_board, title,hits) VALUES (3, '바이', 0)
ON DUPLICATE KEY UPDATE hits = hits + 1;


-- 임시 테이블을 만들고 as문 안에 있는 내용을 가져오겠다.(참고만)
WITH dept_emp_d001(emp_no, from_date, to_date)
AS (
   SELECT emp_no, from_date, to_date 
	FROM dept_emp
   WHERE dept_no = 'd001'
)
SELECT * FROM dept_emp_d001;
-- 서브쿼리에 as를 주고 사용하는것과 동일가 가능해서 with는 잘 사용안함
SELECT A.* FROM
(
   SELECT emp_no, from_date, to_date 
	FROM dept_emp
   WHERE dept_no = 'd001'
) A;


-- SQL 문제) T_ORDER, T_CUSTONER 테이블 생성
CREATE TABLE t_order (
o_no INT UNSIGNED PRIMARY KEY,
cus_no INT UNSIGNED,
o_date DATE DEFAULT NOW(),
o_price INT DEFAULT 0,
FOREIGN KEY (cus_no) REFERENCES t_customer (cus_no)
);

CREATE TABLE t_customer (
cus_no INT UNSIGNED PRIMARY KEY,
nm VARCHAR(10) NOT NULL
);


-- nm VARCHAR(10)항상 괄호 안의 자리수를 다 차지 하지 않으면 효율적
-- nm CHAR(10) 항상 같은 자리수를 차지 할 경우 좋다.

DROP TABLE t_order;
DROP TABLE t_customer;


-- 외래키 : 연결하는 두 테이블에서 참조하는 값이 잘못 입력되지 않도록 방지
-- 참조를 당하는 쪽을 먼저 생성 하고 참조하는 테이블을 생성해야한다.
-- 형태 : FOREIGN KEY (참조하려는 칼럼명-fk할 칼럼명) REFERENCES 참조하는 테이블명 (칼럼명)


SELECT * from t_order;

-- 문제) 테이블에 값입력	//값입력때도 참조할 값이 먼저 입력되야함!!
INSERT INTO t_customer
(cus_no, nm)
VALUES 
(3, '홍길동'),
(5, '이순신');

INSERT INTO t_order
(o_no, cus_no, o_price)
VALUES 
(1, 3, 55000),
(2, 5, 70000),
(3, 3, 60000);

-- 수정 문제
UPDATE t_customer
SET nm = '장보고'
WHERE cus_no = 5;

-- 삭제 문제
DELETE FROM t_order
WHERE o_no = 2;

-- 조회 문제
SELECT * FROM t_order;

SELECT * FROM t_order
WHERE cus_no = 3;

SELECT o_no, o_price FROM t_order
WHERE cus_no = 3;


-- FK 설정으로 입력 안된다.
-- 오류 멘트 : foreign key constraint fails
INSERT INTO t_order
(o_no, cus_no, o_price)
VALUES 
(4, 4, 55000);


