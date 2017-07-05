<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
{{--视频播放--}}
<script src="//vjs.zencdn.net/4.7/video.js"></script>
{{--图片集资源--}}
<script src="/dist/scripts/chromagallery.pkgd.min.js"></script>
<script src="/dist/js/jquery.material-cards.min.js"></script>


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

</script>
