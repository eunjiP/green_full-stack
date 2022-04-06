import java.awt.*;
import java.awt.event.*;
import java.io.IOException;
import java.net.*;
import javax.swing.*;

public class Messenger {
	//����Ŭ������ MyFrame-Frame Ŭ���� �ۼ�
	class MyFrame extends JFrame implements ActionListener {
		
		//MyFrameŬ������ ������
		public MyFrame() {
			super("MessengerA");	//Frame�� Ÿ��Ʋ ����
			setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
			//**** �ؽ�Ʈ �ʵ带 �����ϴ� �κ� ****
			textField = new JTextField(30);
			textField.addActionListener(this);
			//*** �ؽ�Ʈ ����� �����ϴ� �κ� ****
			textArea = new JTextArea(10, 30);
			textArea.setEditable(false);	//���� ������ ������ϵ��� �Ѵ�.
			//�ؽ�Ʈ ����� �߾ӹ�ġ
			this.add(textArea, BorderLayout.CENTER);
			//�ؽ�Ʈ �ʵ带 SOUTH���⿡ ��ġ
			this.add(textField, BorderLayout.PAGE_END);
			pack();	//�� ������Ʈ���� ���Ĺ�ġ
			setVisible(true);	//ȭ�鿡 �ٿ��
		}
		
		
		@Override
		public void actionPerformed(ActionEvent e) {
			//���� �� ���ڸ� �޾ƿ�
			String s = textField.getText();
			//�޾ƿ� ���ڸ� ����Ʈ�迭�� ������.
			byte[] buffer = s.getBytes();
			//����Ʈ�迭�� packet���� �ɰ�� �����(address�ּҷ�, otherPort ��Ʈ��ȣ��)
			DatagramPacket packet = 
					new DatagramPacket(buffer, buffer.length, address, otherPort);
			//������ ��Ŷ�� ������ ���ؼ� ������.
			try {
				socket.send(packet);
			} catch (IOException e1) {
				System.out.println("��Ŷ ���� �� ������ �߻���~!");
			}
			//��ȭâ�� ���� �������� �޼����� ���´�.
			textArea.append("SENT: " + s + "\n");
		}		
	}
	
	
	
	//GUI����
	JTextField textField;
	JTextArea textArea;
	
	//������ ����
	DatagramSocket socket;
	DatagramPacket packet;
	//IP����
	InetAddress address = null;
	//PORT����
	int myPort = 5000;
	int otherPort = 6000;
	
	//Messenger�� ������
	public Messenger() throws Exception {
		MyFrame f = new MyFrame();
		address = InetAddress.getByName("127.0.0.1");
		socket = new DatagramSocket(myPort);
	}
	//�޼��� ���� ���� ����
	void process() {
		//��� ���۽�Ų��.
		while(true) {
			//���� ��Ŷ ����
			byte[] buf = new byte[256];
			packet = new DatagramPacket(buf, buf.length);
			try {
				//��Ŷ�� �����Ѵ�
				socket.receive(packet);
			} catch (IOException e) {
				System.out.println("��Ŷ�� �޴� ���� ������ ����!");
			}
			//������ ��Ŷ(����Ʈ�迭)�� ���ڿ������� ������Ѽ� ��ȭâ�� �߰��Ѵ�.
			textArea.append("RECEIVED: " + new String(buf) + "\n");
		}
	}
	
	public static void main(String[] args) throws Exception {
		new Messenger().process();
	}
	
}
