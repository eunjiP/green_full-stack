import java.awt.*;
import javax.swing.*;
import java.awt.event.*;
import java.net.Socket;
import java.sql.ResultSet;
import java.sql.Statement;


public class LoginGUI extends JFrame implements ActionListener {
	//*************** GUI ***************
	//메인 패널 ********************************************
	JPanel mainWindowPanel = new JPanel();
	//로그인 창 관련 *****************************************
	//텍스트 필드 관련
	JTextField loginTextField;	//아이디 입력하는 곳
	JTextField pwTextField;		//패스워드 입력하는 곳
	//버튼 관련
	JPanel loginButtonPanel;
	JButton loginButton;	//로그인 버튼
	JButton singUpButton;	//회원가입창 띄우는 버튼
	//회원가입 창 관련 **************************************
	JPanel singupButtonPanel;
	JTextField nickNameTextField; //닉네임 입력하는 곳
	JButton singUpExecuteButton;	//회원가입 버튼
	JButton singUpCancleButton;	//회원가입 취소 버튼(로그인창으로 돌아감)
	
	//*************** 채팅 서버 ***************
	String serverIP;	//서버주소
	int serverPort;		//서버포트
	Statement stmt; 
	
	//LoginGUI클래스의 생성자(채팅서버의 주소, 채팅서버의 포트, DB와 연결되 객체)
	public LoginGUI(String serverIP, int serverport, Statement stmt) {
		this.serverIP = serverIP;
		this.serverPort = serverport;
		this.stmt = stmt;
		
		this.setTitle("Login");
		this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		//화면의 해상도를 구한다
		Dimension screenSize = Toolkit.getDefaultToolkit().getScreenSize();
		//화면의 중앙에 위치해서 화면을 띄우도록 한다.
		setBounds((int)(screenSize.width / 2.5), (int)(screenSize.height / 2.5)
			, 400, 200);
		
		login_panel_open();	//로그인 화면 창을 생성
		this.setVisible(true);  //화면을 띄운다
	}
	//로그인 화면을 띄우는 메소드
	private void login_panel_open() {
		remove(mainWindowPanel);	//Frame에 생성되어있는 main패널삭제
		//WindowPanel	************************************
		mainWindowPanel = new JPanel(); //메인 패널 생성
		mainWindowPanel.setLayout(new GridLayout(0, 1));
		/***************************************************/
		//Login ********************************************
		JPanel loginWindJPanel = new JPanel();
		JLabel loginLabel = new JLabel("ID : ");
		loginTextField = new JTextField(10);
		loginWindJPanel.add(loginLabel);
		loginWindJPanel.add(loginTextField);
		//PW ***********************************************
		JPanel pwWindowPanel = new JPanel();
		JLabel pwLable = new JLabel("PW : ");
		pwTextField = new JTextField(10);
		pwWindowPanel.add(pwLable);
		pwWindowPanel.add(pwTextField);
		//Button ******************************************
		loginButtonPanel = new JPanel();
		loginButton = new JButton("로그인");
		loginButton.setSize(400, 500);  //버튼 크기
		loginButton.addActionListener(this);  //이벤트 처리 등록
		
		singUpButton = new JButton("회원가입");
		singUpButton.setSize(400, 500);  //버튼 크기
		singUpButton.addActionListener(this);  //이벤트 처리 등록
		
		loginButtonPanel.add(loginButton);
		loginButtonPanel.add(singUpButton);
		
		//메인 패널에 추가 ************************************
		mainWindowPanel.add(loginWindJPanel);
		mainWindowPanel.add(pwWindowPanel);
		mainWindowPanel.add(loginButtonPanel);
		//메인 패널을 frame에 추가
		this.add(mainWindowPanel);
		this.revalidate();  //컨테이너에 부착된 컴포넌트의 재배치를 지시
		this.repaint();  //컨테이너 다시 그리기를 지시

	}
	
	protected boolean signUpQuery(String id, String pw, String nickName) {
		String query = "insert into users values" + 
				"('" + id + "', '" + pw + "', '" + nickName + "');";
		
		try {
			
			int result = stmt.executeUpdate(query);
			if(result == 1) {
				System.out.println("회원가입이 정상적으로 이루어졌습니다.");
			}
			
		}catch (Exception e) {
			System.out.println("Error : query문이 잘못되었습니다. 확인 바람.");
			System.out.println("Error : ID혹은 닉네임이 중복입니다.");
		}
		
		return true;
	}
	
	protected String loginQuery(String id, String pw) {
		String query = "select * from users where " + 
				"user_id = '" + id + "' and user_pw = '" + pw + "'";
		try {
			ResultSet result = stmt.executeQuery(query);
			if(result.next()) {
				String nickName = result.getString("user_nickName");
				return nickName;
			}
		} catch (Exception e) {
			System.out.println("Error : id와 pw가 틀렸습니다!");
		}
		return null;
	}
	

	@Override
	public void actionPerformed(ActionEvent e) {
		JButton button = (JButton) e.getSource();
		//내가 로그인 버튼을 눌렀다.
		if(button == loginButton) {
			String nickName = loginQuery(loginTextField.getText(), pwTextField.getText());
			if(nickName != null) {
				try {
					Socket socket = new Socket(serverIP, serverPort);
					System.out.println("채팅Server 접속에 성공하였습니다.");
					//ChatRoom또한 런어블이라서 스레드생성
					Thread chatThread = new Thread(new ChatRoom(loginTextField.getText(), socket));
					chatThread.start();
				} catch (Exception e2) {
					System.out.println("Error : 채팅Server가 열려있지 않습니다.");
				}
			}
		}
		//내가 회원가입 버튼을 눌렀다
		else if(button == singUpButton) {
			System.out.println("회원가입 창으로 이동합니다.");
			signUp_panel_open();  //회원가입 창을 띄운다
		}
		//회원가입 창에서 회원가입 시도 버튼을 눌렀다
		else if(button == singUpExecuteButton) {
			System.out.println("회원가입을 시도합니다.");
			//회원가입창의 텍스트필드에서 문자열들을 가져와서 쿼리문으로 만들어 전송한다.
			signUpQuery(loginTextField.getText(), pwTextField.getText(), nickNameTextField.getText());
		}
		//회원가입 창에서 취소 버튼을 눌렀다
		else if(button == singUpCancleButton) {
			System.out.println("로그인 창으로 이동합니다.");
			login_panel_open();  //로그인 창을 띄움
		}
	}
	
	//로그인 화면을 띄우는 메소드
	private void signUp_panel_open() {
		remove(mainWindowPanel);	//Frame에 생성되어있는 main패널삭제
		//WindowPanel	************************************
		mainWindowPanel = new JPanel(); //메인 패널 생성
		mainWindowPanel.setLayout(new GridLayout(0, 1));
		/***************************************************/
		//Login ********************************************
		JPanel loginWindJPanel = new JPanel();
		JLabel loginLabel = new JLabel("ID : ");
		loginTextField = new JTextField(10);
		loginWindJPanel.add(loginLabel);
		loginWindJPanel.add(loginTextField);
		//PW ***********************************************
		JPanel pwWindowPanel = new JPanel();
		JLabel pwLable = new JLabel("PW : ");
		pwTextField = new JTextField(10);
		pwWindowPanel.add(pwLable);
		pwWindowPanel.add(pwTextField);
		//nickName *****************************************
		JPanel nickNameWindowPanel = new JPanel();
		JLabel nickNameLable = new JLabel("NickName : ");
		nickNameTextField = new JTextField(10);
		nickNameWindowPanel.add(nickNameLable);
		nickNameWindowPanel.add(nickNameTextField);
		//Button ******************************************
		singupButtonPanel = new JPanel();
		singUpExecuteButton = new JButton("회원가입");
		singUpExecuteButton.setSize(400, 500);  //버튼 크기
		singUpExecuteButton.addActionListener(this);  //이벤트 처리 등록
		
		singUpCancleButton = new JButton("취소");
		singUpCancleButton.setSize(400, 500);  //버튼 크기
		singUpCancleButton.addActionListener(this);  //이벤트 처리 등록
		
		singupButtonPanel.add(singUpExecuteButton);
		singupButtonPanel.add(singUpCancleButton);
		
		//메인 패널에 추가 ************************************
		mainWindowPanel.add(loginWindJPanel);
		mainWindowPanel.add(pwWindowPanel);
		mainWindowPanel.add(nickNameWindowPanel);
		mainWindowPanel.add(singupButtonPanel);
		//메인 패널을 frame에 추가
		this.add(mainWindowPanel);
		this.revalidate();  //컨테이너에 부착된 컴포넌트의 재배치를 지시
		this.repaint();  //컨테이너 다시 그리기를 지시

	}
	
	
}
