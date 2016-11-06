# Documentation
![Code-Ark by codearchitect.in](code-ark.png)

## _**Features**_
* Pretty URLs
* PSR-1 Coding standards 
* Autoload Classes


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
Action methods are named using __camelCase__

