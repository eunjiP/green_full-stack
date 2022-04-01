import java.util.*;

class Scoreerr extends Exception {
	public Scoreerr() {}
	public Scoreerr(String message) {
		super(message);
	}
}

public class Studentprogram {
	static Scanner input = new Scanner(System.in);
	static ArrayList<String> Student = new ArrayList<>();
	static ArrayList<Integer> Kor = new ArrayList<>();
	static ArrayList<Integer> Mat = new ArrayList<>();
	static ArrayList<Integer> Eng = new ArrayList<>();
	static int choice;
	
	static void Menu() {
		System.out.println("안녕하세요 학생관리프로그램에 오신걸 환영합니다^^");
		System.out.println("1.학생 추가\n2.학생 삭제\n3.학생정보 조회\n4.성적 수정\n5.프로그램종료");
		System.out.print("원하시는 서비스를 숫자로 입력해주세요 >>> ");
		choice = input.nextInt();
		System.out.println("================================");
	}
	
	static void addStudent() {
		
		try {
		System.out.print("추가할 학생 이름을 입력해주세요 >>> ");
		String addname = input.next();
		System.out.print("학생의 국어성적을 입력해주세요 >>> ");
		int kor = input.nextInt();
		if(kor < 0 || kor >100 ) {
			Scoreerr e = new Scoreerr("성적은 0~100 사이로 입력해주세요");
			throw e;
		}
		else {
		System.out.print("학생의 수학성적을 입력해주세요 >>> ");
		int mat = input.nextInt();
		if(mat < 0 || mat >100 ) {
			Scoreerr e = new Scoreerr("성적은 0~100 사이로 입력해주세요");
			throw e;
		}
		else {
		System.out.print("학생의 영어성적을 입력해주세요 >>> ");
		int eng = input.nextInt();
		if(eng < 0 || eng >100 ) {
			Scoreerr e = new Scoreerr("성적은 0~100 사이로 입력해주세요");
			throw e;
		}
		else {
		Student.add(addname);
		Kor.add(kor);
		Mat.add(mat);
		Eng.add(eng);
		System.out.println("정상등록 되었습니다.\n================================");
		}}}
		}
		catch (Scoreerr e) {
			System.out.println(e);
		}
	}
		
	
	static void delStudent() {
		System.out.print("삭제할 학생 이름을 입력하세요 >>> ");
		String delname = input.next();
		int delnum = Student.indexOf(delname);
		Student.remove(delnum);
		Kor.remove(delnum);
		Mat.remove(delnum);
		Eng.remove(delnum);
		System.out.println("입력하신 " + delname + "은 정상적으로 삭제되었습니다.\n================================");
	}
	
	static void searchStudent() {
		System.out.print("확인하실 학생의 이름을 입력하세요 >>> ");
		String search = input.next();
		int searchnum = Student.indexOf(search);
		System.out.println("조회하신 학생 : " + Student.get(searchnum));
		System.out.println("국어 성적 : " + Kor.get(searchnum));
		System.out.println("수학 성적 : " + Mat.get(searchnum));
		System.out.println("영어 성적 : " + Eng.get(searchnum));
		System.out.println("================================");
	}
	
	static void setScore() {
		System.out.print("수정하실 학생의 이름을 입력하세요 >>> ");
		String setstudent = input.next();
		int searchnum = Student.indexOf(setstudent);
		System.out.println("조회하신 학생의 성적은 아래와 같습니다.");
		System.out.println("국어 성적 : " + Kor.get(searchnum));
		System.out.println("수학 성적 : " + Mat.get(searchnum));
		System.out.println("영어 성적 : " + Eng.get(searchnum));
		System.out.print("수정하실 과목을 선택해주세요(1.국어, 2.수학, 3.영어) >>> ");
		int setchoice = input.nextInt();
		System.out.print("수정하실 성적을 입력해주세요 >>> ");
		int setscore = input.nextInt();
		if (setchoice == 1) {
			Kor.set(searchnum, setscore);
		}
		else if (setchoice == 2) {
			Mat.set(searchnum, setscore);
		}
		else if (setchoice == 3) {
			Eng.set(searchnum, setscore);
		}
		else {
			System.out.println("잘못 입력 하셨습니다.");
		}
		System.out.println("정상적으로 수정되었습니다.\n================================");
	}

	public static void main(String[] args) {
		
		
		while (true) {
			try {
					Menu();
					System.out.println("잘못 입력하셨습니다.");
				if (choice == 1) {
					addStudent();
				}
				else if (choice == 2) {
					delStudent();
				}
				else if (choice == 3) {
					searchStudent();
				}
				else if (choice == 4) {
					setScore();
				}
				else if (choice == 5) {
					System.out.println("프로그램을 종료합니다. 감사합니다^^");
					break;
				}
		}
			catch (InputMismatchException e) {
				System.out.println("잘못 입력 하셨습니다.");
			}
			catch (Exception e) {
				System.out.println("오류가 발생했습니다.");
			}
		}
	}
}