import java.awt.*;
import java.awt.event.*;
import java.io.IOException;
import java.net.*;
import javax.swing.*;

public class Messenger {
	//내부클래스로 MyFrame-Frame 클래스 작성
	class MyFrame extends JFrame implements ActionListener {
		
		//MyFrame클래스의 생성자
		public MyFrame() {
			super("MessengerA");	//Frame의 타이틀 설정
			setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
			//**** 텍스트 필드를 생성하는 부분 ****
			textField = new JTextField(30);
			textField.addActionListener(this);
			//*** 텍스트 에리어를 생성하는 부분 ****
			textArea = new JTextArea(10, 30);
			textArea.setEditable(false);	//위의 공간은 변경못하도록 한다.
			//텍스트 에리어를 중앙배치
			this.add(textArea, BorderLayout.CENTER);
			//텍스트 필드를 SOUTH방향에 배치
			this.add(textField, BorderLayout.PAGE_END);
			pack();	//각 컴포넌트들을 정렬배치
			setVisible(true);	//화면에 뛰운다
		}
		
		
		@Override
		public void actionPerformed(ActionEvent e) {
			//내가 쓴 글자를 받아옴
			String s = textField.getText();
			//받아온 글자를 바이트배열로 나눈다.
			byte[] buffer = s.getBytes();
			//바이트배열을 packet으로 쪼개어서 만든다(address주소로, otherPort 포트번호로)
			DatagramPacket packet = 
					new DatagramPacket(buffer, buffer.length, address, otherPort);
			//생성된 패킷을 소켓을 통해서 보낸다.
			try {
				socket.send(packet);
			} catch (IOException e1) {
				System.out.println("패킷 전송 중 문제가 발생함~!");
			}
			//대화창에 내가 보내려는 메세지를 적는다.
			textArea.append("SENT: " + s + "\n");
		}		
	}
	
	
	
	//GUI관련
	JTextField textField;
	JTextArea textArea;
	
	//데이터 관련
	DatagramSocket socket;
	DatagramPacket packet;
	//IP관련
	InetAddress address = null;
	//PORT관련
	int myPort = 5000;
	int otherPort = 6000;
	
	//Messenger의 생성자
	public Messenger() throws Exception {
		MyFrame f = new MyFrame();
		address = InetAddress.getByName("127.0.0.1");
		socket = new DatagramSocket(myPort);
	}
	//메세지 받을 때의 동작
	void process() {
		//계속 동작시킨다.
		while(true) {
			//받은 패킷 설정
			byte[] buf = new byte[256];
			packet = new DatagramPacket(buf, buf.length);
			try {
				//패킷을 수신한다
				socket.receive(packet);
			} catch (IOException e) {
				System.out.println("패킷을 받는 도중 문제가 생김!");
			}
			//수신한 패킷(바이트배열)을 문자열형으로 변경시켜서 대화창에 추가한다.
			textArea.append("RECEIVED: " + new String(buf) + "\n");
		}
	}
	
	public static void main(String[] args) throws Exception {
		new Messenger().process();
	}
	
}
