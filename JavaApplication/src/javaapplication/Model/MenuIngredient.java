package Model;


/**
 * @author S40
 * @version 1.0
 * @created 17-Mar-2020 10:09:25 PM
 */
public class MenuIngredient {

	private Ingredient ingredient;
	private Menu menu;
	private int quantity;
	public Menu m_Menu;
	public Ingredient m_Ingredient;

	public MenuIngredient(){

	}

	public void finalize() throws Throwable {

	}

	/**
	 * 
	 * @param mi
	 */
	public CreateMenuIngredient(MenuIngredient mi){

	}

	/**
	 * 
	 * @param menuId
	 * @param ingredientId
	 */
	public DeleteMenuIngredient(int menuId, int ingredientId){

	}

	/**
	 * 
	 * @param menuId
	 */
	public <List>Ingredient GetAllMenuIngredient(int menuId){
		return null;
	}

	public <List>MenuIngredient ReadMenuIngredient(){
		return null;
	}

	/**
	 * 
	 * @param mi
	 */
	public UpdateMenuIngredient(MenuIngredient mi){

	}

}