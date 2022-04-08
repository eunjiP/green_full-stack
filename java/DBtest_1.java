import java.sql.*;

//select
public class DBtest_1 {

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
			
			Statement stmt = con.createStatement();
			
			String query = "select * from books";
			ResultSet rs = stmt.executeQuery(query);
			
			//��ó�� ����� ������ ���� �ݺ�
			while(rs.next()) {	
			
			//�ε��� ��ȣ�ε� ���������� �Ӽ����� ������ ���°� �� Ȯ���ϴ�.
			int id = rs.getInt("bookid");
			String title = rs.getString("title");
			String publisher = rs.getString("publisher");
			int price = rs.getInt("price");
			
			System.out.println(id);
			System.out.println(title);
			System.out.println(publisher);
			System.out.println(price);
			}		
			
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

