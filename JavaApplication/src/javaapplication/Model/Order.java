package Model;


/**
 * @author S40
 * @version 1.0
 * @created 17-Mar-2020 10:09:26 PM
 */
public class Order {

	private int id;
	private Date orderDate;
	private boolean status;
	public Employee m_Employee;
	public Table m_Table;

	public Order(){

	}

	public void finalize() throws Throwable {

	}

	/**
	 * 
	 * @param o
	 */
	public CreateOrder(Order o){

	}

	/**
	 * 
	 * @param id
	 */
	public DeleteOrder(int id){

	}

	public <List>Order ReadOrder(){
		return null;
	}

	/**
	 * 
	 * @param o
	 */
	public UpdateOrder(Order o){

	}

	/**
	 * 
	 * @param id
	 */
	public UpdateOrderStatus(int id){

	}

}