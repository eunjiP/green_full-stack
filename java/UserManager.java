import java.io.DataInputStream;
import java.net.Socket;

public class UserManager implements Runnable{
	Socket socket;		//클라이언트와 연결된 socket 객체
	DataInputStream in;	//클라이언트와 연결된 socket에서 받아온 DataInputStream
	String nickName;	//클라이언트의 닉네임
	Users users;		//Users클래스의 객체
	
	public UserManager(Socket socket, Users users) throws Exception {
		this.users = users;
		this.socket = socket;
		this.in = new DataInputStream(socket.getInputStream());
		//최초로 클라이언트기 연결되면 클라이언트는 채팅방의 생성자에게
		//서버에게 닉네임을 write함 -> readUTF()를 하면 클라이언트의 닉네임을 받아온다.
		this.nickName = in.readUTF();
		//users클래스의 add_user를 호출(연결되 소켓과 닉네임 전달)
		this.users.add_user(socket, nickName);
	}
	//클라이언트가 서버에게 메세지를 전송하면 받아서 모든 클라이언트들에게 전송해주는 역할
	@Override
	public void run() {
		try {
			while(true) {
				//서버로 클라이언트가 보낸 채팅이왔으면 읽는다.
				String message = in.readUTF();
				//모든 클라이언트들에게 해당메세지를 전송
				this.users.send_message(this.nickName + " : " + message + "\n");
			}
			//여기서 Exception이 발생했다는 것 : send_message에서 Exception발생
			//사용자가 접속을 끊었다는 의미로, 채팅방에서 사용자를 제거
		} catch (Exception e) {
			//users클래스의 remove_user메소드를 호출하여 사용자를 제거
			users.remove_user(this.nickName);
		}
		
	}
	
	
}
