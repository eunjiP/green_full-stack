import java.net.DatagramPacket;
import java.net.DatagramSocket;
import java.net.InetAddress;

public class Sender {
	public static void main(String[] args) {
		try {
			//내가 전송할 문자열
			String s = "택배갑니다~!";
			//데이터그램 소켓을 생성한다
			DatagramSocket socket = new DatagramSocket();
			//문자열을 byte배열로 만든다.
			byte[] buf = s.getBytes();
			//127.0.0.1에게 패킷을 전송할거야 그래서 주소를 받아올거야
			InetAddress address = InetAddress.getByName("127.0.0.1");
			//보낼 패킷을 생성한다(보낼 byte데이터, byte길이, 목적지주소, 포트번호
			DatagramPacket packet = new DatagramPacket(buf, buf.length, address, 8000);
			//소켓에서 생성한 패킷을 전송한다.
			socket.send(packet);
			System.out.println("택배발송");
			//소켓을 닫는다.
			socket.close();
			
			
		} catch (Exception e) {}
		
		
		
	}
}
