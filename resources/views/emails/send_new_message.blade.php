<div>
    <p>您关注的Blue 个人博客有新文章发布了</p>
    <p><a href="{{ url('https://www.blueeye.cc/content/'.$article->category_id.'/'.$article->id) }}">{{ $article->title }}</a></p>
    <p>退订,请<a href="{{ url('https://www.blueeye.cc/user/message') }}">点击此处</a></p>
</div>