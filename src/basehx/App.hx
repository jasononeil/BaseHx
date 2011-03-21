package basehx;
import AppConfig;
import basehx.tpl.HxTpl;

class App 
{
	static var startTime:Float;
	
	public static function initiate() {
		startTime = php.Sys.time();
		haxe.Log.trace = basehx.Log.trace;
		
		// If a function has been set to register our error messages, call it now before we go any further
		if (AppConfig.errorRegistry != null)
		{
			AppConfig.errorRegistry();
		}
		
		var request:String = php.Web.getParams().get("request");
		basehx.Dispatcher.dispatch(request);
	}
	
	static public function initiatePageTemplate() 
	{
		var template = new HxTpl();
		template.loadTemplateFromFile(AppConfig.pageTemplateFile);
		return template;
	}
	
	public static function redirect(url) {
		php.Web.redirect(AppConfig.baseUrl + url);
	}
	
	public static function printStats() {
		php.Lib.print("<pre>");
		var memory = untyped __call__("memory_get_peak_usage");
		memory = Std.int(memory / 1000);
		trace("Memory usage: " + memory + "kb");
		var executionTime = php.Sys.time() - startTime;
		trace("Execution Time: " + executionTime);
		php.Lib.print("</pre>");
	}
}
