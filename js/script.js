// set and cache variables
var w, container, carousel, item, radius, itemLength, angle, ticker, option, optionLength;
var mouseX = 0;
var mouseY = 0;
var mouseZ = 0;
var addX = 0;
var isSwipeLeft = false;
var results = [];

$(document).ready( init );

function init() {
    w = $(window);
    var screenWidth = window.innerWidth;
    var screenHeight = window.innerHeight;
    container = $( '#contentContainer' );
    carousel = $( '#carouselContainer' );
    item = $('.carouselItem');
    itemLength = $('.carouselItem').length;
    option = $(".option");
    optionLength = $( '.option' ).length;

    angle = 360 / itemLength;

    radius = Math.round( (400) / Math.tan( Math.PI / itemLength ) );
    // set container 3d props
    TweenMax.set(container, {perspective:1000});
    TweenMax.set(carousel, { z:-(radius)});

    generateElement();


    // set mouse x and y props and looper ticker
    //window.addEventListener( "mousemove", onMouseMove, false );
    ticker = setInterval( looper, 1000/60 );
    window.addEventListener("click", function() {
        looper();
    });
}


function generateElement(){
    // positioning questions

    for ( var i = 0; i < itemLength; i++ ) {
        var $item = item.eq(i);
        if(i==0)
            $item.addClass('active');

        var $block = $item.find('.carouselItemInner');
        //thanks @chrisgannon!
        TweenMax.set($item, {rotationY:angle * i, z:radius, transformOrigin:"50% 50% " + -radius + "px"});

        animateIn( $item, $block );
    }
    getAnswer();
    //positioning answers

    //for (var j=0; j < optionLength; j++) {
    //    var parentOffset = $('.optionContainer').offset();
    //    var $option = option.eq(j);
    //    var optionRad = 300;
    //
    //    var optionTop = parentOffset.top/2 - optionRad * Math.sin(j*2*Math.PI/optionLength) + 50; // 100
    //    var optionLeft = parentOffset.left/2 - (optionRad+200) * Math.cos(j*2*Math.PI/optionLength) - $option.outerWidth()/2 + 100; // 200
    //    console.log(parentOffset.top, parentOffset.left);
    //    $option.css({top: optionTop,left:optionLeft});
    //}
}


/* Animation for Question */
function animateIn( $item, $block ) {
    var $nrX = 360 * getRandomInt(2);
    var $nrY = 360 * getRandomInt(2);

    var $nx = -(2000) + getRandomInt( 4000 );
    var $ny = -(2000) + getRandomInt( 4000 );
    var $nz = -4000 +  getRandomInt( 4000 );

    var $s = 1.5 + (getRandomInt( 10 ) * .1);
    var $d = 1 - (getRandomInt( 8 ) * .1);

    TweenMax.set( $item, { autoAlpha:1, delay:$d } );
    TweenMax.set( $block, { z:$nz, rotationY:$nrY, rotationX:$nrX, x:$nx, y:$ny, autoAlpha:0} );
    TweenMax.to( $block, $s, { delay:$d, rotationY:0, rotationX:0, z:0,  ease:Expo.easeInOut} );
    TweenMax.to( $block, $s-.5, { delay:$d, x:0, y:0, autoAlpha:1, ease:Expo.easeInOut} );
}

function onMouseMove(event) {
    //mouseX = -(-(window.innerWidth * .5) + event.pageX) * .0025;
    //mouseY = -(-(window.innerHeight * .5) + event.pageY ) * .01;
    //mouseZ = -(radius) - (Math.abs(-(window.innerHeight * .5) + event.pageY ) - 200);
}

// loops and sets the carousel 3d properties
function looper() {
    addX += mouseX;
    TweenMax.to( carousel, 1, { rotationY:addX, rotationX:mouseY, ease:Quint.easeOut } );
    //TweenMax.set( carousel, {z:mouseZ } );
    //output.innerHTML = addX +'-'+ radius;
}

function getRandomInt( $n ) {
    return Math.floor((Math.random()*$n)+1);
}

function nextSlide() {
//        var $active = $('.carouselItem.active');
//        var $next = $('.carouselItem.active').next();
//
//        $active.removeClass('active');
//        $next.addClass('active');
}

function activeSlide() {
    var angleDiff = (addX % 360).toFixed(2);
    //var circleTimes = parseInt(angleDiff / 360);
    var slideIndex = -Math.floor(angleDiff / angle);
    addX = Math.floor(addX/angle + 0.5)*angle;
    //output.innerHTML = slideIndex;

    if(item.eq(slideIndex).hasClass('active') == false) {
        item.removeClass('active');
        item.eq(slideIndex).addClass('active');
        getAnswer();
    }

    //console.log(angleDiff + '-' + slidePos);
}

function onSwipeH(vel) {
    mouseX = vel * .003;
    //output.innerHTML = vel;
}
function onSwipeV(pos) {
    mouseY = (10 - pos*0.05);
}

function onStop(){
    mouseX = 0;
    mouseY = 0;
    activeSlide();
}

function collision(){
    var $clone = $('.clone-item');
    var cLeft = $clone.offset().left;
    var cTop = $clone.offset().top;
    var cWidth = $clone.width();
    var cHeight = $clone.height();
    option.each(function(){
        var oLeft = $(this).offset().left;
        var oTop = $(this).offset().top;
        if(oLeft + $(this).width() > cLeft + 30 && oLeft < cLeft + cWidth
            && oTop + $(this).height() > cTop + 10 && oTop < cTop + cHeight) {
            option.removeClass('selected');
            $(this).addClass('selected');
        } else {
            $(this).removeClass('selected');
        }
    });
}

function getAnswer(){
    var qId= $('.active').data('id');
    $('.option').html('');
    $.get('/leapteam/api/answer/'+qId, function(results){
        if(results){
            for(var i=0 in results){
                $('.option:eq('+i+')').html('<span>'+results[i].aContent+'</span>');
            }
        }
    });
}

function checkButton(screenPosition){
    var handPosLeft = screenPosition.x - 150;
    var handPosTop = window.innerHeight - screenPosition.y - 150;

    if(handPosLeft > submitBtnLeft - 100
        && handPosLeft < submitBtnLeft + 100
        && handPosTop > submitBtntop - 100
        && handPosTop < submitBtntop + 100 ) 
    {

        if($('.submit_btn').hasClass('submitted') == false){
            countHoldingTime++;
            $('.submit_btn').html('<span>'+countHoldingTime+'%</span>');

            if(!$('.submit_btn').hasClass('highlight'))
                $('.submit_btn').addClass('highlight');
            if(countHoldingTime > 100 ) {
                progress.innerHTML = 'Submited';
                //console.log(results);
                $('.submit_btn').addClass('submitted');
                var data= { results : results };

                $.ajax({
                    url: '/leapteam/api/save',
                    data: JSON.stringify(data),
                    type: 'post',
                    dataType: 'json',
                    success: function (res) {
                    }
                });
                $('.thank_dialog').show().animate({opacity: 1},1000);
                countHoldingTime = 0;
                $('.submit_btn').html('<span>Submitted</span>');
            }
        }

    } else if(handPosLeft > resetBtnLeft
        && handPosLeft < resetBtnLeft + 250
        && handPosTop > resetBtnTop - 100
        && handPosTop < resetBtnTop + 100)
    {
        if(!$('.reset_btn').hasClass('highlight'))
            $('.reset_btn').addClass('highlight');
        countHoldingTime++;
        $('.reset_btn').html('<span>'+countHoldingTime+'%</span>');
        if(countHoldingTime > 100)
            location.reload();
    } else if($('.submit_btn').hasClass('submitted')
        && handPosLeft < window.innerWidth / 2 + 400
        && handPosLeft > window.innerWidth / 2 - 400)
    {
        countHoldingTime++;
        if(countHoldingTime > 100)
            location.href = '/leapteam';

    } else {
        countHoldingTime = 0;
        if($('.submit_btn').hasClass('highlight')) {
            $('.submit_btn').removeClass('highlight');
            $('.submit_btn').html('<span>Submit</span>');
        }


        if($('.reset_btn').hasClass('highlight')) {
            $('.reset_btn').removeClass('highlight');
            $('.reset_btn').html('<span>Reset</span>');
        }

    }
    //output.innerHTML = handPosLeft + ' ' + handPosTop;
}

function dropItem() {
    var selectedOpt = $('.option.selected');
    //results[questionId] = answerId;
    //console.log(results);

    if( selectedOpt.length != 0) {
        var questionId = $('.active').data('id');
        var answerId = selectedOpt.data('id');
        results[questionId] = answerId;
        console.log(results);
        $('.active').addClass('done').removeClass('active');
        selectedOpt.removeClass('selected');
        setTimeout(function(){ addX += -angle;}, 300);
        isDropped = true;
    }
}



/********************************************************
 * This is the actual leap motion part
 *****************************************************/
var output = document.getElementById('output'),
    progress = document.getElementById('progress');

var $submitBtn = $('.submit_btn');
var $resetBtn = $('.reset_btn');
var submitBtnLeft = $submitBtn.offset().left;
var submitBtntop = $submitBtn.offset().top;
var resetBtnLeft = $resetBtn.offset().left;
var resetBtnTop = $resetBtn.offset().top;



var slide;
var isGrab = false;
var isDropped = true;
var countHoldingTime = 0;
var controller = new Leap.Controller({
    enableGestures: true,
    frameEventName: 'animationFrame'
}).use('screenPosition', {scale: 1});


controller.setBackground(true);

controller.on('frame', function(frame) {
    if(frame.hands.length > 0) {
        var hand = frame.hands[0];
        //output.innerHTML = hand.grabStrength.toPrecision(2);
        //progress.style.width = hand.grabStrength * 100 + '%';
        //var handStatus = handStateFromHistory(hand, 10);
        var handMesh = frame.hands[0].data('riggedHand.mesh');
        var screenPosition = handMesh.screenPosition(
            hand.stabilizedPalmPosition
        );

        //var stabilized = hand.stabilizedPalmPosition;
        //output.innerHTML = hand.palmVelocity[0].toFixed(2) + ' | ' + hand.palmVelocity[1].toFixed(2);
        //output.innerHTML = screenPosition.x.toFixed(2) + ' | ' + screenPosition.y.toFixed(2);
        //var screenPosition = hand.screenPosition();

        //cursor.style.left = screenPosition[0];
        //cursor.style.top = screenPosition[1] + screenHeight*2;
        //output.innerHTML = screenPosition[0].toFixed(2) + ' | ' + screenPosition[1].toFixed(2);
        //output.innerHTML = hand.palmPosition[0].toFixed(2) + ' - ' + hand.palmPosition[1].toFixed(2) + ' - ' +hand.palmPosition[2].toFixed(2);
        swipeItem(hand);
        onSwipeV(hand.palmPosition[1].toFixed(2));
        //onZoom(hand.palmPosition[2].toFixed(2));
        if(grabItem(hand)) {
            slide = $('.active');
            //.innerHTML = slide.position().left + '-' + slide.position().top;
            if(!isGrab){
                //console.log(slide);
                $('body').append('<div class="clone-item"></div>');
                $('.clone-item').animate({
                    opacity: 1
                }, 500);
                $('.optionContainer').css({opacity: 1, zIndex: 100});
                isGrab = true;
            } else {
                var posLeft = screenPosition.x;
                var posTop = window.innerHeight - (screenPosition.y + 100);
                $('.clone-item').css({left: posLeft, top:posTop});
                collision();
            }
        }

        checkButton(screenPosition);
    }

});

controller.connect();
//    controller.use('playback', {
//        // This is a compressed JSON file of preprecorded frame data
//        recording: 'grab-bones-7-54fps.json.lz',
//        // How long, in ms, between repeating the recording.
//        timeBetweenLoops: 1000,
//        pauseOnHand: true
//    }).on('riggedHand.meshAdded', function(handMesh, leapHand){
//        handMesh.material.opacity = 0.7;
//    });


controller.use('riggedHand', {
    scale: 1,
    positionScale: 4,
    offset: new THREE.Vector3(0,-10,-5),
    boneColors: function (boneMesh, leapHand){
        if ((boneMesh.name.indexOf('Finger_') == 0) ) {
            return {
                hue: 0.3,
                saturation: leapHand.grabStrength,
                lightness: 0.5
            }
        }
    }
});


function grabItem(hand) {
    if(hand.grabStrength > 0.9) {
        isDropped = false;
        return true; // grabbing
    }
    else {
        isGrab = false;
        $('.clone-item').remove();
        if(!isDropped){
            dropItem();
            $('.optionContainer').css({opacity: 0, zIndex: -1});
        }
        return false; // opening
    }
}

function selectItem(hand) {
    if( (hand.palmPosition[0]) ) {
    }
}

function swipeItem(hand) {
    if(!isGrab) {
        if(hand.palmVelocity[0] > 600 || hand.palmVelocity[0] < -600) {
            //output.innerHTML = 'Swipe horizon';
            onSwipeH(hand.palmVelocity[0]);
        } else if (hand.palmVelocity[0] < 40 && hand.palmVelocity[0] > -40) {
            //output.innerHTML = 'stop';
            onStop();
        }
    }
}