/*
정규화1) 칸안에는 무조건 한가지 값만 넣어라

여러 값이 들어가야한다면 세로로 넣는 것이 아니라 가로로 값을 추가하는게 맞다.
RDB를 하게되면 중복을 최소화할수 있다.

RDB의 정규화 목적 : 무결성을 위해서(insert, delete 할때 오류 방지), 중복제거
테이블 하나에서만 처리 하지않고 테이블과의 관계(1:1/1:M/M:N)를 생각하고
테이블을 여러개 만든 다음 select할때 join을 활용해서 한번에 보이도록 처리

테이블의 구조로 사용용도를 예측해볼 수 있다. 그만큼 테이블 구조를 생각하는건 중요!
-중복이 되면 절대안된다 또는 정보보다는 속도를 중요시 한다.
(테이블이 많을 수록 속도는 느려지지만 유지보수는 용이,
테이블이 적을 수록 속도는 빨라지지만 유지보수는 낮아진다.-중복 될 수 있다.)
*/

-- FK핵심는 참조해야하는 칼럼의 형식을 똑같이 해야 값을 가져올수 있다.!!!
-- fk 형식 FOREIGN KEY(fk할 칼럼명) REFERENCES 참조할테이블명(칼럼명)
CREATE TABLE t_member_hobbit (
memberid CHAR(8) NOT NULL,
hobbit_id INT(10) UNSIGNED NOT NULL,
PRIMARY KEY (memberid, hobbit_id),
FOREIGN KEY (memberid) REFERENCES membertbl(memberid),
FOREIGN KEY (hobbit_id) REFERENCES t_hobbit2(hobbit_id)
);

SELECT * FROM t_member_hobbit;


INSERT INTO t_member_hobbit (memberid, hobbit_id) VALUES ('1', 1);
INSERT INTO t_member_hobbit (memberid, hobbit_id) VALUES ('1', 2);

INSERT INTO t_member_hobbit (memberid, hobbit_id) VALUES ('10', 3),('10', 7);
INSERT INTO t_member_hobbit (memberid, hobbit_id) VALUES ('10', 8);

INSERT INTO t_member_hobbit (memberid, hobbit_id) VALUES ('8', 6);


-- JOIN
-- 형식 : select 별칭1.*, 별칭2.* from 기준으로 작성한 테이블명 별칭1
--			inner join 참고 원본 테이블명 별칭2
--			on 별칭1.칼럼명 = 별칭2.칼럼명

-- 모두
SELECT B.*, A.*, C.* 
FROM t_member_hobbit A
INNER JOIN membertbl B
ON A.memberid = B.memberID
INNER JOIN t_hobbit2 C
ON A.hobbit_id = C.hobbit_id;

-- 이름과 주소, 취미만 보고 싶다
SELECT B.memberName, B.memberAddress, C.name 
FROM t_member_hobbit A
INNER JOIN membertbl B
ON A.memberid = B.memberID
INNER JOIN t_hobbit2 C
ON A.hobbit_id = C.hobbit_id;


USE `employees`;
-- 문제) 사원번호, 사원명, 부서이름, 직무를 나타나게 select
SELECT A.emp_no, B.first_name, B.last_name, C.dept_name, D.title 
FROM dept_emp A
INNER JOIN employees B
ON A.emp_no = B.emp_no
INNER JOIN departments C
ON A.dept_no = C.dept_no
INNER JOIN titles D
ON A.emp_no = D.emp_no;


SELECT A.emp_no, A.first_name, A.last_name, C.dept_name, D.title 
FROM employees A
INNER JOIN dept_emp B
ON A.emp_no = B.emp_no
INNER JOIN departments C
ON C.dept_no = B.dept_no
INNER JOIN titles D
ON A.emp_no = D.emp_no;


-- 문제) 남녀 사원들의 평균 연봉
SELECT A.gender, AVG(B.salary) AS avg_salary
FROM employees A
INNER JOIN salaries B
ON A.emp_no = B.emp_no
GROUP BY A.gender;	-- 어디든 에러가 날 사항을 방지하기 위해 붙이는게 좋다


-- 문제) 부서별 가장 높은 개인 평균 연봉 값
-- 개인마다 평균 연봉 구함 > 부서가 있음 > 평균에서 부서별 가장 높은 1사람씩
-- 내답
SELECT z.dept_no, MAX(Z.avg_salary) AS max_salary
FROM (
SELECT B.dept_no, A.emp_no, AVG(A.salary) AS avg_salary
FROM salaries A
INNER JOIN dept_emp B
ON A.emp_no = B.emp_no
GROUP BY B.emp_no) Z
GROUP BY Z.dept_no;


-- 강사님 답)
SELECT X.dept_no, MAX(Z.avg_salary) AS max_salary
FROM (
	SELECT A.emp_no, AVG(B.salary) AS avg_salary 
	FROM employees A
	INNER JOIN salaries B
	ON A.emp_no = B.emp_no
	GROUP BY A.emp_no
) Z
INNER JOIN dept_emp X
ON Z.emp_no = X.emp_no
GROUP BY X.dept_no;



-- 문제) 부서별 연봉 평균값, max값, min값 나오게 해주세요
-- 내답)
SELECT C.dept_name, AVG(A.salary) , MAX(A.salary), MIN(A.salary)
FROM salaries A
INNER JOIN dept_emp B
ON A.emp_no = B.emp_no
INNER JOIN departments C
ON B.dept_no = C.dept_no
GROUP BY B.dept_no;

-- 강사님 답)
SELECT B.dept_no, C.dept_name, AVG(A.salary), MAX(A.salary), MIN(A.salary)
FROM salaries A
INNER JOIN dept_emp B
ON A.emp_no = B.emp_no
INNER JOIN departments C
ON B.dept_no = C.dept_no
GROUP BY B.dept_no, C.dept_name; 


-- 문제) 직무별 연봉 평균값
-- 내답)
SELECT B.title, AVG(A.salary) AS avg_salary
FROM salaries A
INNER JOIN titles B
ON A.emp_no = B.emp_no
GROUP BY B.title;







