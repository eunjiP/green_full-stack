import java.awt.*;
import javax.swing.*;
import java.awt.event.*;
import java.beans.Statement;
import java.sql.Connection;


public class LoginGUI extends JFrame implements ActionListener {
	
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
	
	
	//LoginGUIŬ������ ������
	public LoginGUI() {
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
		Connection connect = new DBConnectionFactory().getConnection();
		Statement stmt = new Statement(connect);
		Statement stmt = connect.createStatement();
		
		String query = "insert into users values" + 
				"('" + id + "', '" + pw + "', '" + nickName + "');";
		boolean result = stmt.executeUpdate(query);
		return result;
	}
		
	
	
	
	
	
	@Override
	public void actionPerformed(ActionEvent e) {
		JButton button = (JButton) e.getSource();
		//���� �α��� ��ư�� ������.
		if(button == loginButton) {
			
		}
		//���� ȸ������ ��ư�� ������
		else if(button == singUpButton) {
			System.out.println("ȸ������ â���� �̵��մϴ�.");
			signUp_panel_open();  //ȸ������ â�� ����
		}
		//ȸ������ â���� ȸ������ �õ� ��ư�� ������
		else if(button == singUpExecuteButton) {
			
		}
		//ȸ������ â���� ��� ��ư�� ������
		else if(button == singUpCancleButton) {
			System.out.println("�α��� â���� �̵��մϴ�.");
			login_panel_open();  //�α��� â�� ���
		}
	}
	
	public static void main(String[] args) {
		new LoginGUI();
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
