# Documentation
![Code-Ark by codearchitect.in](code-ark.png)

## _**Features**_
* Pretty URLs
* PSR-1 Coding standards 
* Autoload Classes
* Action Filters


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

Views have output escaping