import java.net.*;


public class Reciver {

	public static void main(String[] args) {
		//256byte를 저장할 수 있는 바이트 배열
		byte[] buf = new byte[256];
		try {
			System.out.println("택배 언제 옵니까?");
			//8000번 포트와 bind되는 소켓을 생성한다.(문열어놓고 택배기다림)
			DatagramSocket socket = new DatagramSocket(8000);
			//받을 데이터패킷 객체 생성 (바이트 배열, 바이트길이)
			DatagramPacket packet = new DatagramPacket(buf, buf.length);
			//소켓으로부터 패킷을 수신한다.(buf배열에 저장되어 들어옴)
			socket.receive(packet);
			//바이트배열을 문자열(String)으로 생성 후 출력
			System.out.println(new String(buf));
			
		}
		catch (Exception e) {}
		
	}

}
