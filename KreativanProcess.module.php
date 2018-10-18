<?php
/**
 *  Kreativan Process Module
 *
 *  @author Ivan Milincic <kreativan@outlook.com>
 *  @copyright 2018 Kreativan
 *
 *
*/

class KreativanProcess extends Process {

	/**
	 * This is an optional initialization function called before any execute functions.
	 *
	 * If you don't need to do any initialization common to every execution of this module,
	 * you can simply remove this init() method.
	 *
	 */
	public function init() {
		parent::init(); // always remember to call the parent init
	}

	/**
	 * This function is executed when a page with your Process assigned is accessed.
 	 *
	 * This can be seen as your main or index function. You'll probably want to replace
	 * everything in this function.
	 *
	 */
	public function ___execute() {

		// display messages if session alert and status vars are set
		if($this->session->status == 'message') {
			$this->message($this->session->alert);

		} else if($this->session->status == 'warning') {
			$this->warning($this->session->alert);

		} elseif($this->session->status == 'error') {
			$this->error($this->session->alert);
		}

		// reset / delete status and alert session vars
		$this->session->remove('status');
		$this->session->remove('alert');


		// include admin markup file
		$template_file = $this->config->paths->siteModules . $this->className() . "/admin.php";
		return $this->files->render($template_file);
		
	}

	/**
	 * Called when the URL is this module's page URL + "/something/"
	 *
	 */
	public function ___executeSomething() {

		// set a new headline, replacing the one used by our page
		// this is optional as PW will auto-generate a headline
		$this->headline('This is something!');

		// add a breadcrumb that returns to our main page
		// this is optional as PW will auto-generate breadcrumbs
		$this->breadcrumb('../', 'Hello');

		$out = 	"
			<h2>Not much to to see here</h2>
			<p><a href='../'>Go Back</a></p>
			";

		return $out;
	}

	/**
	 * Called only when your module is installed
	 *
	 * If you don't need anything here, you can simply remove this method.
	 *
	 */
	public function ___install() {
		parent::___install(); // always remember to call parent method
	}

	/**
	 * Called only when your module is uninstalled
	 *
	 * This should return the site to the same state it was in before the module was installed.
	 *
	 * If you don't need anything here, you can simply remove this method.
	 *
	 */
	public function ___uninstall() {
		parent::___uninstall(); // always remember to call parent method
	}

}
