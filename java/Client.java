import java.sql.Statement;

public class Client {
	public static void main(String[] args) {
		try {
			//ä�ü��� ip�� port
//			String serverIp = "127.0.0.1";
			String serverIp = "192.168.1.254";
			int serverPort = 8000;
			
			System.out.println("ServerDB�� �����մϴ�.");
			//DB�� �����ϴ� �κ�
			Statement stmt = new DBConnectionFactory().getConnection().createStatement();
			System.out.println("ServerDB ���� ����");
			
			System.out.println("Login ȭ�� ����");
			//�α���â ���� �κ�
			new LoginGUI(serverIp, serverPort, stmt);
			
		}catch(NullPointerException e) {
			System.out.println("Error : Connection�� ����� �̷������ �ʾҽ��ϴ�.");
		}
		catch(Exception e) {
			System.out.println("Error : Client����");
		}
		
	}

}
