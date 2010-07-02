<?php

class MainApp {
	public function __construct(){}
	static $startTime;
	static function main() {
		haxe_Log::$trace = (isset(hxbase_Log::$trace) ? hxbase_Log::$trace: array("hxbase_Log", "trace"));
		php_Lib::hprint("<pre>");
		$request = php_Web::getParams()->get("request");
		hxbase_Dispatcher::dispatch($request);
		php_Lib::hprint("</pre>");
		MainApp::printStats();
	}
	static $pageTemplateFile;
	static function initiatePageTemplate() {
		$template = new hxbase_tpl_HxTpl();
		$template->loadTemplateFromFile(MainApp::$pageTemplateFile);
		return $template;
	}
	static function testing() {
		hxbase_DbControl::connect();
		haxe_Log::trace(hxbase_DbControl::$cnx, _hx_anonymous(array("fileName" => "MainApp.hx", "lineNumber" => 47, "className" => "MainApp", "methodName" => "testing")));
		$u = models_User::$manager->search(_hx_anonymous(array("username" => "jason")), null)->first();
		if($u === null) {
			$u = new models_User();
			$u->username = "jason";
			$u->password = haxe_Md5::encode("password");
			$u->insert();
			haxe_Log::trace("Inserted, id is " . $u->id, _hx_anonymous(array("fileName" => "MainApp.hx", "lineNumber" => 57, "className" => "MainApp", "methodName" => "testing")));
		}
		else {
			haxe_Log::trace("User already there.  Id is " . $u->id, _hx_anonymous(array("fileName" => "MainApp.hx", "lineNumber" => 61, "className" => "MainApp", "methodName" => "testing")));
		}
		$count = models_TodoItem::$manager->count(null);
		$t = new models_TodoItem();
		$t->userId = $u->id;
		$t->subject = "Todo number " . $count;
		$t->text = ("You better get moving before number " . ($count + 1)) . " comes along";
		$t->priority = 5;
		$t->completion = Std::random(100) / 100;
		$t->insert();
		$todoList = models_TodoItem::$manager->all(null);
		$�it = $todoList->iterator();
		while($�it->hasNext()) {
		$item = $�it->next();
		{
			haxe_Log::trace((("ITEM: " . $item->subject) . " ") . $item->get_user()->username, _hx_anonymous(array("fileName" => "MainApp.hx", "lineNumber" => 78, "className" => "MainApp", "methodName" => "testing")));
			;
		}
		}
		haxe_Log::trace((("Number of tasks for " . $u->username) . ": ") . $u->getter_todoList()->length, _hx_anonymous(array("fileName" => "MainApp.hx", "lineNumber" => 82, "className" => "MainApp", "methodName" => "testing")));
		$�it2 = $u->getter_todoList()->iterator();
		while($�it2->hasNext()) {
		$item2 = $�it2->next();
		{
			haxe_Log::trace((("ITEM: " . $item2->subject) . " ") . $item2->get_user()->username, _hx_anonymous(array("fileName" => "MainApp.hx", "lineNumber" => 85, "className" => "MainApp", "methodName" => "testing")));
			;
		}
		}
		hxbase_DbControl::close();
	}
	static function printStats() {
		php_Lib::hprint("<pre>");
		$memory = memory_get_peak_usage();
		$memory = intval($memory / 1000);
		haxe_Log::trace(("Memory usage: " . $memory) . "kb", _hx_anonymous(array("fileName" => "MainApp.hx", "lineNumber" => 98, "className" => "MainApp", "methodName" => "printStats")));
		$executionTime = php_Sys::time() - MainApp::$startTime;
		haxe_Log::trace("Execution Time: " . $executionTime, _hx_anonymous(array("fileName" => "MainApp.hx", "lineNumber" => 101, "className" => "MainApp", "methodName" => "printStats")));
		php_Lib::hprint("</pre>");
	}
	function __toString() { return 'MainApp'; }
}
MainApp::$startTime = php_Sys::time();
