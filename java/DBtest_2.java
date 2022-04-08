import java.sql.*;

//insert
public class DBtest_2 {
	static Statement stmt;
	
	//insert메소드 생성
	static void insert_data(int id, String title, String publisher, int price) {
		String query = "insert into books values" + 
				"('" + id + "', '" + title + "', '" + publisher + "', '" + price + "');";
		
		try {
			int result = stmt.executeUpdate(query);
			//1이라는 것은 정상적으로 추가 되었다는 의미
			if(result == 1) {
				System.out.println("데이터가 정상적으로 추가되었습니다.");
			}
			else {
				System.out.println("데이터 추가를 실패하였습니다.");
			}
			
		}catch (Exception e) {
			System.out.println("query문이 잘못되었습니다. 확인 바람.");
		}
		
	}

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
			
			stmt = con.createStatement();
			
			//메소드 호출
			insert_data(6, "마지막 잎새", "이태원", 54000);
			insert_data(7, "폭풍의 언덕", "라라", 85000);
			
			
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

