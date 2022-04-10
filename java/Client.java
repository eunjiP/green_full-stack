import java.sql.Statement;

public class Client {
	public static void main(String[] args) {
		try {
			//채팅서버 ip와 port
//			String serverIp = "127.0.0.1";
			String serverIp = "192.168.1.254";
			int serverPort = 8000;
			
			System.out.println("ServerDB에 연결합니다.");
			//DB와 연결하는 부분
			Statement stmt = new DBConnectionFactory().getConnection().createStatement();
			System.out.println("ServerDB 연결 성공");
			
			System.out.println("Login 화면 생성");
			//로그인창 띄우는 부분
			new LoginGUI(serverIp, serverPort, stmt);
			
		}catch(NullPointerException e) {
			System.out.println("Error : Connection이 제대로 이루어지지 않았습니다.");
		}
		catch(Exception e) {
			System.out.println("Error : Client에러");
		}
		
	}

}
