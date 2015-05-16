<html lang="en">
<head>
    <meta charset="utf-8" />
    <!-- disable zooming -->
    <meta name="viewport" content="initial-scale=1.0, user-scalable=0" />

    <title>Leap Motion Example</title>
    <link rel="stylesheet prefetch" href="css/style.css">

    <script src="js/three.js"></script>
    <script src="js/leap.min.js"></script>
    <script src="js/leap-plugin.js"></script>
    <script src="js/leap.rigged-hand.js"></script>

</head>
<body>

<div id="contentContainer" class="trans3d">
    <section id="carouselContainer" class="trans3d">
    <?php
    $questions = json_decode(file_get_contents('http://localhost/leapteam/api/questions'));
    //var_dump($questions);
    if($questions) {
        foreach($questions as $key => $val) {
            $question = '<figure id="item'.($key+1) .'" class="carouselItem trans3d" data-id="'.$val->qNumber.'">'.
            '<div class="carouselItemInner trans3d">'.
                $val->qContent.
            '</div>'.
            '</figure>';
            echo $question;
        }
    }
    ?>
    </section>

    <div class="optionContainer">
        <div id="option_1" class="option" data-id="1"></div>
        <div id="option_2" class="option" data-id="2"></div>
        <div id="option_3" class="option" data-id="3"></div>
        <div id="option_4" class="option" data-id="4"></div>
    </div>
</div>

<div class="btn-corner submit_btn"></div>
<div class="btn-corner reset_btn"></div>



<div id="output"></div>
<div id="progress"></div>


<script src="js/lib.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>