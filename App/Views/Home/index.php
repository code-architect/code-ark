<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home Page</title>
</head>
<body>
    <h1>Welcome</h1>
    <p>Hello from the homepage view</p>

    <?php
    if($_SERVER['REQUEST_METHOD']==='POST')
    {
        echo "Hello, ". htmlspecialchars($_POST['name']);
    }
    ?>

    <form action="" method="post">
        <div>
            <label for="name">Your name</label>
            <input id="name" name="name" type="text" autofocus=""/>
        </div>

        <div>
            <button type="submit">Submit</button>
        </div>

    </form>


    <br/><br/><br/><br/>
    <?php


   echo htmlspecialchars($name);

    echo "<br>";

    foreach($city as $cit)
    {
        echo $cit."<br>";
    }

    ?>

</body>
</html>