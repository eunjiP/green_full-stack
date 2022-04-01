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
		System.out.println("�ȳ��ϼ��� �л��������α׷��� ���Ű� ȯ���մϴ�^^");
		System.out.println("1.�л� �߰�\n2.�л� ����\n3.�л����� ��ȸ\n4.���� ����\n5.���α׷�����");
		System.out.print("���Ͻô� ���񽺸� ���ڷ� �Է����ּ��� >>> ");
		choice = input.nextInt();
		System.out.println("================================");
	}
	
	static void addStudent() {
		
		try {
		System.out.print("�߰��� �л� �̸��� �Է����ּ��� >>> ");
		String addname = input.next();
		System.out.print("�л��� ������� �Է����ּ��� >>> ");
		int kor = input.nextInt();
		if(kor < 0 || kor >100 ) {
			Scoreerr e = new Scoreerr("������ 0~100 ���̷� �Է����ּ���");
			throw e;
		}
		else {
		System.out.print("�л��� ���м����� �Է����ּ��� >>> ");
		int mat = input.nextInt();
		if(mat < 0 || mat >100 ) {
			Scoreerr e = new Scoreerr("������ 0~100 ���̷� �Է����ּ���");
			throw e;
		}
		else {
		System.out.print("�л��� ������� �Է����ּ��� >>> ");
		int eng = input.nextInt();
		if(eng < 0 || eng >100 ) {
			Scoreerr e = new Scoreerr("������ 0~100 ���̷� �Է����ּ���");
			throw e;
		}
		else {
		Student.add(addname);
		Kor.add(kor);
		Mat.add(mat);
		Eng.add(eng);
		System.out.println("������ �Ǿ����ϴ�.\n================================");
		}}}
		}
		catch (Scoreerr e) {
			System.out.println(e);
		}
	}
		
	
	static void delStudent() {
		System.out.print("������ �л� �̸��� �Է��ϼ��� >>> ");
		String delname = input.next();
		int delnum = Student.indexOf(delname);
		Student.remove(delnum);
		Kor.remove(delnum);
		Mat.remove(delnum);
		Eng.remove(delnum);
		System.out.println("�Է��Ͻ� " + delname + "�� ���������� �����Ǿ����ϴ�.\n================================");
	}
	
	static void searchStudent() {
		System.out.print("Ȯ���Ͻ� �л��� �̸��� �Է��ϼ��� >>> ");
		String search = input.next();
		int searchnum = Student.indexOf(search);
		System.out.println("��ȸ�Ͻ� �л� : " + Student.get(searchnum));
		System.out.println("���� ���� : " + Kor.get(searchnum));
		System.out.println("���� ���� : " + Mat.get(searchnum));
		System.out.println("���� ���� : " + Eng.get(searchnum));
		System.out.println("================================");
	}
	
	static void setScore() {
		System.out.print("�����Ͻ� �л��� �̸��� �Է��ϼ��� >>> ");
		String setstudent = input.next();
		int searchnum = Student.indexOf(setstudent);
		System.out.println("��ȸ�Ͻ� �л��� ������ �Ʒ��� �����ϴ�.");
		System.out.println("���� ���� : " + Kor.get(searchnum));
		System.out.println("���� ���� : " + Mat.get(searchnum));
		System.out.println("���� ���� : " + Eng.get(searchnum));
		System.out.print("�����Ͻ� ������ �������ּ���(1.����, 2.����, 3.����) >>> ");
		int setchoice = input.nextInt();
		System.out.print("�����Ͻ� ������ �Է����ּ��� >>> ");
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
			System.out.println("�߸� �Է� �ϼ̽��ϴ�.");
		}
		System.out.println("���������� �����Ǿ����ϴ�.\n================================");
	}

	public static void main(String[] args) {
		
		
		while (true) {
			try {
					Menu();
					System.out.println("�߸� �Է��ϼ̽��ϴ�.");
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
					System.out.println("���α׷��� �����մϴ�. �����մϴ�^^");
					break;
				}
		}
			catch (InputMismatchException e) {
				System.out.println("�߸� �Է� �ϼ̽��ϴ�.");
			}
			catch (Exception e) {
				System.out.println("������ �߻��߽��ϴ�.");
			}
		}
	}
}