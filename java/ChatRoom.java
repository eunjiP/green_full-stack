import java.awt.*;
import javax.swing.*;
import java.awt.event.*;
import java.io.DataInputStream;
import java.io.DataOutputStream;
import java.net.*;


public class ChatRoom extends JFrame implements ActionListener, Runnable{
	//********************** ä�ü������� **********************
	String nickName;
	Socket socket;	//
	DataOutputStream dos;	//�������� �����͸� �����ϴ� ��Ʈ��
	DataInputStream dis;	//�������� �����͸� �����ϴ� ��Ʈ��
	// GUI====================================
	JTextArea textArea;
	JTextField textField;
	
	
	
	//Ŭ���̾�Ʈ�� �г���,socket�� �޾ƿ��� ChatRoom������
	public ChatRoom(String nickName, Socket socket) {
		
		try {
			//������ input, output��Ʈ���� �����Ѵ�.
			dis = new DataInputStream(socket.getInputStream());
			dos = new DataOutputStream(socket.getOutputStream());
			
			dos.writeUTF(nickName);
		} catch (Exception e) {}
		

		this.setTitle("ä�ù�");
		this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		
		textArea = new JTextArea(20, 10);
		textField = new JTextField(30);
		JScrollPane scrollPane = new JScrollPane(textArea,
				ScrollPaneConstants.VERTICAL_SCROLLBAR_AS_NEEDED,	//�ʿ��ϰ� �Ǹ� ����
				ScrollPaneConstants.HORIZONTAL_SCROLLBAR_AS_NEEDED);
		
		textField.addActionListener(this);
		textArea.setEditable(false); //textArea���� ���ϵ���
		
		this.add(scrollPane, BorderLayout.CENTER);
		this.add(textField, BorderLayout.PAGE_END);
		
		pack();
		setVisible(true);
		
	
	}
	
	//ä��â(�ؽ�Ʈ�ʵ�) �κп��� ä��ġ�� ���� ������ ��� ����
	@Override
	public void actionPerformed(ActionEvent e) {
		//�ؽ�Ʈ �ʵ忡�� �ؽ�Ʈ�� �޾ƿ�
		String sendMessage = textField.getText();
		try {
			//�޼����� �������� ����
			dos.writeUTF(sendMessage + "\n");
		} catch (Exception e2) {}
	}
	//ä�� ������ �����ִ� �����͸� �޴°�(���� ���� �� �𸣱� ������ ��� ���)
	@Override
	public void run() {
		while(true) {
			try {
				//ä�ü����� ������ �޼����� ����
				String recieveMessage = dis.readUTF();
				//������ �޼����� �ؽ�Ʈ������(ä�ù�)�� �߰��Ѵ�.
				textArea.append(recieveMessage);
			} catch (Exception e) {}
		}
		
	}
	
	
	

}
