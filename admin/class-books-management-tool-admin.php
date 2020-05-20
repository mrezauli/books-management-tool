<?php

require(ABSPATH . 'wp-content/plugins/books-management-tool/vendor/autoload.php');

use \WeDevs\ORM\Eloquent\Facades\DB;

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://onlinewebtutorhub.blogspot.com/
 * @since      1.0.0
 *
 * @package    Books_Management_Tool
 * @subpackage Books_Management_Tool/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Books_Management_Tool
 * @subpackage Books_Management_Tool/admin
 * @author     ONline Web Tutor <onlinewebtutorhub@gmail.com>
 */
class Books_Management_Tool_Admin
{


	private $bookPages = [
		'Browse Books' => 'browse-books',
		'Read Book' => 'read-book',
		'Add Book' => 'add-book',
		'Edit Book' => 'edit-book',
		'Delete Book' => 'delete-book'
	];

	private $bookShelvs = [
		'Browse Bookshelvs' => 'browse-bookshelvs',
		'Read Bookshelf' => 'read-bookshelf',
		'Add Bookshelf' => 'add-bookshelf',
		'Edit Bookshelf' => 'edit-bookshelf',
		'Delete Bookshelf' => 'delete-bookshelf'
	];

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	private $tableActivator;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->tableActivator = $version;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Books_Management_Tool_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Books_Management_Tool_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		$pageName = isset($_REQUEST['page']) ? $_REQUEST['page'] : '';
		if ($pageName) {
			wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/books-management-tool-admin.css', array(), $this->version, 'all');

			wp_enqueue_style('bmt-parsley', plugin_dir_url(__FILE__) . 'css/parsley.css', array(), $this->version, 'all');

			wp_enqueue_style('bmt-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css', array(), $this->version, 'all');
			//wp_enqueue_style('bmt-jquery-datatables', '//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css', array(), $this->version, 'all');
			wp_enqueue_style('bmt-jquery-datatables-bootstrap4', 'https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css', array(), $this->version, 'all');
			wp_enqueue_style('bmt-bootstrap-sweetalert', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css', array(), $this->version, 'all');
			wp_enqueue_style('bmt-bootstrap-sweetalert', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css', array(), $this->version, 'all');
		}
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Books_Management_Tool_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Books_Management_Tool_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		$pageName = isset($_REQUEST['page']) ? $_REQUEST['page'] : '';
		if ($pageName) {
			wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/books-management-tool-admin.js', array('jquery'), $this->version, false);

			wp_enqueue_script('bmt-parsley', plugin_dir_url(__FILE__) . 'js/parsley.js', array('jquery'), $this->version, false);

			wp_enqueue_script('bmt-popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', array('jquery'), $this->version, false);
			wp_enqueue_script('bmt-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array('jquery'), $this->version, false);
			wp_enqueue_script('bmt-jquery-datatables', '//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js', array('jquery'), $this->version, false);
			wp_enqueue_script('bmt-jquery-datatables-bootstrap4', 'https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js', array('jquery'), $this->version, false);
			//wp_enqueue_script('bmt-validate', '//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js', array('jquery'), $this->version, false);
			//wp_enqueue_script('bmt-parsley', 'https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.js', array('jquery'), $this->version, false);
			wp_enqueue_script('bmt-bootstrap-sweetalert', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js', array('jquery'), $this->version, false);
			wp_localize_script($this->plugin_name, 'bmt_book', [
				'name' => 'artistic',
				'author' => 'stair',
				'adminUrlAdminAjax' => admin_url('admin-ajax.php')
			]);
		}
	}

	/**
	 * Create Admin Menu 
	 */
	public function book_management_menu()
	{
		add_menu_page('Book Management Tool', 'Book Management Tool', 'manage_options', $this->bookPages['Browse Books'], [$this, 'browse_books'], 'dashicons-admin-site-alt3', 21);

		add_submenu_page('browse-books', 'Browse Books', 'Browse Books', 'manage_options', $this->bookPages['Browse Books'], [$this, 'browse_books']);
		add_submenu_page('browse-books', 'Read Book', 'Read Book', 'manage_options', $this->bookPages['Read Book'], [$this, 'read_book']);
		add_submenu_page('browse-books', 'Edit Book', 'Edit Book', 'manage_options', $this->bookPages['Edit Book'], [$this, 'edit_book']);
		add_submenu_page('browse-books', 'Add Book', 'Add Book', 'manage_options', $this->bookPages['Add Book'], [$this, 'add_book']);
		add_submenu_page('browse-books', 'Delete Book', 'Delete Book', 'manage_options', $this->bookPages['Delete Book'], [$this, 'delete_book']);
		add_submenu_page('browse-books', 'WPDB Test', 'WPDB Test', 'manage_options', 'WPDB Test', [$this, 'wpdbTest']);

		add_submenu_page('browse-books', 'Browse Bookshelvs', 'Browse Bookshelvs', 'manage_options', $this->bookShelvs['Browse Bookshelvs'], [$this, 'browse_bookshelvs']);
		add_submenu_page('browse-books', 'Read Bookshelf', 'Read Bookshelf', 'manage_options', $this->bookShelvs['Read Bookshelf'], [$this, 'read_bookshelf']);
		add_submenu_page('browse-books', 'Edit Bookshelf', 'Edit Bookshelf', 'manage_options', $this->bookShelvs['Edit Bookshelf'], [$this, 'edit_bookshelf']);
		add_submenu_page('browse-books', 'Add Bookshelf', 'Add Bookshelf', 'manage_options', $this->bookShelvs['Add Bookshelf'], [$this, 'add_bookshelf']);
		add_submenu_page('browse-books', 'Delete Bookshelf', 'Delete Bookshelf', 'manage_options', $this->bookShelvs['Delete Bookshelf'], [$this, 'delete_bookshelf']);
	}

	/**
	 * Handle AJAX for Admin
	 */

	public function first_ajax_action()
	{
		$param = isset($_REQUEST['param']) ? $_REQUEST['param'] : '';

		if ($param == 'first_ajax_param') {
			echo json_encode([
				'status' => 200,
				'message' => 'success',
				'data' => [
					'name' => 'self',
					'author' => 'quarantine'
				]
			]);
		}

		wp_die();
	}

	/**
	 * Handle action_add_bookshelf
	 */

	public function action_add_bookshelf()
	{
		global $wpdb;
		$param = isset($_REQUEST['param']) ? $_REQUEST['param'] : '';

		if ($param == 'param_add_bookshelf') {
			//var_dump($_REQUEST['name']);
			//var_dump($_REQUEST['capacity']);
			//var_dump($_REQUEST['location']);
			if (isset($_REQUEST['name']) && isset($_REQUEST['capacity']) && isset($_REQUEST['location'])) {
				$name = $_REQUEST['name'];
				$capacity = $_REQUEST['capacity'];
				$location = $_REQUEST['location'];
				$status = $_REQUEST['status'];

				$tableName = $wpdb->prefix . 'bmt_bookshelvs';
				$wpdb->insert($tableName, [
					'name' => $name,
					'capacity' => $capacity,
					'location' => $location,
					'status' => $status,
				]);

				if ($wpdb->insert_id > 0) {
					echo json_encode([
						'status' => 200,
						'message' => 'Success! Bookshelf has added!',
					]);
				} else {
					echo json_encode([
						'status' => 422,
						'message' => 'Fail! Bookshelf hasn\'t added!',
					]);
				}
			} else {
				echo json_encode([
					'status' => 422,
					'message' => 'Fail! Bookshelf hasn\'t added!',
				]);
			}
		}

		wp_die();
	}

	/**
	 * Menu Callback Function + Sub Menu callback function
	 */
	public function browse_books()
	{
		include_once(ABSPATH . 'wp-content/plugins/books-management-tool/admin/partials/browse-book.php');
	}

	/**
	 * Menu Callback Function + Sub Menu callback function
	 */
	public function browse_bookshelvs()
	{
		global $wpdb;
		$tableName = $wpdb->prefix . 'bmt_bookshelvs';
		$bookShelvs = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM " . $tableName ."" 
			)
		);
		//echo "<pre>";
		//print_r($bookShelvs);
		//echo "</pre>";
		include_once(ABSPATH . 'wp-content/plugins/books-management-tool/admin/partials/browse-bookshelvs.php');
	}

	/**
	 * Sub Menu callback function
	 */
	public function read_book()
	{
		echo '<h3>read_books</h3>';
	}

	/**
	 * Sub Menu callback function
	 */
	public function edit_book()
	{
		echo '<h3>edit_book</h3>';
	}

	/**
	 * Sub Menu callback function
	 */
	public function add_book()
	{
		include_once(ABSPATH . 'wp-content/plugins/books-management-tool/admin/partials/add-book.php');
	}

	/**
	 * Sub Menu callback function
	 */
	public function add_bookshelf()
	{
		include_once(ABSPATH . 'wp-content/plugins/books-management-tool/admin/partials/add-bookshelf.php');
	}

	/**
	 * Sub Menu callback function
	 */
	public function delete_book()
	{
		echo '<h3>delete_book</h3>';
	}

	/**
	 * Random Test On WPDB
	 */
	public function wpdbTest()
	{
		$to = 1;
		$from = 3;
		global $wpdb;
		$postTitle = $wpdb->get_var(
			$wpdb->prepare("SELECT post_title FROM wp_posts WHERE ID = %d", $to)
		);
		$post = $wpdb->get_row(
			$wpdb->prepare("SELECT ID, post_title FROM wp_posts WHERE ID = %d", $to)
		);
		$postsTitle = $wpdb->get_col("SELECT post_title FROM wp_posts");
		$postsTitles = $wpdb->get_results(
			$wpdb->prepare("SELECT ID, post_title FROM wp_posts WHERE ID IN (%d, %d)", $to, $from)
		);

		$showTable = $wpdb->get_var("SHOW TABLES LIKE '%bmt_books';");

		echo '<h3>browse_books</h3>';
		echo '<br/>';

		echo "<pre>";
		//print_r( $postTitle );
		echo "</pre>";

		echo "<pre>";
		//print_r($post);
		echo "</pre>";

		echo "<pre>";
		//print_r($postsTitle);
		echo "</pre>";

		echo "<pre>";
		//print_r($postsTitles);
		echo "</pre>";

		echo "<pre>";
		//print_r(isset($showTable));
		echo "</pre>";

		echo "<pre>";
		var_dump(DB::table('users')->find(1));
		var_dump(DB::select('SELECT * FROM wp_users WHERE id = ?', [1]));
		var_dump(DB::table('users')->where('user_login', 'john')->first());
		echo "</pre>";
	}
}
