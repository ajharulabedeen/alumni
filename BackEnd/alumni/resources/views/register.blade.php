<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

    <nav class="navbar navbar-default" style="background-color : skyblue">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li ><a href="/">About</a></li>
                <li><a href="#">Members</a></li>
                <li class="active"><a href="#">Membership</a></li>
                <li><a href="#">Events</a></li>
            </ul>
        </div>
    </nav>


    <h2>Register</h2>
    <p>Please provide the information to get registered.</p>
    <form>
        <div class="form-group">
            <label for="fName">First Name:</label>
            <input type="text" class="form-control" id="fName">
        </div>

        <div class="form-group">
            <label for="fName">First Name:</label>
            <input type="text" class="form-control" id="fName">
        </div>
        <div class="form-group">
            <label for="fName">First Name:</label>
            <input type="text" class="form-control" id="fName">
        </div>
        <div class="form-group">
            <label for="lName">Last Name:</label>
            <input type="text" class="form-control" id="lName">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email">
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="number" class="form-control" id="phone">
        </div>
    </form>
</div>

</body>
</html>
