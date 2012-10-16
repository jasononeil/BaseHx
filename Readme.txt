

---
---
---
---
---
This project is deprecated.
I did use it for one or two projects a few years ago.  But it was pretty incomplete and I was not a very
experience programmer.  If you're looking for a haxe web framework, take a look at:

 * UFront https://github.com/fponticelli/ufront/wiki
 * Harfang http://haxe.org/com/libs/harfang

---
---
---
---
---







=============================================
HxBase
=============================================

---------------------------------------------
What is it?

This is a framework to allow you to develop database driven web applications pretty quickly.
Similar to RubyOnRails or CakePHP, but a little more humble :)  
It uses haXe, a great language for cross platform web development.  This will likely export to PHP or Neko.

---------------------------------------------
What are the key files / directories?

src/			This is the haXe Source, where your programming logic goes.  (Any classes that result in their own output file basically)
src/lib/		This is any outside libraries you use (this includes some key HxBase libs)
src/models/		This is any Model classes (usually corresponding to a database table)
src/controllers/	This is any Controller classes (usually responsible for CRUD actions - create, read, update, delete)
src/views/		Not sure what to do here.  Just put the templates?  Or some kind of class to launch the templates?  And do you have one class per model?  Or... 
			(maybe a base class that you can feed both a model and a template and it figures out the rest)
php/			The PHP output goes here.  You could copy the contents of this folder to your webserver to install your app.
doc/			This is a HTML export of the API docs for your app (and our classes).
includes/		All contents of this file get copied to the output folder (php/)

compile.hxml		The compile variables HaXe uses.  Suitable defaults are here, if you add pages you'll need to add to this
compile			This script runs haxe to compile our code, add in our "/includes/" directory, and make our documentation.

---------------------------------------------
I just want to get started.  How?

-try copying the contents of php/ to your webserver.
-some sort of script to generate our SPOD models for us?