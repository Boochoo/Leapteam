<?php
chdir('.');
error_reporting(E_ERROR | E_PARSE);
//ini_set('display_errors',1);
//ini_set('display_startup_errors',1);
//error_reporting(-1);


include_once 'src/Epi.php';
Epi::setSetting('exceptions', false);
Epi::setPath('base', 'src');
Epi::init('route','database');
EpiDatabase::employ('mysql','leap','localhost','root',''); 

// ***  Get questions and answers
getRoute()->get('/', array('MyClass', 'welcome'));
getRoute()->get('/questions(\/?)', array('MyClass', 'postQuestions'));
getRoute()->post('/questions', array('MyClass', 'postQuestions'));
getRoute()->get('/answer/(\d+)', array('MyClass', 'getTheAnswer'));
getRoute()->get('/delete/(\d+)', array('MyClass', 'deleteQuestion'));

//  *** Handle POST requests like submit an answer or later post new questions

// Save all the answers
getRoute()->post('/save', array('MyClass', 'saveAllAnswers'), true);

// Save each answer
getRoute()->post('/saveAnswer', array('MyClass', 'saveAnswer'), true);

// Save each question
// getRoute()->post('/saveQuestion', array('MyClass', 'saveQuestion'), true);


getRoute()->get('.*',array('MyClass', 'notFound'));

getRoute()->run(); 

/*
 * ******************************************************************************************
 * Define functions and classes which are executed by EpiCode based on the $_['routes'] array
 * ******************************************************************************************
 */
class MyClass
{
  static public function notFound()
  {
	http_response_code(404);
	header('Content-Type: application/json');
        $errors = ["error"=> 404, "message"=>"No data found"];
	 echo json_encode($errors);
  }
  static public function welcome()
  {
  	echo '<h1> Welcome to our API </h1>';
  }

  function postQuestions()
  {
	 header('Content-Type: application/json');
   $questions = getDatabase()->all('SELECT * FROM questions');
	 echo json_encode($questions);
  }

  function error($userId){
	 echo "404 - page not found";
  }
  function getTheAnswer($qId){
    $singleRow = getDatabase()->all('SELECT * FROM answers WHERE qNumber=:id', array(':id' => $qId));
	   header('Content-Type: application/json');
	   echo json_encode($singleRow);	
  }
  function saveAnswer(){
      $data = $_POST;
       if(!array_key_exists('answer1', $data) || !array_key_exists('question', $data) ||!array_key_exists('answer2', $data) ){
          http_response_code(400);
          header('Content-Type: application/json');
          $errors = ["error"=> 400, "message"=>"make sure at least two answers and one question is added"];
          echo json_encode($errors);
          return;
       }else{
          $newQst = $data["question"];
          $newAn1= $data["answer1"];
          $newAn2= $data["answer2"];
          if(array_key_exists('answer3', $data)){
            $newAn3= $data["answer3"];
          }
          if(array_key_exists('answer4', $data)){
            $newAn4= $data["answer4"];
          }
          

          // Get lastest questions
          $lastestQst = getDatabase()->all('select * from questions ORDER  BY qNumber DESC LIMIT 1;');
                
          // Check if there is any user already
          // If there is then add new user 
          if(count($lastestQst)==0){
            $qNumber = 1;
          }else{
            $qNumber = $lastestQst[0]["qNumber"] + 1;
          }

          $addQuestion = getDatabase()->execute('
            INSERT INTO questions(qNumber, qContent) VALUES(:qNumber, :qContent)', 
            array(':qNumber' => $qNumber, ':qContent' => $newQst));

          self::addAnswerToSql($qNumber,1,$newAn1);
          self::addAnswerToSql($qNumber,2,$newAn2);
          if(array_key_exists('answer3', $data)){
            self::addAnswerToSql($qNumber,3,$newAn3);
          }
          if(array_key_exists('answer4', $data)){
            self::addAnswerToSql($qNumber,4,$newAn4);
          }
          
          http_response_code(201);
          header('Content-Type: application/json');
          $errors = ["success"=> 201, "message"=>"success"];
          echo json_encode($errors);
       }
  }
  function addAnswerToSql($qNumber,$aNumber,$aContent){
      if($aContent!= "" || $aContent!= null){
          $addAnswer = getDatabase()->execute('
            INSERT INTO answers(qNumber, aNumber, aContent) VALUES(:qNumber, :aNumber, :aContent)',
            array(':qNumber' => $qNumber,':aNumber' => $aNumber, ':aContent' => $aContent));
      }
  }

  function saveAllAnswers(){
  	$data = json_decode(file_get_contents('php://input'), true);
  	if($data["results"]!=null){
  		//select * from surveys ORDER  BY id DESC LIMIT 1;
      $latestUser = getDatabase()->all('select * from surveys ORDER  BY id DESC LIMIT 1;');
          	
      // Check if there is any user already
      // If there is then add new user 
      if(count($latestUser)==0){
        $userId = 1;
      }else{
        $userId = $latestUser[0]["uId"] + 1;
      }

      foreach ($data["results"] as $qst => $ans) {
          $addUser = getDatabase()->execute('
          INSERT INTO surveys(uId, qId,aId,date) VALUES(:uId, :qId,:aId, NOW())', 
          array(':uId' => $userId, ':qId' => $qst,':aId'=>$ans));
      }
      http_response_code(201);
      header('Content-Type: application/json');
      $errors = ["success"=> 201, "message"=>"success"];
      echo json_encode($errors);

  	}else{
  		http_response_code(400);
      header('Content-Type: application/json');
      $errors = ["error"=> 400, "message"=>"error"];
      echo json_encode($errors);
  	}
  }
  function deleteQuestion($qId){
    // DELETE questions, answers FROM questions INNER JOIN answers 
    // WHERE questions.qNumber=answers.aNumber AND questions.qNumber = 1;
      $addAnswer = getDatabase()->execute('DELETE questions, answers FROM questions INNER JOIN answers
      ON questions.qNumber=answers.aNumber WHERE questions.qNumber =:id', array(':id' => $qId));
      http_response_code(201);
      header('Content-Type: application/json');
      $errors = ["success"=> 201, "message"=>"success"];
      echo json_encode($errors);

  }
  
}
