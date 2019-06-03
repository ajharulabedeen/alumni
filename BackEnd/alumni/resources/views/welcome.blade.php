<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    {{--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"--}}
    {{--integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>
<body>


<div class="container">
    <!-- Start header : =======+==================================================== -->
    <div class="row page-header">
        <div class="col-sm-4">
            <img src="img/gaacse.png" width="300"/>
        </div>
        <div class="col-sm-8">
            <h1 style="color : green">Green University</h1>
            <h2 style="color : skyblue">Department of Computer Science and Engineering</h2>
        </div>
    </div>


    <nav class="navbar navbar-default" style="background-color : skyblue">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">About</a></li>
                <li><a href="#">Members</a></li>
                <li><a href="/register">Membership</a></li>
                <li><a href="#">Events</a></li>
            </ul>
        </div>
    </nav>


    {{--dont know why the page-body used--}}
    {{--<div class="row page-body">--}}
    <div class="row">
        <div class="col-sm-8 " style="background-color: #fffacc">
            <h1>About</h1>

            <div class="panel-group">

                {{--------------------------------------- Vision  ---------------------------------------}}
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#vision">Vision</a>
                        </h4>
                    </div>
                    <div id="vision" class="panel-collapse collapse">
                        <div class="panel-body">
                            The GUB Alumni association will be dynamic, member-focused organization, driven by core
                            values and directed
                            towards supporting the social, intellectual, and spiritual needs of all present future
                            alumni of the
                            university.
                        </div>
                    </div>
                </div>
                {{--------------------------------------- Mission ---------------------------------------}}
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#mission">Mission</a>
                        </h4>
                    </div>
                    <div id="mission" class="panel-collapse collapse">
                        <div class="panel-body">
                            The mission of Alumni Association of Green University of Bangladesh (AAGUB) is to create a
                            lifelong GUB
                            community of alumni through increased opportunity for meaningful engagement in order to
                            increase awareness,
                            pride, participation, volunteer involvement, and philanthropic commitment to Green
                            University of Bangladesh.
                        </div>
                    </div>
                </div>
                {{--------------------------------------- Objective ---------------------------------------}}
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#objective">objective </a>
                        </h4>
                    </div>
                    <div id="objective" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul class="list-group">
                                <li class="list-group-item">To build the Association as a true professional
                                    organization.
                                </li>
                                <li class="list-group-item">To contribute to the development activities in the
                                    country.
                                </li>
                                <li class="list-group-item">To hold seminar, symposium, workshop, debate and discussion
                                    on matters of various
                                    professional activities.
                                </li>
                                <li class="list-group-item">To build up relationship among the members of the
                                    Association through cultural,
                                    social and welfare programs.
                                </li>
                                <li class="list-group-item">To arrange training program for existing and new Alumni.
                                </li>
                                <li class="list-group-item">To look after welfare of the members of the Association.
                                </li>
                                <li class="list-group-item">To highlight the problems and prospects of the
                                    professionals, modern
                                    concepts, etc. through different media journal publication etc.
                                </li>
                                <li class="list-group-item">To establish a center for research on various job fields and
                                    training of various
                                    professionals.
                                </li>
                                <li class="list-group-item">To make liaison with other Associations in home and abroad
                                    exchange
                                    views and ideas, take up various projects jointly and arrange exchange programs
                                    between various organizations in home and abroad.
                                </li>
                                <li class="list-group-item">To unite the members of the Association in the bonds of
                                    friendship, fellowship and
                                    mutual understanding through arranging reunion, picnic, tour, sports etc.
                                </li>
                                <li class="list-group-item">To encourage efficiency and promote high ethical standard in
                                    profession.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


            </div>
            {{--panel group--}}


            <h2></h2>


            <h2></h2>

            <p>
                Alumni Association of GUB
                The Alumni Association functions as an organization through which its members interact amongst
                themselves, as well as with their Alma Mater. In order to participate in various activities of the
                Association, a GUB graduate needs to be a member of Alumni Association of Green University of Bangladesh
                (AAGUB). AAGUB Membership Card may be obtained by providing the following:

                Copy of National ID card
                Copy of degree/provisional certificate
                Two recent photographs (PP Size)
                BDT. 500/- per year
            </p>
        </div>

        <div class="col-sm-4" style="background-color : khaki">
            <h3>Recent Activity</h3>
            <div class="well">Event JUNE-19 : Workshop on Android development sponsered by SAKIB AL HASAN</div>
            <div class="well">Iffter Mahffil 2019</div>
            <div class="well">Workshop on Android Development.</div>
            <div class="well">Interdeparment programing contest.</div>
            <div class="well">Interdeparment programing contest 2018.</div>
        </div>
    </div>
    <!-- class-row : body -->


</div>

<footer  class="footer">
    <div style="text-align: center ">
        <h3 class="h3"  >
            <span class="label label-info " >Powered by :  99</span>
        </h3>
    </div>
</footer>
<!-- container -->
</body>
</html>
