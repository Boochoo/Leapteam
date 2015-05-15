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
        <figure id="item1" class="carouselItem trans3d active" data-id="1">
            <div class="carouselItemInner trans3d">
            Oletko vieraillut aiemmin Tekniikan museossa?
            </div>
        </figure>
        <figure id="item2" class="carouselItem trans3d" data-id="2">
            <div class="carouselItemInner trans3d">
                Kuinka kiinnostavia vierailukohteita museot mielestäsi ovat?
            </div>
        </figure>
        <figure id="item3" class="carouselItem trans3d" data-id="3">
            <div class="carouselItemInner trans3d">
                Lisäisivätkö tämän tyyppiset näyttelykohteet kiinnostustasi vierailla museossa?
            </div>
        </figure>
        <figure id="item4" class="carouselItem trans3d" data-id="4">
            <div class="carouselItemInner trans3d">
                Mikä esillä olleista demokohteista oli mielestäsi kiinnostavin?
            </div>
        </figure>
        <figure id="item5" class="carouselItem trans3d" data-id="5">
            <div class="carouselItemInner trans3d">
                Millä tavoin itse tutustuisit mieluiten museonäyttelyyn?
            </div>
        </figure>
        <figure id="item6" class="carouselItem trans3d"><div class="carouselItemInner trans3d">6</div></figure>
        <figure id="item7" class="carouselItem trans3d"><div class="carouselItemInner trans3d">7</div></figure>
        <figure id="item8" class="carouselItem trans3d"><div class="carouselItemInner trans3d">8</div></figure>
        <figure id="item9" class="carouselItem trans3d"><div class="carouselItemInner trans3d">9</div></figure>
    </section>

    <div class="optionContainer">
        <div id="option_1" class="option" data-id="1">En</div>
        <div id="option_2" class="option" data-id="2">Kerran</div>
        <div id="option_3" class="option" data-id="3">Useasti</div>
        <div id="option_4" class="option" data-id="4">En koskaan</div>
    </div>
</div>



<div id="output"></div>
<div id="progress"></div>


<script src="js/lib.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>