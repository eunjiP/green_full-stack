import java.awt.*;
import javax.swing.*;
import java.awt.event.*;
import java.io.DataInputStream;
import java.io.DataOutputStream;
import java.net.*;


public class ChatRoom extends JFrame implements ActionListener, Runnable{
	//********************** 채팅서버관련 **********************
	String nickName;
	Socket socket;	//
	DataOutputStream dos;	//서버에게 데이터를 전송하는 스트림
	DataInputStream dis;	//서버에게 데이터를 수신하는 스트림
	// GUI====================================
	JTextArea textArea;
	JTextField textField;
	
	
	
	//클라이언트의 닉네임,socket을 받아오는 ChatRoom생성자
	public ChatRoom(String nickName, Socket socket) {
		
		try {
			//서버와 input, output스트림을 연결한다.
			dis = new DataInputStream(socket.getInputStream());
			dos = new DataOutputStream(socket.getOutputStream());
			
			dos.writeUTF(nickName);
		} catch (Exception e) {}
		

		this.setTitle("채팅방");
		this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		
		textArea = new JTextArea(20, 10);
		textField = new JTextField(30);
		JScrollPane scrollPane = new JScrollPane(textArea,
				ScrollPaneConstants.VERTICAL_SCROLLBAR_AS_NEEDED,	//필요하게 되면 생성
				ScrollPaneConstants.HORIZONTAL_SCROLLBAR_AS_NEEDED);
		
		textField.addActionListener(this);
		textArea.setEditable(false); //textArea수정 못하도록
		
		this.add(scrollPane, BorderLayout.CENTER);
		this.add(textField, BorderLayout.PAGE_END);
		
		pack();
		setVisible(true);
		
	
	}
	
	//채팅창(텍스트필드) 부분에서 채팅치고 엔터 눌렀을 경우 동작
	@Override
	public void actionPerformed(ActionEvent e) {
		//텍스트 필드에서 텍스트를 받아옴
		String sendMessage = textField.getText();
		try {
			//메세지를 서버에게 전송
			dos.writeUTF(sendMessage + "\n");
		} catch (Exception e2) {}
	}
	//채팅 서버가 보내주는 데이터를 받는곳(언제 보낼 지 모르기 때문에 계속 대기)
	@Override
	public void run() {
		while(true) {
			try {
				//채팅서버가 보내준 메세지를 수신
				String recieveMessage = dis.readUTF();
				//수신한 메세지를 텍스트에리아(채팅방)에 추가한다.
				textArea.append(recieveMessage);
			} catch (Exception e) {}
		}
		
	}
	
	
	

}
