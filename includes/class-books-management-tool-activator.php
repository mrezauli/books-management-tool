<?php

/**
 * Fired during plugin activation
 *
 * @link       http://onlinewebtutorhub.blogspot.com/
 * @since      1.0.0
 *
 * @package    Books_Management_Tool
 * @subpackage Books_Management_Tool/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Books_Management_Tool
 * @subpackage Books_Management_Tool/includes
 * @author     ONline Web Tutor <onlinewebtutorhub@gmail.com>
 */
class Books_Management_Tool_Activator
{

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public function activate()
	{
		$this->createBooksTable();
		$this->createBookshelvsTable();
		$this->insertPost();
	}

	private function createBooksTable()
	{
		global $wpdb;
		$tableName = $wpdb->prefix . 'bmt_books';
		//`bookshelf_id` INT NOT NULL,
		//$bmt_bookshelvs = $wpdb->prefix . 'bmt_bookshelvs';
		//FOREIGN KEY (`bookshelf_id`) REFERENCES `$bmt_bookshelvs`(`id`) ON UPDATE CASCADE ON DELETE SET NULL

		$createBookTable = "
		CREATE TABLE `$tableName` (
			`id` INT NOT NULL AUTO_INCREMENT,
			`name` VARCHAR(150) NULL DEFAULT NULL,
			`amount` INT NULL DEFAULT NULL,
			`description` TEXT NOT NULL,
			`image` VARCHAR(150) NULL DEFAULT NULL,
			`language` VARCHAR(150) NULL DEFAULT NULL,
			`status` INT(1) NOT NULL DEFAULT '1',
			`created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
			`updated_at` TIMESTAMP NULL DEFAULT NULL,
			`deleted_at` TIMESTAMP NULL DEFAULT NULL,
			PRIMARY KEY (`id`)
		)
		COLLATE='utf8mb4_unicode_ci';
		";

		$dummyBookData = "
		INSERT INTO
			`$tableName` ( name, amount, description, image, LANGUAGE, status)
		VALUES
			('testName1', 1, 'testDescription1', 'testImage1', 'testEn1', 1),
			('testName11', 11, 'testDescription11', 'testImage11', 'testEn11', 11),
			('testName111', 111, 'testDescription111', 'testImage111', 'testEn111', 111)
		";

		require_once(ABSPATH . "wp-admin/includes/upgrade.php");
		if (!$this->tableInstanceChecker($tableName)) {
			dbDelta($createBookTable);
			$wpdb->query($dummyBookData);
		}
	}

	private function createBookshelvsTable()
	{
		global $wpdb;
		$tableName = $wpdb->prefix . 'bmt_bookshelvs';

		$createBookshelvsTable = "
		CREATE TABLE `$tableName` (
			`id` INT NOT NULL AUTO_INCREMENT,
			`name` VARCHAR(150) NOT NULL,
			`capacity` INT NOT NULL,
			`location` VARCHAR(150) NOT NULL,
			`status` INT(1) NOT NULL DEFAULT '1',
			`created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
			`updated_at` TIMESTAMP NULL DEFAULT NULL,
			`deleted_at` TIMESTAMP NULL DEFAULT NULL,
			PRIMARY KEY (`id`)
		)
		COLLATE='utf8mb4_unicode_ci';
		";

		$dummyBookshelvsData = "
		INSERT INTO
			`$tableName` ( name, capacity, location, status)
		VALUES
			('testName1', 1, 'testLocation1', 1),
			('testName11', 11, 'testLocation11', 11),
			('testName111', 111, 'testLocation111', 111)
		";

		require_once(ABSPATH . "wp-admin/includes/upgrade.php");
		if (!$this->tableInstanceChecker($tableName)) {
			dbDelta($createBookshelvsTable);
			$wpdb->query($dummyBookshelvsData);
		}
	}

	private function tableInstanceChecker(string $tableName)
	{
		global $wpdb;
		$showTable = $wpdb->get_var("SHOW TABLES LIKE '$tableName';");
		if (isset($showTable)) {
			return true;
		} else {
			return false;
		}
	}

	private function insertPost()
	{
		$data = file_get_contents(ABSPATH . "wp-content/plugins/books-management-tool/assets/sample/data.json");
		$postarr = json_decode($data, true);
		$post_title = $postarr['post']['post_title'];
		$post_type = $postarr['post']['post_type'];

		if ($this->postInstanceChecker($post_title, $post_type)) {
			wp_insert_post($postarr['post']);
		}
	}

	private function postInstanceChecker(string $post_title,string $post_type)
	{
		global $wpdb;

		$postsTitles = $wpdb->get_row(
			$wpdb->prepare("SELECT * FROM wp_posts WHERE post_title = %s AND post_type = %s", $post_title, $post_type)
		);

		if (empty($postsTitles)) {
			return true;
		} else {
			return false;
		}
	}
}
