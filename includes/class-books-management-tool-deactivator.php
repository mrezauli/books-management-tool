<?php

/**
 * Fired during plugin deactivation
 *
 * @link       http://onlinewebtutorhub.blogspot.com/
 * @since      1.0.0
 *
 * @package    Books_Management_Tool
 * @subpackage Books_Management_Tool/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Books_Management_Tool
 * @subpackage Books_Management_Tool/includes
 * @author     ONline Web Tutor <onlinewebtutorhub@gmail.com>
 */
class Books_Management_Tool_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public function deactivate() {
		$this->dropBooksTable();
		$this->dropBookshelvsTable();
		$this->deletePost();
	}

	private function dropBooksTable(Type $var = null)
	{
		global $wpdb;
		$tableName = $wpdb->prefix . 'bmt_books';
		$wpdb->query("DROP TABLE IF EXISTS `$tableName`;");
	}

	private function dropBookshelvsTable()
	{
		global $wpdb;
		$tableName = $wpdb->prefix . 'bmt_bookshelvs';
		$wpdb->query("DROP TABLE IF EXISTS `$tableName`;");
	}

	private function deletePost()
	{
		$data = file_get_contents(ABSPATH . "wp-content/plugins/books-management-tool/assets/sample/data.json");
		$dataObject = json_decode($data, true);
		$post_title = $dataObject['post']['post_title'];
		$post_type = $dataObject['post']['post_type'];

		$getPost = $this->getPost($post_title, $post_type);

		//echo "<pre>";
		//print_r( $getPost->ID );
		//echo "</pre>";
		//die();

		if ($getPost) {
			wp_delete_post($getPost['ID'], true);
		}
	}

	private function getPost(string $post_title, string $post_type)
	{
		global $wpdb;
		$post = $wpdb->get_row(
			$wpdb->prepare("SELECT * FROM wp_posts WHERE post_title = %s AND post_type = %s", $post_title, $post_type),
			'ARRAY_A'
		);

		if (isset($post)) {
			return $post;
		} else {
			return null;
		}
		
	}

}
