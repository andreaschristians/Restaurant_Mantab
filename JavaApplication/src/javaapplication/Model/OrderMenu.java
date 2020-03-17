package Model;


/**
 * @author S40
 * @version 1.0
 * @created 17-Mar-2020 10:09:27 PM
 */
public class OrderMenu {

	private Menu menu;
	private Order order;
	private int quantity;
	public Order m_Order;
	public Menu m_Menu;

	public OrderMenu(){

	}

	public void finalize() throws Throwable {

	}

	/**
	 * 
	 * @param om
	 */
	public CreateOrderMenu(OrderMenu om){

	}

	/**
	 * 
	 * @param orderId
	 */
	public CreateSelectedOrderMenu(int orderId){

	}

	/**
	 * 
	 * @param orderId
	 * @param menuId
	 */
	public int DeleteOrderMenu(int orderId, int menuId){
		return 0;
	}

	public <List>OrderMenu ReadOrderMenu(){
		return null;
	}

	/**
	 * 
	 * @param om
	 */
	public UpdateOrderMenu(OrderMenu om){

	}

}