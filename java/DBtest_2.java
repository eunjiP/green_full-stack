import java.sql.*;

//insert
public class DBtest_2 {
	static Statement stmt;
	
	//insert�޼ҵ� ����
	static void insert_data(int id, String title, String publisher, int price) {
		String query = "insert into books values" + 
				"('" + id + "', '" + title + "', '" + publisher + "', '" + price + "');";
		
		try {
			int result = stmt.executeUpdate(query);
			//1�̶�� ���� ���������� �߰� �Ǿ��ٴ� �ǹ�
			if(result == 1) {
				System.out.println("�����Ͱ� ���������� �߰��Ǿ����ϴ�.");
			}
			else {
				System.out.println("������ �߰��� �����Ͽ����ϴ�.");
			}
			
		}catch (Exception e) {
			System.out.println("query���� �߸��Ǿ����ϴ�. Ȯ�� �ٶ�.");
		}
		
	}

	public static void main(String[] args) {
		String url = "jdbc:mysql://localhost:3330/librarydb";
		String user = "root";
		String pw = "1234";
		Connection con = null;

		try {
			Class.forName("com.mysql.cj.jdbc.Driver");
			System.out.println("����̺� ���� ����");
			
			con = DriverManager.getConnection(url, user, pw);
			System.out.println("DB ���� ����");
			
			stmt = con.createStatement();
			
			//�޼ҵ� ȣ��
			insert_data(6, "������ �ٻ�", "���¿�", 54000);
			insert_data(7, "��ǳ�� ���", "���", 85000);
			
			
			con.close();
		}catch (ClassNotFoundException e){
			System.out.println("Class.forName�� �� ��������?^^");
		}catch (SQLException e) {
			System.out.println("connetion�� ���� �߽��ϴ�.");
			System.out.println("port��ȣ�� url �� Ȯ���Ͽ�����???");
			System.out.println("user id�� ��й�ȣ �� ��������?^^");
		}
	}

}

