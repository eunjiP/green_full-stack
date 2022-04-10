import java.io.DataOutputStream;
import java.net.Socket;
import java.util.HashMap;
import java.util.Iterator;


public class Users {
	//모든 클라이언트를 관리하는 HashMap
	//key : 클라이언트의 닉네임, value:클라이언트와 연결되어있는 socket의 DataOutputStream
	HashMap<String, DataOutputStream> clientMap = new HashMap<>();
	
	//클라이언트가 접속했을때 실행되는 add_user, HashMap에 추가하는 작업을 담당
	//Socket:연결된 클라이언트, 소켓, 닉네임:연결된 클라이언트의 닉네임
	public synchronized void add_user(Socket socket, String nickName) {
		try {
			//클라이언트와 연결된 소케에서 서버가 보낼 OutputStream을 받아옴
			DataOutputStream outputStream = new DataOutputStream(socket.getOutputStream());
			//HashMap에 추가
			clientMap.put(nickName, outputStream);
			send_message(nickName + "님이 입장 하셨습니다. -- SERVER\n");
			send_message("-- 현재 채팅 참여 인원: " + clientMap.size() + "--\n");
		} catch (Exception e) {}
	}
	//채팅방을 나갔을때 동작을 처리함.HashMap에서 해당유저를 제거
	//nickName:채팅방을 나간 클라이언트 닉네임
	public synchronized void remove_user(String nickName) {
		try {
			//HashMap에서 key 값을 제거한다.
			clientMap.remove(nickName);
			send_message(nickName + "님이 퇴장 하셨습니다. -- SERVER\n");
			send_message("-- 현재 채팅 참여 인원: " + clientMap.size() + "--\n");
		} catch (Exception e) {}
	}
	
	//접속되어있는 모든 클라이언트들에게 메세지를 보내는 담당.
	//HashMap에 저장되어 있는 모든 DataOutputStream에사 writeUTF를 함.
	//message:모든 클라이언트들에게 보낼 메세지
	public synchronized void send_message(String message) throws Exception{
		//모든 클라이언트의 닉네임을 Iterator로 받아온다.
		Iterator<String> iter = clientMap.keySet().iterator();
		while(iter.hasNext()) {	//다음 보낼 사람이 존재한다면
			String clienNickname = iter.next(); //닉네임을 받아서
			clientMap.get(clienNickname).writeUTF(message);
		}
	}
}
