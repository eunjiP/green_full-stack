import java.io.DataOutputStream;
import java.net.Socket;
import java.util.HashMap;
import java.util.Iterator;


public class Users {
	//��� Ŭ���̾�Ʈ�� �����ϴ� HashMap
	//key : Ŭ���̾�Ʈ�� �г���, value:Ŭ���̾�Ʈ�� ����Ǿ��ִ� socket�� DataOutputStream
	HashMap<String, DataOutputStream> clientMap = new HashMap<>();
	
	//Ŭ���̾�Ʈ�� ���������� ����Ǵ� add_user, HashMap�� �߰��ϴ� �۾��� ���
	//Socket:����� Ŭ���̾�Ʈ, ����, �г���:����� Ŭ���̾�Ʈ�� �г���
	public synchronized void add_user(Socket socket, String nickName) {
		try {
			//Ŭ���̾�Ʈ�� ����� ���ɿ��� ������ ���� OutputStream�� �޾ƿ�
			DataOutputStream outputStream = new DataOutputStream(socket.getOutputStream());
			//HashMap�� �߰�
			clientMap.put(nickName, outputStream);
			send_message(nickName + "���� ���� �ϼ̽��ϴ�. -- SERVER\n");
			send_message("-- ���� ä�� ���� �ο�: " + clientMap.size() + "--\n");
		} catch (Exception e) {}
	}
	//ä�ù��� �������� ������ ó����.HashMap���� �ش������� ����
	//nickName:ä�ù��� ���� Ŭ���̾�Ʈ �г���
	public synchronized void remove_user(String nickName) {
		try {
			//HashMap���� key ���� �����Ѵ�.
			clientMap.remove(nickName);
			send_message(nickName + "���� ���� �ϼ̽��ϴ�. -- SERVER\n");
			send_message("-- ���� ä�� ���� �ο�: " + clientMap.size() + "--\n");
		} catch (Exception e) {}
	}
	
	//���ӵǾ��ִ� ��� Ŭ���̾�Ʈ�鿡�� �޼����� ������ ���.
	//HashMap�� ����Ǿ� �ִ� ��� DataOutputStream���� writeUTF�� ��.
	//message:��� Ŭ���̾�Ʈ�鿡�� ���� �޼���
	public synchronized void send_message(String message) throws Exception{
		//��� Ŭ���̾�Ʈ�� �г����� Iterator�� �޾ƿ´�.
		Iterator<String> iter = clientMap.keySet().iterator();
		while(iter.hasNext()) {	//���� ���� ����� �����Ѵٸ�
			String clienNickname = iter.next(); //�г����� �޾Ƽ�
			clientMap.get(clienNickname).writeUTF(message);
		}
	}
}
