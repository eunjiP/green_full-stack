USE `employees`;

SELECT * FROM departments;


/*
문제1.departments테이블에 레코드를 등록해주세요.
dept_no : d010
dept_name : 'Business' */
INSERT INTO departmentsemployeesemployees
(dept_no, dept_name)
VALUES ('d010', 'Business');
-- dept_name : UNIQUE가 들어가면 같은 값을 넣을 수 없다.

SELECT * FROM employees
WHERE emp_no = 500000;


/* 
문제2. employees 테이블에 근로자 등록
emp_no : 500000
birth_date : 1999-10-10
first_name : Gildong
last_name : Hong
gender : M
hire_date : 2022-03-29
*/
INSERT INTO employees
(emp_no, birth_date, first_name, last_name, gender, hire_date)
VALUES 
(500000, '1999-10-10', 'Gildong', 'Hong', 'M', '2022-03-29');


/*
문제3.employees 테이블에서 여자면서 
last_name에 'ch'가 포함되어 있는 사람들 모두
select 하시오.
*/
SELECT * FROM employees
WHERE gender = 'F' AND last_name LIKE '%ch%';

-- 생일칼럼에서 앞 4자만 가지고 오도록 
SELECT LEFT(birth_date, 4) FROM employees;

-- 년도가 1952년인 사람만 찾기
SELECT * FROM employees
WHERE LEFT(birth_date, 4) = '1952';

-- 위와 동일한 결과
SELECT * FROM employees
WHERE birth_date LIKE '1952%';

-- like랑 같이 사용하는 자리 조건 '_' 사용
SELECT * FROM employees
WHERE birth_date LIKE '____-11-__';

-- 1960년 이상(like로는 대체 불가하므로 left이용)
SELECT * FROM employees
WHERE LEFT(birth_date, 4) >= '1960';

-- right 활용
SELECT * FROM employees
WHERE right(birth_date, 2) >= '20';

-- mid 활용(6번째위치에서 2개-맨앞부터 1)
SELECT * FROM employees
WHERE mid(birth_date, 6, 2) = '12';


SELECT * FROM employees
WHERE emp_no = 500000;

-- CAST 형식 : CAST(바꾸고 싶은 곳 AS 타입형)
-- 강제로 숫자를 들고와서 거기서 수를 뺏셈한 결과를 확인
SELECT birth_date 
 , CAST(LEFT(birth_date, 4) AS INT) - 10
 , LEFT(birth_date, 4) AS l4
 , mid(birth_date, 6, 2) AS m2
 , right(birth_date, 2) AS r2
FROM employees;


/*
문제4.employees 테이블에서
emp_no = 500000 사원의 성별은 여성으로 바꾸고,
hire_date는 2021-03-29로 바꾸고,
first_name은 Jindong으로 변경
*/
UPDATE employees
SET gender = 'F', hire_date = '2021-03-29', first_name = 'Jindong'
WHERE emp_no = 500000;


/*
문제5.employees 테이블에서
고용일자가 2020년 이후인 사람들 삭제하는 쿼리문
*/
DELETE from employees
WHERE LEFT(hire_date, 4) >= '2020';

SELECT * from employees
WHERE LEFT(hire_date, 4) >= '2020';

-- AS :  컬럼명을 잠시 바꾸는 기능(실제 명이 변경된건 아니다)
-- 생략가능!
SELECT emp_no my_no FROM employees
WHERE LEFT(hire_date, 4) <= '2020';

-- 테이블 명에 as를 주는 경우
SELECT A.emp_no my_no FROM employees A
WHERE LEFT(hire_date, 4) <= '2020';

-- 칼럼의 타입이나 어떤 규칙을 줬는지 확인 하는 방밥(많이 사용은 안함)
DESC employees;


-- 서브 쿼리

-- emp_no = 499613인 직원의 생년월일과 같은 사람을 찾자
-- 1.데이터를 확인 후에 적용하는 방법
SELECT * FROM employees
WHERE birth_date = '1953-06-09';

-- 2.emp_no = 499613인 직원의 생년월일을 확인하는 방법
SELECT birth_date FROM employees
WHERE emp_no = 499613;

-- 서브쿼리 (1. + 2. 을 합한다.)
SELECT * FROM employees
WHERE birth_date = 
(SELECT birth_date FROM employees
WHERE emp_no = 499613);


/*
서브쿼리 문제)emp_no 499619 인 사람과 같은 성별을 가진 사람만 찾아라
*/
-- 499619인 사람 포함
SELECT * FROM employees
WHERE gender = (SELECT gender FROM employees
WHERE emp_no = 499619);

-- 499619를 뺀 나머지 사람
SELECT * FROM employees
WHERE emp_no != 499619 and gender = (SELECT gender FROM employees
WHERE emp_no = 499619);

/*
= 과 서브 쿼리를 사용할 때는 
서브쿼리가 스칼라값이아야한다.
*/

-- some과 any는 동일하다.(786848개)
-- any : 최솟값보다 높은 거는 다 나옴
SELECT * FROM salaries
WHERE salary >= ANY (SELECT salary FROM salaries
WHERE emp_no = 10010);

SELECT * FROM salaries
WHERE salary = ANY (SELECT salary FROM salaries
WHERE emp_no = 10010);
-- = ANY는 IN으로 대체 가능
SELECT * FROM salaries
WHERE salary in (SELECT salary FROM salaries
WHERE emp_no = 10010);

-- (480870개)
-- all : 전부다 만족해야 나옴
SELECT * FROM salaries
WHERE salary >= ALL (SELECT salary FROM salaries
WHERE emp_no = 10010);


-- ORDER BY 

-- 오름차순 (위에서 아래로 값이 커진다.) ASC - 기본값
-- 내림차순 (위에서 아래로 값이 작아진다.) DESC
SELECT * FROM salaries
ORDER BY emp_no desc;

-- emp_no 내림차순, FROM_date 오름차순
SELECT * FROM salaries
WHERE emp_no IN (499988, 499987, 499986)
ORDER BY emp_no DESC, FROM_date ;
-- emp_no 내림차순하고 salary 내림차순
SELECT * FROM salaries
WHERE emp_no IN (499988, 499987, 499986)
ORDER BY emp_no DESC, salary DESC ;

/*
ORDER BY 문제
employees 테이블에서 나이는 내림차순으로
같은 생일일 경우, 성별은 여성이 위로, 남성이 아래로 나오게 하시오
*/
SELECT * FROM employees
ORDER BY birth_date DESC, gender DESC;



