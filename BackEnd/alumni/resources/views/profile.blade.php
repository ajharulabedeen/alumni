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
                <li><a href="/">About</a></li>
                <li><a href="#">Members</a></li>
                <li class="active"><a href="#">Membership</a></li>
                <li><a href="#">Events</a></li>
            </ul>
        </div>
    </nav>


    <div style="text-align: center">
        <h2>Register</h2>
        <p>Please complete your profile</p>
    </div>

    <form>

        <div class="form-group">
            <h3>
                <button type="button" class="btn btn-info">Batch :<b>1301</b></button>
                <button type="button" class="btn btn-info">ID : <b>130102099</b></button>
                <button type="button" class="btn btn-info">Dept: <b>CSE</b></button>
            </h3>
        </div>


        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email">
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="number" class="form-control" id="phone">
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
            <label>Gender :</label>
            <label class="radio-inline"><input type="radio" name="gender">Male</label>
            <label class="radio-inline"><input type="radio" name="gender">Female</label>
            <label class="radio-inline"><input type="radio" name="gender">Other</label>
        </div>

        <div class="form-group">
            <label>Religion:</label>
            <label class="radio-inline"><input type="radio" name="religion">Islam</label>
            <label class="radio-inline"><input type="radio" name="religion">Hindu</label>
            <label class="radio-inline"><input type="radio" name="religion">Christan</label>
            <label class="radio-inline"><input type="radio" name="religion">Budhist</label>
            <label class="radio-inline"><input type="radio" name="religion" checked>Other</label>
        </div>


        <div class="form-group">
            <label for="dob">Date :</label>
            <input id="dob" type="date" name="dob">
        </div>

        <div class="form-group">
            <label for="blood_group">Blood Group : </label>
            <select id="blood_group" class="option">
                <option value="a_plus">A+</option>
                <option value="b_plus">B+</option>
                <option value="ab_plus">AB+</option>
                <option value="a_negetive">A-</option>
                <option value="b_negetive">B-</option>
                <option value="ab_negetive">AB-</option>
                <option value="o_plus">O+</option>
                <option value="o_negetive">O-</option>
            </select>
        </div>


        <div class="form-group">
            <label for="address_permanent">Address Permanent: </label>
            <textarea class="form-control" rows="3" id="address_permanent">
                    Permanent address.
            </textarea>
        </div>
        <div class="form-group">
            <label for="address_present">Address Present: </label>
            <textarea class="form-control" rows="3" id="address_present">
                    Present address.
            </textarea>
        </div>


        <div class="panel panel-info">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" href="#research_interest">Research Interest</a>
                </h4>
            </div>
            <div id="research_interest" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="form-group">
                        <textarea class="form-control" rows="5" id="research_interest_text_area">
                            Please ur area of research interest and how u want to go for it.
                        </textarea>
                    </div>
                </div>
            </div>
        </div>


        <div class="panel panel-info">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" href="#skills">Skills</a>
                </h4>
            </div>
            <div id="skills" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="form-group">
                        <textarea class="form-control" rows="5" id="skills_text_area">
                            Please ur tell us something about ur skill so that other get benifited from u.
                        </textarea>
                    </div>
                </div>
            </div>
        </div>


        <div class="panel panel-info">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" href="#about">About</a>
                </h4>
            </div>
            <div id="about" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="form-group">
                        <textarea class="form-control" rows="5" id="about_text_area">
                            any kind of information about ur self can be kept here. Which type person u r,
                            any of ur special achivements, plans, dream, Which kind of people u r interested to
                            work with so on.
                        </textarea>
                    </div>
                </div>
            </div>
        </div>


        <div class="panel panel-info">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" href="#work_history">Work History</a>
                </h4>
            </div>
            <div id="work_history" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="form-group">
                        Here user will input there their work history means so far where he has done job so on.
                    </div>
                </div>
            </div>
        </div>


        <div class="panel panel-info">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" href="#education">Education</a>
                </h4>
            </div>
            <div id="education" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="form-group">
                        Here user will input there their work history means so far where he has done job so on.
                    </div>
                </div>
            </div>
        </div>


    </form>
</div>
<!--container-->

</body>
</html>
