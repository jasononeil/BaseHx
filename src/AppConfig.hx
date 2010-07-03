/**
This class contains all the config for your app.
I'm not sure which package this should belong in really...
*/
class AppConfig
{
	/*=====================================
	App config
	=====================================*/
	/** Default Controller */
	public static var defaultController:Class<Dynamic> = controllers.AdminController;
	
	/*=====================================
	Filesystem / URL config
	=====================================*/
	
	/** Set this to the base URL of your site, not including a trailing slash.
	
	Examples:
	<ul>
		<li>http://www.mysite.com</li>
		<li>http://www.mysite.com/myapp</li>
	</ul>
	*/
	public static var baseUrl:String = "http://localhost/ptinterviews/php";
	
	/** The subdirectory on the server we are in.  No trailing slash */
	public static var subDir:String = "/ptinterviews/php";
	
	/** Set this to the base filepath of this app on your server,
	(do not include a trailing slash).
	
	Examples:
	<ul>
		<li>/var/www/html</li>
		<li>/home/website</li>
		<li>/home/website/myapp</li>
	</ul>
	
	<b>This property might not be needed... not sure yet.  
	Remember Haxe's import mechanism is alot nicer than PHPs</b>
	*/
	public static var baseFilePath:String;
	
	
	
	/*=====================================
	Database Config
	=====================================*/
	
	/** The address of the database server.  Usually <i>localhost</i>*/
	public static var dbServer:String = "localhost";
	
	/** The port of the database server.  Usually <i>3306</i>*/
	public static var dbPort:Int = 3306;
	
	/** The name of the database to use */
	public static var dbDatabase:String = "ptinterviews";
	
	/** The username to use when logging in to the database server */
	public static var dbUsername:String = "ptinterviews";
	
	/** The password to use when logging in to the database server */
	public static var dbPassword:String = "password";
	
	/** If you have multiple apps (or versions of apps) on this database,
	you can specify a table prefix to keep table names from overlapping
	each other.  For example, "myapp1.0_" */
	public static var tablePrefix:String;
}
