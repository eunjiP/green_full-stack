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
			System.out.println("드라이브 적재 성공");
			
			con = DriverManager.getConnection(url, user, pw);
			System.out.println("DB 연결 성공");
			
			Statement stmt = con.createStatement();
			
			String query = "select * from books";
			ResultSet rs = stmt.executeQuery(query);
			
			//맨처음 행부터 끝까지 무한 반복
			while(rs.next()) {	
			
			//인덱스 번호로도 가능하지만 속성으로 가지고 오는게 더 확실하다.
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
			System.out.println("Class.forName에 잘 적었나요?^^");
		}catch (SQLException e) {
			System.out.println("connetion에 실패 했습니다.");
			System.out.println("port번호와 url 잘 확인하였나요???");
			System.out.println("user id와 비밀번호 잘 적었나요?^^");
		}
	}

}

