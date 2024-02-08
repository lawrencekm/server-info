### Server Info Package
--------------------------
A PHP package for retrieving Server information and System services details for monitoring purposes.


Installation
-------------
To install the package in your PHP project:
```
    composer require lawrencekm/server-info
```

You can also Clone the repository or download the source code.
```
    git clone https://github.com/lawrencekm/server-info.git
```
Install dependencies using Composer.
```
    composer install
```

Usage
-----
To use the Server Info package, follow these steps:

Initialize the ServerInfo class in your PHP code.
```
    require __DIR__ . '/vendor/autoload.php';

    $serverInfo = new ServerInfo();
    Retrieve server information in JSON format.

    echo $serverInfo->getServerInformation();
    //Optionally, you can render the information as an HTML table.

    // echo $serverInfo->getServerInformation(); // Uncomment this line if not already called
    $data = json_decode($serverInfo->getServerInformation(), true);


    // Render HTML tables
```

Testing
-------
To run tests using PHPUnit, follow these steps:

Ensure PHPUnit is installed as a development dependency.
```    composer install --dev```
Run PHPUnit tests.
```./vendor/bin/phpunit tests```


Running as Web Server
------------------------
You can run the application as a web server using Docker. Choose one of the following methods:

Method 1: Dockerfile
--------------------
Create a Dockerfile with the following content:
    
    ```
    FROM php:8.2-apache
    COPY . /var/www/html/
    ```
Build and run the Docker container:
    ```
    docker build -t my-server-info .
    docker run -p 8080:80 -d my-server-info
        ```
        
Method 2: Without Dockerfile
-----------------------------
Run the following Docker command to get the output on browser localhost:8080:

```  docker run -d -p 8080:80 --name my-server-info-php-app -v "$PWD":/var/www/html php:8.2-apache```

Run Via Command Line
-----------------------
You can also run index.php file via the command line to get a json response:

``` php index.php ```
