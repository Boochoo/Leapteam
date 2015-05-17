<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="js/lib.js"></script>

    <title>Leap Motion Guide Page</title>
    <style>
        html { height: 100%; }
        body{
            background-color:grey;
            min-height: 100%;
            margin:0px;
            padding:0px;
        }
        #handMover{

            padding: 20px; margin-bottom:20px; position:relative; margin-bottom:20px;
            -moz-border-radius-topright: 10px; -webkit-border-top-right-radius: 10px;

        }

        a.mover{
            background: #900;
            padding: 6px 12px;
            position: absolute;
            color: white;
            font-weight: bold;
            text-decoration: none;

        }

        #next_tab{
            position: absolute;
            top: 300px;
            cursor: pointer;
            right: 45px;
            -moz-border-radius-topright: 10px;
            -webkit-border-top-right-radius: 10px;
        }

        #prev_tab{
            position: absolute;
            top: 300px;
            cursor: pointer;
            left: 45px;

            -moz-border-radius-topright: 10px;
            -webkit-border-top-right-radius: 10px;
        }

        h1{
            position:relative;
            text-align:center;
            color:green;
            padding-top:32px;
            font-family:"Lucida Console", Monaco, monospace;
            font:26px;
        }
        video{
            position:relative;
            margin-left:300px;
        }
        #hand_guide{
            margin-left:300px;
        }

        #pageOne{
            background-image: url("images/bg.PNG");

        }




    </style>
    <script type="text/javascript">

        $(document).ready(function() {

            function handLeft() {
                $("#handMover").animate({left: "-=950"}, 2000, "swing", handRight);
            }
            function handRight() {
                $("#handMover").animate({left: "+=950"}, 2000, "swing", handLeft);
            }

            handRight();

            setTimeout(function(){
                location.href = '/leapteam/#pagetwo'
            }, 4000);

            setTimeout(function(){
                location.href = '/leapteam/survey.php';
            }, 16000);
        });
    </script>
</head>

<body>




<!--<a href="#" class="next_tab mover">Next Guide Point =></a>
<a href="#" class="prev_tab mover"><= Previous Guide Point</a>-->



<div data-role="page" id="pageone">
    <div data-role="header">
        <h1>Move your hands from side to side <br/>
            to select questions! </h1>
    </div>

    <div id="handMover" data-role="main" class="ui-content" >

        <img src="images/handWeb.gif" height="500px" alt="hand of your magesty ">
    </div>
<!--    <div id="next_tab" data-role="footer">-->
<!--        <a href="#pagetwo" data-transition="slide">Drag and Drop Page</a>-->
<!--    </div>-->
<!--    <div id="prev_tab" data-role="footer">-->
<!--        <a href="#pageone" data-transition="slide" data-direction="reverse">A Hand Guide</a>-->
<!--    </div>-->

</div>

<div data-role="page" id="pagetwo">
    <div data-role="header">
        <h1>Grab and Drop Questions </h1>
    </div>

    <div id="hand_guide" data-role="main" class="ui-content">
        <!--video width="600" height="600"  controls autoplay>
        <source src="hand_guide_2.mp4" type="video/mp4">
        <source src="hand_guide_2.ogg" type="video/ogg">
        Your browser does not support the video tag.
      </video-->
        <img src="images/hand_guide3.gif" alt="hand of your magesty ">
    </div>

</div>


</body>
</html>
