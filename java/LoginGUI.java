import java.awt.*;
import javax.swing.*;
import java.awt.event.*;
import java.net.Socket;
import java.sql.ResultSet;
import java.sql.Statement;


public class LoginGUI extends JFrame implements ActionListener {
	//*************** GUI ***************
	//���� �г� ********************************************
	JPanel mainWindowPanel = new JPanel();
	//�α��� â ���� *****************************************
	//�ؽ�Ʈ �ʵ� ����
	JTextField loginTextField;	//���̵� �Է��ϴ� ��
	JTextField pwTextField;		//�н����� �Է��ϴ� ��
	//��ư ����
	JPanel loginButtonPanel;
	JButton loginButton;	//�α��� ��ư
	JButton singUpButton;	//ȸ������â ���� ��ư
	//ȸ������ â ���� **************************************
	JPanel singupButtonPanel;
	JTextField nickNameTextField; //�г��� �Է��ϴ� ��
	JButton singUpExecuteButton;	//ȸ������ ��ư
	JButton singUpCancleButton;	//ȸ������ ��� ��ư(�α���â���� ���ư�)
	
	//*************** ä�� ���� ***************
	String serverIP;	//�����ּ�
	int serverPort;		//������Ʈ
	Statement stmt; 
	
	//LoginGUIŬ������ ������(ä�ü����� �ּ�, ä�ü����� ��Ʈ, DB�� ����� ��ü)
	public LoginGUI(String serverIP, int serverport, Statement stmt) {
		this.serverIP = serverIP;
		this.serverPort = serverport;
		this.stmt = stmt;
		
		this.setTitle("Login");
		this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		//ȭ���� �ػ󵵸� ���Ѵ�
		Dimension screenSize = Toolkit.getDefaultToolkit().getScreenSize();
		//ȭ���� �߾ӿ� ��ġ�ؼ� ȭ���� ��쵵�� �Ѵ�.
		setBounds((int)(screenSize.width / 2.5), (int)(screenSize.height / 2.5)
			, 400, 200);
		
		login_panel_open();	//�α��� ȭ�� â�� ����
		this.setVisible(true);  //ȭ���� ����
	}
	//�α��� ȭ���� ���� �޼ҵ�
	private void login_panel_open() {
		remove(mainWindowPanel);	//Frame�� �����Ǿ��ִ� main�гλ���
		//WindowPanel	************************************
		mainWindowPanel = new JPanel(); //���� �г� ����
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
		loginButton = new JButton("�α���");
		loginButton.setSize(400, 500);  //��ư ũ��
		loginButton.addActionListener(this);  //�̺�Ʈ ó�� ���
		
		singUpButton = new JButton("ȸ������");
		singUpButton.setSize(400, 500);  //��ư ũ��
		singUpButton.addActionListener(this);  //�̺�Ʈ ó�� ���
		
		loginButtonPanel.add(loginButton);
		loginButtonPanel.add(singUpButton);
		
		//���� �гο� �߰� ************************************
		mainWindowPanel.add(loginWindJPanel);
		mainWindowPanel.add(pwWindowPanel);
		mainWindowPanel.add(loginButtonPanel);
		//���� �г��� frame�� �߰�
		this.add(mainWindowPanel);
		this.revalidate();  //�����̳ʿ� ������ ������Ʈ�� ���ġ�� ����
		this.repaint();  //�����̳� �ٽ� �׸��⸦ ����

	}
	
	protected boolean signUpQuery(String id, String pw, String nickName) {
		String query = "insert into users values" + 
				"('" + id + "', '" + pw + "', '" + nickName + "');";
		
		try {
			
			int result = stmt.executeUpdate(query);
			if(result == 1) {
				System.out.println("ȸ�������� ���������� �̷�������ϴ�.");
			}
			
		}catch (Exception e) {
			System.out.println("Error : query���� �߸��Ǿ����ϴ�. Ȯ�� �ٶ�.");
			System.out.println("Error : IDȤ�� �г����� �ߺ��Դϴ�.");
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
			System.out.println("Error : id�� pw�� Ʋ�Ƚ��ϴ�!");
		}
		return null;
	}
	

	@Override
	public void actionPerformed(ActionEvent e) {
		JButton button = (JButton) e.getSource();
		//���� �α��� ��ư�� ������.
		if(button == loginButton) {
			String nickName = loginQuery(loginTextField.getText(), pwTextField.getText());
			if(nickName != null) {
				try {
					Socket socket = new Socket(serverIP, serverPort);
					System.out.println("ä��Server ���ӿ� �����Ͽ����ϴ�.");
					//ChatRoom���� ������̶� ���������
					Thread chatThread = new Thread(new ChatRoom(loginTextField.getText(), socket));
					chatThread.start();
				} catch (Exception e2) {
					System.out.println("Error : ä��Server�� �������� �ʽ��ϴ�.");
				}
			}
		}
		//���� ȸ������ ��ư�� ������
		else if(button == singUpButton) {
			System.out.println("ȸ������ â���� �̵��մϴ�.");
			signUp_panel_open();  //ȸ������ â�� ����
		}
		//ȸ������ â���� ȸ������ �õ� ��ư�� ������
		else if(button == singUpExecuteButton) {
			System.out.println("ȸ�������� �õ��մϴ�.");
			//ȸ������â�� �ؽ�Ʈ�ʵ忡�� ���ڿ����� �����ͼ� ���������� ����� �����Ѵ�.
			signUpQuery(loginTextField.getText(), pwTextField.getText(), nickNameTextField.getText());
		}
		//ȸ������ â���� ��� ��ư�� ������
		else if(button == singUpCancleButton) {
			System.out.println("�α��� â���� �̵��մϴ�.");
			login_panel_open();  //�α��� â�� ���
		}
	}
	
	//�α��� ȭ���� ���� �޼ҵ�
	private void signUp_panel_open() {
		remove(mainWindowPanel);	//Frame�� �����Ǿ��ִ� main�гλ���
		//WindowPanel	************************************
		mainWindowPanel = new JPanel(); //���� �г� ����
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
		singUpExecuteButton = new JButton("ȸ������");
		singUpExecuteButton.setSize(400, 500);  //��ư ũ��
		singUpExecuteButton.addActionListener(this);  //�̺�Ʈ ó�� ���
		
		singUpCancleButton = new JButton("���");
		singUpCancleButton.setSize(400, 500);  //��ư ũ��
		singUpCancleButton.addActionListener(this);  //�̺�Ʈ ó�� ���
		
		singupButtonPanel.add(singUpExecuteButton);
		singupButtonPanel.add(singUpCancleButton);
		
		//���� �гο� �߰� ************************************
		mainWindowPanel.add(loginWindJPanel);
		mainWindowPanel.add(pwWindowPanel);
		mainWindowPanel.add(nickNameWindowPanel);
		mainWindowPanel.add(singupButtonPanel);
		//���� �г��� frame�� �߰�
		this.add(mainWindowPanel);
		this.revalidate();  //�����̳ʿ� ������ ������Ʈ�� ���ġ�� ����
		this.repaint();  //�����̳� �ٽ� �׸��⸦ ����

	}
	
	
}
