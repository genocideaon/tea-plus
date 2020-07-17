<div class="content-center">
    <footer class="main-footer">

        <p>© COPYRIGHT 2015</p>
        <a id="goTop" href="#" class="go-top">TOP</a>
    </footer>

</div>



<!-- jQuery library (served from Google) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="./js/velocity.min.js"></script>


<script type="text/javascript" src="./js/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
<script type="text/javascript" src="./js/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>


<script>
    $(document).ready(function () {

        $('#goTop').on('click', function(){
            $('body').animate({scrollTop:0}, 'slow');
        });

        $('.fancybox-media').fancybox({
            padding: 0,
            maxWidth	: 800,
            maxHeight	: 600,
            openEffect : 'none',
            closeEffect : 'none',
            prevEffect : 'none',
            nextEffect : 'none',

            arrows : false,
            helpers : {
                media : {},
                buttons : {}
            }
        });

        $('.fancybox').fancybox({
            padding: 0,
        });


        /* menu */
        


        

		$('#mainMenu').on('click','a',function(event){
			event.preventDefault();
			var thisUrl = $(this).attr('href');

			hideMenu();
			changeAnimatePage(thisUrl);


		});


        $('.js-change-page').on('click',function(event){
            event.preventDefault();
            event.stopPropagation();
            var thisUrl = $(this).attr('href');
            changeAnimatePage(thisUrl);


        });

        if($('.home-img-1').length){
            setTimeout(function(){
                $('.home-img-1').css({opacity: 0});
                $('.home-img-2').css({opacity: 0});
            }, 5000)

            slideHome();
        }

        function slideHome(){
            var home1 = $('.home-img-1');
            var home2 = $('.home-img-3');
            var home3 = $('.home-img-2');
            var home4 = $('.home-img-4');
            var myDuratoin = 1000;
            var myDuratoin2 = 1500;

            setInterval(function(){
                var thisTran = home1.css('opacity');

                if(thisTran == 0){
                    slideHome2();
                }else{
                    slideHome1();
                }
            }, 6000);

            function slideHome1(){
                home1.velocity({opacity: 0}, {duration: myDuratoin});
                home2.velocity({opacity: 1}, {duration: myDuratoin, delay: myDuratoin2});
                home3.velocity({opacity: 0}, {duration: myDuratoin});
                home4.velocity({opacity: 1}, {duration: myDuratoin, delay: myDuratoin2});
            }

            function slideHome2(){
                home1.velocity({opacity: 1}, {duration: myDuratoin, delay: myDuratoin2});
                home2.velocity({opacity: 0}, {duration: myDuratoin});
                home3.velocity({opacity: 1}, {duration: myDuratoin, delay: myDuratoin2});
                home4.velocity({opacity: 0}, {duration: myDuratoin});
            }
        }

        function showMenu(){

            var mainMenu = $('#mainMenu');
            var menuDelay = 200;

            mainMenu.css({display: 'block'}).velocity({opacity: 1},{duration: 200});

            mainMenu.find('li').each(function(index){
                $(this).velocity({top: '0', opacity: 1},{duration: 400, delay: menuDelay * index});
            });
        }

        function hideMenu(){

            var mainMenu = $('#mainMenu');
            var menuDelay = 200;

            mainMenu.find('li').each(function(index){
                $(this).velocity({top: '-20px', opacity: 0},{duration: 400, delay: menuDelay * index, complete: function() {
                    $(this).css({top: '20px'});
                }});
            });

            mainMenu.velocity({opacity: 0},{duration: 200, delay: 1200, complete: function() {
                mainMenu.css({display: 'none'});
            }});

        }


        /* animate page */
        setAnimatePage();

        function setAnimatePage(){

            var elemAnimate = $('.elem-animate');

            elemAnimate.each(function(){

                $(this).css({opacity: 0});
                var elemPosition = $(this).css('position');
                var elemTop = $(this).css('top');

                if(elemPosition == 'static') {
                    $(this).css({position: 'relative', top: '20px'});
                }else{

                    if(elemTop == 'auto'){
                        elemTop = 0;
                    }

                    var elemTop2 = parseInt(elemTop) + 20;

                    $(this).css({top: elemTop2});
                }

            });

            $(window).load(function () {
                startAnimatePage();

            });

        }

        function startAnimatePage(){

            $('#fadeContent').css({opacity: 1});

            var elemAnimateStart = $('.elem-animate');

            elemAnimateStart.each(function(index){

                var elemTopStart = $(this).css('top');
                var elemTopStart2 = parseInt(elemTopStart) - 20;
                var elemDelayStart = $(this).data('rate') * 200;

                $(this).velocity({opacity: 1, top: elemTopStart2 }, {duration: 400, delay: elemDelayStart});

            });
        }

        function changeAnimatePage(thisUrl){

            var elemAnimateCh = $('.elem-animate');
            var len = elemAnimateCh.length;
            var nextTo = thisUrl;


            elemAnimateCh.each(function(index){

                var elemTopCh = $(this).css('top');
                var elemTopCh2 = parseInt(elemTopCh) - 20;
                var elemDelayCh = $(this).data('rate') * 400;

                $(this).velocity({opacity: 0, top: elemTopCh2 }, {duration: 400, delay: elemDelayCh});

                if (index == len - 1) {
                    setTimeout(function(){
                        window.location.href = nextTo;
                    }, elemDelayCh + 400);
                }
            });
        }




    });
</script>