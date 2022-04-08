import java.sql.Connection;
import java.sql.DriverManager;
import java.io.BufferedReader;
import java.io.File;
import java.io.FileReader;

//main없이 소스파일과 txt파일만 있으면 이동하더라도 텍스트파일(경로)만 바꾸고 사용가능!!!!

public class DBConnectionFactory {
	//DB정보가 담긴 파일
	private File file;
	private String driver;
	private String ip;
	private String port;
	private String db;
	private String url;
	private String user;
	private String password;
	//DB의 정보
	private Connection connection;
	//연결된 Connection객체
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
			//url정보를 합쳐서 하나로 만든다.(따로따로 이니깐 붙여서 다시 url로 담아라) 
			url += ip + ":" + port + "/" + db;
			
		}
		catch (Exception e) {
			System.out.println("Error : 파일을 읽을 수 없습니다.(파일이 존재하지 않음)");
		}
		
	}
	//Connection객체를 반환하는 메소드 - DB와의 연결을 담당
	public Connection getConnection() {
		try {
			Class.forName(driver);
		} catch (Exception e) {
			System.out.println("Error : driver정보가 잘못되었습니다.");
			return null; //연결 실패시 null반환
		}
		
		try {
			//DB와의 연결을 시도하고 Connection객체를 받아옴
			connection = DriverManager.getConnection(url, user, password);
		} catch (Exception e) {
			System.out.println("Error : DB와의 연결을 실패하였습니다.");
			System.out.println("Error : ip, port, user, pw 확인 바람");
			return null;
		}
		//여기까지 왔다는 것은 제대로 연결이 이루어졌다는 뜻
		System.out.println("MySQL : " + db + "와의 연결을 완료하였습니다.");
		return connection;	//연결된 db의 Connection객체를 반환한다.
	}

}
