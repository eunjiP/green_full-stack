-- 문제1
INSERT INTO departments
(dept_no, dept_name)
VALUES ('d010', 'Business');

SELECT * FROM departments;

-- 문제2
INSERT INTO employees
(emp_no, birth_date, first_name, last_name, gender, hire_date)
VALUES (500000, '1999-10-10', 'Gildong', 'Hong', 'M', '2022-03-29');

SELECT * FROM employees
WHERE emp_no = 500000;


-- 문제3
SELECT * FROM employees
WHERE last_name LIKE '%ch%' AND gender = 'F';


-- 문제4
UPDATE employees
SET gender = 'F', hire_date = '2021-03-29', first_name = 'Jindong'
WHERE emp_no = 500000;

SELECT * FROM employees
WHERE emp_no = 500000;


-- 문제5
DELETE FROM employees
WHERE left(hire_date, 4) >= 2020;


-- 문제6
-- 499619포함
SELECT * FROM employees
WHERE gender = (
SELECT gender FROM employees
WHERE emp_no = 499619
);

-- 499619미포함
SELECT * FROM employees
WHERE emp_no != 499619 and gender = (
SELECT gender FROM employees
WHERE emp_no = 499619
);


-- 문제7
SELECT * FROM employees
ORDER BY birth_date DESC, gender DESC;


-- 문제8
SELECT DISTINCT title FROM titles;


-- 문제9
SELECT * FROM salaries
ORDER BY salary DESC
LIMIT 3;

-- 9-1
SELECT * FROM salaries
ORDER BY salary DESC
LIMIT 4, 6;


-- 문제10
SELECT dept_no, COUNT(emp_no) FROM dept_emp
GROUP BY dept_no;


-- 문제11
SELECT * FROM employees
WHERE emp_no = (
SELECT emp_no FROM salaries
ORDER BY salary
LIMIT 1
);


-- 문제12
SELECT B.gender, avg(A.salary) FROM salaries A
inner JOIN employees B
ON A.emp_no = B.emp_no
GROUP BY B.gender;


-- 문제13//틀림 ㅠㅠ다시 복습완료
SELECT Z.dept_no, MAX(av) FROM (
SELECT A.dept_no, AVG(B.salary) AS av FROM dept_emp A
inner JOIN salaries B
ON A.emp_no = B.emp_no
GROUP BY A.emp_no) Z
GROUP BY Z.dept_no;

SELECT z.dept_no, MAX(Z.avg_salary) AS max_salary
FROM (
SELECT B.dept_no, A.emp_no, AVG(A.salary) AS avg_salary
FROM salaries A
INNER JOIN dept_emp B
ON A.emp_no = B.emp_no
GROUP BY B.emp_no) Z
GROUP BY Z.dept_no;


-- 문제14
SELECT C.dept_name, AVG(B.salary), MAX(B.salary), MIN(B.salary) FROM dept_emp A
inner JOIN salaries B
ON A.emp_no = B.emp_no
INNER JOIN departments C
ON A.dept_no = C.dept_no
GROUP BY A.dept_no;


-- 문제15
SELECT A.title, AVG(B.salary) FROM titles A
inner JOIN salaries B
ON A.emp_no = B.emp_no
GROUP BY A.title;








