import java.sql.Connection;
import java.sql.DriverManager;
import java.io.BufferedReader;
import java.io.File;
import java.io.FileReader;

//main���� �ҽ����ϰ� txt���ϸ� ������ �̵��ϴ��� �ؽ�Ʈ����(���)�� �ٲٰ� ��밡��!!!!

public class DBConnectionFactory {
	//DB������ ��� ����
	private File file;
	private String driver;
	private String ip;
	private String port;
	private String db;
	private String url;
	private String user;
	private String password;
	//DB�� ����
	private Connection connection;
	//����� Connection��ü
	public DBConnectionFactory() {
		file = new File("DBsetting.txt");
		loadData();
	}
	
	private void loadData() {
		try {
			BufferedReader bfr = new BufferedReader(new FileReader(file));
			driver = bfr.readLine();
			url = bfr.readLine();
			ip = bfr.readLine();
			port = bfr.readLine();
			db = bfr.readLine();
			user = bfr.readLine();
			password = bfr.readLine();
			//url������ ���ļ� �ϳ��� �����.(���ε��� �̴ϱ� �ٿ��� �ٽ� url�� ��ƶ�) 
			url += ip + ":" + port + "/" + db;
			
		}
		catch (Exception e) {
			System.out.println("Error : ������ ���� �� �����ϴ�.(������ �������� ����)");
		}
		
	}
	//Connection��ü�� ��ȯ�ϴ� �޼ҵ� - DB���� ������ ���
	public Connection getConnection() {
		try {
			Class.forName(driver);
		} catch (Exception e) {
			System.out.println("Error : driver������ �߸��Ǿ����ϴ�.");
			return null; //���� ���н� null��ȯ
		}
		
		try {
			//DB���� ������ �õ��ϰ� Connection��ü�� �޾ƿ�
			connection = DriverManager.getConnection(url, user, password);
		} catch (Exception e) {
			System.out.println("Error : DB���� ������ �����Ͽ����ϴ�.");
			System.out.println("Error : ip, port, user, pw Ȯ�� �ٶ�");
			return null;
		}
		//������� �Դٴ� ���� ����� ������ �̷�����ٴ� ��
		System.out.println("MySQL : " + db + "���� ������ �Ϸ��Ͽ����ϴ�.");
		return connection;	//����� db�� Connection��ü�� ��ȯ�Ѵ�.
	}

}
