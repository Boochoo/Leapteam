<!DOCTYPE html>
<html>
<head>
	<title> Admin Panel </title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="bootstrap.css" type="text/css" media="all" />
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="timeago.js"></script>
	<script type="text/javascript" src="script.js"></script>
</head>
<body>
	<h1> Welcome to LeapMotion Team Admin Panel</h1>
  <p>This is designed to add questions to the question library of the Leap applications</p>
  <!-- Wrapper-->
  <div id="wrapper">
    <div class="col-lg-6 well bs-component">
      <!-- Frontpage changing-->
      <h3>Add New Question</h3>
      <form method="POST" action="/dplist" id="frontpage-form" class="form-horizontal">
        <fieldset>
          <div class="form-group">
            <label for="question" class="col-lg-4 control-label">Question</label>
            <div class="col-lg-8">
              <input id="question" name="question" type="text" placeholder="Type new question here" class="form-control" required/>
            </div>
          </div>
          <div class="form-group">
            <label for="answer1" class="col-lg-4 control-label">First Answer</label>
            <div class="col-lg-8">
              <input id="answer1" name="answer1" type="text" placeholder="Type first answer here (compulsory)" class="form-control" required/>
            </div>
          </div>
          <div class="form-group">
            <label for="answer2" class="col-lg-4 control-label">Second Answer</label>
            <div class="col-lg-8">
              <input id="answer2" name="answer2" type="text" placeholder="Type second answer here (compulsory)" class="form-control" required/>
            </div>
          </div>
          <div class="form-group">
            <label for="answer3" class="col-lg-4 control-label">Third answer</label>
            <div class="col-lg-8">
              <input id="answer3" name="answer3" type="text" placeholder="Type third answer here (optional)" class="form-control"/>
            </div>
          </div>
          <div class="form-group">
            <label for="answer4" class="col-lg-4 control-label">Fourth answer</label>
            <div class="col-lg-8">
              <input id="answer4" name="answer4" type="text" placeholder="Type fourth answer here (optional)" class="form-control"/>
            </div>
          </div>
          <div class="form-group">
            <div class="col-lg-4"></div>
            <div class="col-lg-8">
              <input type="submit" id="submit" value="Save" class="btn"/><img src="images/ajaxloader.gif" id="loading"/><img src="images/done.png" id="loadingDone"/>
            </div>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
  <div class="col-lg-6">
    <!-- USER LIST-->
    <h2>Number of questions: <span id="totalUsers"></span></h2>
    <div id="userList">
      <table class="table table-striped table-hover">
        <thead>
          <th> </th>
          <th>Question:</th>
          <th> </th>
        </thead>
        <tbody></tbody>
      </table>
    </div>
    <!-- /USER LIST-->
  </div>
  <!-- /WRAPPER--></h1>
</body>
</html>
