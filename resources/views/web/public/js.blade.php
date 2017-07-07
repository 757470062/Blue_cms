<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
{{--视频播放--}}
<script src="//vjs.zencdn.net/4.7/video.js"></script>
{{--图片集资源--}}
<script src="/dist/scripts/chromagallery.pkgd.min.js"></script>
<script src="/dist/js/jquery.material-cards.min.js"></script>
{{--首页banner--}}
<script type="text/javascript" src="/dist/js/jquery.terseBanner.min.js"></script>
{{--瀑布流--}}
<script src="/dist/js/bootstrap-waterfall.js"></script>

<script>
    $('.grid').masonry({
        // options
        itemSelector: '.grid-item'
    });
    $(document).ready(function(){
        $(".mygallery").chromaGallery
        ({
            color:'#000',
            gridMargin:15,
            maxColumns:5,
            dof:true,
            screenOpacity:0.8
        });

        $('.material-card').materialCard({
            icon_close: 'fa-chevron-left',
            icon_open: 'fa-thumbs-o-up',
            icon_spin: 'fa-spin-fast',
            card_activator: 'click'
        });
//        $('.active-with-click .material-card').materialCard();
        window.setTimeout(function() {
            $('.material-card:eq(1)').materialCard('open');
        }, 2000);
        $('.material-card').on('shown.material-card show.material-card hide.material-card hidden.material-card', function (event) {
            console.log(event.type, event.namespace, $(this));
        });

    });

    // 自适应banner
    $('#adaptive').terseBanner({ adaptive: true });
    var minWidth = 560,
        maxWidth = 960,
        step = 100;

    $('.adaptive .scale a').click(function() {
        var bannerWidth = $(this).hasClass('larger') ? Math.min(maxWidth, $('#adaptive').width() + step) :
            Math.max(minWidth, $('#adaptive').width() - step);

        $('#adaptive').stop(true, false).animate({ width: bannerWidth }, 300);
    });

    var newWindowHtml =
        '<!DOCTYPE html>' +
        '<html>' +
        '<head>' +
        '<title>terseBanner - 宽屏自适应演示</title>' +
        '<link rel="stylesheet" type="text/css" href="css/style.css">' +
        '<style>p{margin: 10px 0 0 10px;font-weight: bold;font-size: 14px;color: #333;}</style>' +
        '</head>' +
        '<body>' +
        '<div class="widescreen">' +
        '<ul>' +
        '<li><img src="img/1.png"></li>' +
        '<li><img src="img/2.png"></li>' +
        '<li><img src="img/3.png"></li>' +
        '<li><img src="img/4.png"></li>' +
        '</ul>' +
        '</div>' +
        '<p>改变窗口的宽度可以查看自适应的效果</p>' +
        '</body>' +
        '<script type="text/javascript" src="http://www.jq22.com/jquery/jquery-1.10.2.js"><' + '/script>' +
        '<script type="text/javascript" src="dist/jquery.terseBanner.min.js"><' + '/script>' +
        '<script>' +
        'setTimeout(function() {' +
        '$(".widescreen").terseBanner({' +
        'adaptive: true,' +
        'arrow: true' +
        '});' +
        '}, 50);' +
        '<' + '/script>' +
        '</html>';

    $('.adaptive .widescreen').click(function() {
        var windowWidth = window.screen.width - 20 - 100,
            windowHeight = windowWidth / 1920 * 800 + 50;

        var newWindow = window.open('', '', 'width=' + windowWidth + ', height=' + windowHeight +
            ', top=120, left=50, location=no, menubar=no, toolbar=no, status=no, directories=no');

        newWindow.document.write(newWindowHtml);
    });
    /* banner end */

    /* 瀑布流 */
    $('.waterfall')
        .data('bootstrap-waterfall-template', $('#waterfall-template').html())
        .waterfall();

</script>
