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
	if ($('[data-toggle="switch"]').length) {
      $('[data-toggle="switch"]').bootstrapSwitch();
    }
});


function show(data, content) {
    var photo ="";
    var intro ="";
    $(content).html('');
    $.each(data,function(k,v){
        photo = '<img src="back/photo/public/'+v.photo+'">';
       /* alert(v.photo);
        if(v.photo !== ""){
            photo = '<img src="back/photo/public/'+v.photo+'">';
        }else {
            intro = '<p>'+v.intro+'</p>';
        }*/
        $(content).append(
            '<div class="col-md-3 photo-out">'+
            '<div class="photo-box">'+
            '<div class="photo-head">'+photo+
            '</div>'+
            '<div class="photo-body">'+
            '<a href="content/'+v.category_id+'/'+v.id+'">'+v.title+'</a>'+//intro+
            '</div>'+
            '<div class="photo-foot">'+
            /*'<button type="button" class="btn btn-default btn-xs" title="赞"><span class="fa fa-thumbs-o-up"></span></button>'+
            '<button type="button" class="btn btn-default btn-xs" title="踩"><span class="fa fa-thumbs-o-down"></span></button>'+
            '<button type="button" class="btn btn-default btn-xs" title="收藏"><span class="fa fa-star-half-empty"></span></button>'+*/
            '<i class="fa fa-calendar-check-o">&nbsp;</i>'+v.created_at+
            '<button type="button" class="btn btn-default btn-xs pull-right" title="点击次数"><span class="fa fa-free-code-camp">&nbsp;'+v.clicks+'点击</span></button>'+
            '</div>'+
            '</div>'+
            '</div>'
        );
    });
}

var html = '没有数据';

$("#index-article-btn ul li:eq(1) a").click(function () {
    //首页最新文章
    $.getJSON('/data/article/8/id',function (data) {
        show(data,"#index-article");
    })
});

$("#index-article-btn ul li:eq(2) a").click(function () {
    //首页高点击文章
    $.getJSON('/data/article/8/clicks',function (data) {
        show(data,"#index-article");
    })
});

$("#index-article-btn ul li:eq(3) a").click(function () {
    //首页高点击文章
    $.getJSON('/data/other/article/8/id',function (data) {
        show(data,"#index-article");
    })
});
//laravel扩展包栏目首页调用

$("#index-cate-btn ul li:eq(1) a").click(function () {
    //首页最新文章
    $.getJSON('/data-cate/2/8/id',function (data) {
        show(data,"#index-cate");
    })
});

$("#index-cate-btn ul li:eq(2) a").click(function () {
    //首页laravel扩展包高点击文章
    $.getJSON('/data-cate/2/8/clicks',function (data) {
        show(data,"#index-cate");
    })
});

$("#index-cate-btn ul li:eq(3) a").click(function () {
    //首页laravel扩展包高点击文章
    $.getJSON('/data-other-cate/2/8/id',function (data) {
        show(data,"#index-cate");
    })
});

//返回顶部
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0; // For Chrome, Safari and Opera
    document.documentElement.scrollTop = 0; // For IE and Firefox
}





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