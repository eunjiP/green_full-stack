import java.net.DatagramPacket;
import java.net.DatagramSocket;
import java.net.InetAddress;

public class Sender {
	public static void main(String[] args) {
		try {
			//���� ������ ���ڿ�
			String s = "�ù谩�ϴ�~!";
			//�����ͱ׷� ������ �����Ѵ�
			DatagramSocket socket = new DatagramSocket();
			//���ڿ��� byte�迭�� �����.
			byte[] buf = s.getBytes();
			//127.0.0.1���� ��Ŷ�� �����Ұž� �׷��� �ּҸ� �޾ƿðž�
			InetAddress address = InetAddress.getByName("127.0.0.1");
			//���� ��Ŷ�� �����Ѵ�(���� byte������, byte����, �������ּ�, ��Ʈ��ȣ
			DatagramPacket packet = new DatagramPacket(buf, buf.length, address, 8000);
			//���Ͽ��� ������ ��Ŷ�� �����Ѵ�.
			socket.send(packet);
			System.out.println("�ù�߼�");
			//������ �ݴ´�.
			socket.close();
			
			
		} catch (Exception e) {}
		
		
		
	}
}
