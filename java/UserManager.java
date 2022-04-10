import java.io.DataInputStream;
import java.net.Socket;

public class UserManager implements Runnable{
	Socket socket;		//Ŭ���̾�Ʈ�� ����� socket ��ü
	DataInputStream in;	//Ŭ���̾�Ʈ�� ����� socket���� �޾ƿ� DataInputStream
	String nickName;	//Ŭ���̾�Ʈ�� �г���
	Users users;		//UsersŬ������ ��ü
	
	public UserManager(Socket socket, Users users) throws Exception {
		this.users = users;
		this.socket = socket;
		this.in = new DataInputStream(socket.getInputStream());
		//���ʷ� Ŭ���̾�Ʈ�� ����Ǹ� Ŭ���̾�Ʈ�� ä�ù��� �����ڿ���
		//�������� �г����� write�� -> readUTF()�� �ϸ� Ŭ���̾�Ʈ�� �г����� �޾ƿ´�.
		this.nickName = in.readUTF();
		//usersŬ������ add_user�� ȣ��(����� ���ϰ� �г��� ����)
		this.users.add_user(socket, nickName);
	}
	//Ŭ���̾�Ʈ�� �������� �޼����� �����ϸ� �޾Ƽ� ��� Ŭ���̾�Ʈ�鿡�� �������ִ� ����
	@Override
	public void run() {
		try {
			while(true) {
				//������ Ŭ���̾�Ʈ�� ���� ä���̿����� �д´�.
				String message = in.readUTF();
				//��� Ŭ���̾�Ʈ�鿡�� �ش�޼����� ����
				this.users.send_message(this.nickName + " : " + message + "\n");
			}
			//���⼭ Exception�� �߻��ߴٴ� �� : send_message���� Exception�߻�
			//����ڰ� ������ �����ٴ� �ǹ̷�, ä�ù濡�� ����ڸ� ����
		} catch (Exception e) {
			//usersŬ������ remove_user�޼ҵ带 ȣ���Ͽ� ����ڸ� ����
			users.remove_user(this.nickName);
		}
		
	}
	
	
}
