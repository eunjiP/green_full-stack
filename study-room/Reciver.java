import java.net.*;


public class Reciver {

	public static void main(String[] args) {
		//256byte�� ������ �� �ִ� ����Ʈ �迭
		byte[] buf = new byte[256];
		try {
			System.out.println("�ù� ���� �ɴϱ�?");
			//8000�� ��Ʈ�� bind�Ǵ� ������ �����Ѵ�.(��������� �ù��ٸ�)
			DatagramSocket socket = new DatagramSocket(8000);
			//���� ��������Ŷ ��ü ���� (����Ʈ �迭, ����Ʈ����)
			DatagramPacket packet = new DatagramPacket(buf, buf.length);
			//�������κ��� ��Ŷ�� �����Ѵ�.(buf�迭�� ����Ǿ� ����)
			socket.receive(packet);
			//����Ʈ�迭�� ���ڿ�(String)���� ���� �� ���
			System.out.println(new String(buf));
			
		}
		catch (Exception e) {}
		
	}

}
