-- 형변환 CONVERT(콤마로 구분) = 명시적인 변환
SELECT '10';	-- 문자
SELECT CONVERT('10', INT);  -- 강제 형변환(문자 -> 숫자)

SELECT '10' + '10';		-- 숫자 우선으로 연결(자동형변환됨)
	-- 결과 => 20 (= SELECT CONVERT('10', INT)+CONVERT('10', INT))
	-- 참고) 프로그래밍은 문자 우선(결과 : 1010)
SELECT CONVERT('10.1', FLOAT);
	
SELECT 10;		-- 숫자
SELECT CONVERT(10, CHAR);	-- 강제 형변환(숫자 -> 문자)


-- 형변환 cast(as로 구분) = 암시작인 형변환
SELECT CAST('10' AS INT);

-- 참고)
SELECT 1 > '2mega';	-- '2mega'에서 2만 인식 해서 0(false)


-- 문자열 합치기 concat
SELECT 'A' + 'B';		-- 숫자로 인식 0으로 결과나온다.
SELECT CONCAT('A', '2B2');
SELECT CONCAT('A', '2B2', '가나다라');


-- IF
-- <형식> : if(조건, 참일때 결과, 거짓일때 결과)
SELECT if(100>200, '100은 200보다 크다', '100은 200보다 작다.');

-- 문제) employees테이블에 gender 값이 'M'이면 남자,
--       'F'이면 '여자'가 뜨도록 해주세요


SELECT gender, if(gender = 'M', '남자', '여자') FROM employees;

-- 응용(if문안에 if문-else if가 존재 하지 않아서 연결해서 사용)
SELECT if('M' = 'M', '남자', if('F' = 'F', '여자', '외계인'));


-- 응용2(농구, 배구, 축구)
-- 농구 > basketball
-- 배구 > valleyball
-- 축구 > football
SELECT nm, if(nm = '농구', 'basketball', if(nm = '배구', 'valleyball', 'football')) FROM t_hobbit;

-- concat을 활용한 연결
SELECT 
if(nm = '농구', 
	CONCAT(nm, 'basketball'), 
	if(nm = '배구', 
		CONCAT(nm, 'valleyball'), 
		CONCAT(nm, 'football')
	)
)  
FROM t_hobbit;


-- ifnull : null값이면 다른걸로 변경해서 나오도록 변경해줌
-- (참고-오라클 : nvl, SQL-Server : isnull)
SELECT *, IFNULL(memberAddress, '주소없음')
FROM membertbl;


-- nullif : 양쪽값이 같으면 null을 반환, 다르면 첫번째값을 반환
SELECT NULLIF('안녕', '안녕');-- => null
SELECT NULLIF('안녕', '안');	-- => '안녕'

-- ## case문
-- 형식 : case 값 when 비교값 then ...(else 그외모든값) end
-- 정확히 일치하는 값을 찾을때 좋다.
-- 농구 > basketball
-- 배구 > valleyball
-- 축구 > football
SELECT 
	nm,
	case nm when '농구' then 'basketball'
				when '배구' then 'valleyball'
				when '축구' then 'football'
				ELSE '없음'
	end
FROM t_hobbit;

-- 형식 : case when 조건식 then ...(else 그외모든값) end
-- 비교문이나 범위정할때는 용이함
SELECT 
	nm,
	case when nm = '농구' then 'basketball'
		  when nm = '배구' then 'valleyball'
		  when nm = '축구' then 'football'
		  ELSE '없음'
	end
FROM t_hobbit;


-- 아스키코드
SELECT ASCII('A'), CHAR(65);


-- concat과 concat_ws비교(공백도 가능)
SELECT CONCAT('A', '_', 'B', '_', 'C');
SELECT CONCAT_WS('_', 'A', 'B', 'C');


-- format : 소숫점 자릿수 표현 => 숫자가 아니라 문자열로 취급(문자함수가능)
-- 천단위 구분 콤마해준다.
SELECT FORMAT(200000000, 0);


-- 형식 : insert(값, 몇번째 자리부터, 몇개를 대체할지, 대체할 문자)
SELECT INSERT('abcdefghi', 3, 4, '@@@@');	-- 값이 지워지고 대체된다.

SELECT INSERT('abcdefghi', 3, 0, '@@@@');	-- 값이 지워지지않고 추가만 할때


-- upper, lower(둘다 소문자나 대문자로 바꿔서 비교할때 주로 사용)
SELECT 'aBc', 'AbC', 'aBc' = 'AbC',
UPPER('aBc'),
UPPER('AbC'),
UPPER('aBc') = UPPER('AbC');
	-- 데이터베이스는 이미 구분을 안해서 참이라고 나옴


-- trim : 양쪽으로 쓸데없는 빈칸을 없애준다.(글자사이 빈칸은 안됨)
-- LTRIM : 왼쪽 공백 제거, RTRIM : 오른쪽 공백 제거
SELECT '     abc     ', TRIM('      abc       ');
-- 양쪽 특정 문자 제거도 가능
SELECT TRIM(BOTH 'ㅋ' FROM 'ㅋㅋㅋㅋㅋ재밌다ㅋㅋㅋㅋㅋ');	
-- 앞쪽
SELECT TRIM(LEADING 'ㅋ' FROM 'ㅋㅋㅋㅋㅋ재밌다ㅋㅋㅋㅋㅋ');
-- 뒷쪽
SELECT TRIM(TRAILING 'ㅋ' FROM 'ㅋㅋㅋㅋㅋ재밌다ㅋㅋㅋㅋㅋ');
	

-- date format(칼럼명, 형식)
-- 형식에는 대소문자마다 역할이 달라서 구분해서 사용
SELECT *, DATE_FORMAT(created_at, '%Y/%m/%d %r') FROM t_hobbit2;

