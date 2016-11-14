# Documentation
![Code-Ark by codearchitect.in](code-ark.png)

## _**Features**_
* Pretty URLs
* PSR-1 Coding standards 
* Autoload Classes
* Action Filters
* Added Twig template and Twig rendered views 
* PDO Database connection
* Exception Handler and Error Handler
* Error Log
* Development and Production Mode


## **Configure** 
To have the public folder as the web root we need to configure the web server so the root is not the current root, but is
the public folder.
Go to Apache configuration, and find "Localhost VirtualHost" settings, and change the DocumentRoot directive.

or use the .htaccess file just change the __"RewriteBase /Your-project/"__ to your project directory name.

## **Pretty or Vanity URLs**
 To get pretty url just change the __"RewriteBase /sand_box/code_ark/"__ of .htaccess in public folder to your root directory.
 
## **Controller and Action**
Words separated in the URL by __hyphens__. <br> 
Controller classes are named using __StudlyCaps__ (PSR-1 coding standard)<br>
Action methods are named using __camelCase__ <br>

************************************************************************************************************************<br>

Add a suffix to the method name, we need specify that any actions added to controllers will need to have this suffix <br> <br>
<pre><code>
class Posts<br>
{<br>
    public function indexAction()<br>
    {<br>
        // show all posts<br>
    }<br>
    public function showAction()<br>
    {<br>
            // show all posts<br>
    }<br>
}
</code></pre>


if we return false from the __before__ method from the implemented class, it won't execute the originally called method
 and this is useful for example for checking to see if the user had logged in or had the correct permission. 
 It's very useful for things like authentication. 
 
 <pre><code>
 protected function before()<br>
     {<br>
         echo "(before)";<br>
         return false;<br>
     }
 </code></pre>
  
************************************************************************************************************************<br>
### __Organized  controllers in subdirectories: Routes with namespace__
* __Option__ to specify the __namespace__ in the route
* Defaults to __APP\Controllers__ if not specified, but we can specify it if we want and have what ever namespace
<br>
  for example: 
  <pre><code>
  $router->add(<br>
  'admin/{controller}/{action}',<br>
   ['namespace' => 'Admin']<br>
   );
  </code></pre>

Showing the same thing in the router table, 
adding the __Admin__ subdirectory in the __Controllers__ directory under __App__ root directory

<pre><code>
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');

// adding the Admin subdirectory in the Controllers directory under App root directory
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);
</code></pre>

## **Views**

Have two kinds of rendering options 

* PHP rendering
<pre><code> 
View::render('Posts/index.php')
</code></pre>

* Twig template rendering
<pre><code> 
View::render('Posts/index.html')
</code></pre>
Views have output escaping __Using Twig template engine.__

__Passing data to the view in PHP__
             <pre><code> 
               $arr = ['12', '13', '14'];<br>
               $arr2 = ['ok', 'see', 'you'];<br>
               $arr3 = ['name'=>'skull', 'home'=>'earth'];<br>
               View::render('Home/index.php',['name' => 'Architect',<br>
               'city' => [$arr, $arr2, $arr3]]);
             </code></pre>

__Passing data to the view in Twig__
<pre><code> 
  $arr = ['12', '13', '14'];<br>
  $arr2 = ['ok', 'see', 'you'];<br>
  $arr3 = ['name'=>'skull', 'home'=>'earth'];<br>
  View::renderTemplate('Home/index.html', ['name' => 'Architect','numbers'=>$arr, $arr2, 'details'=>$arr3]);
</code></pre>

## **Models**

 Cache database connection
 
 Change Database information in the App/Config.php file. 

## **Exception Handler**

Converting errors into exception and then handling them, exceptions have the added benefit of having a __stack trace__, which
 is helpful when debugging.
 
 Change the __const SHOW_ERRORS__ in the config.php to toggle between development and user mode.
