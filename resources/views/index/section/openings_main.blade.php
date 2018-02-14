<div class="row">
    @foreach($openings as $open)
        <div class="col-xs-12 col-md-4">
            <div class="blog-box effect">
                <img src="http://blog.debugme.eu/wp-content/uploads/2016/03/35c738d7-bdf0-4f29-8408-84fbf86a7ae2-1024x576.png" alt="blog-1">
                <div class="blog-box-content">
                    <p class="blog-date">
                        <i class="fa fa-calendar costum-color"></i> 25 April 2017
                    </p>
                    <h4 class="effect">
                        <a href="{{route('index.openings')}}">{!! str_limit($open->title, 30) !!}</a>
                    </h4>
                    <p>{!! str_limit($open->description, 100) !!}</p>
                    <a href="{{route('index.openings')}}" class="button costum-bg">Read more</a>
                </div>
            </div>
        </div>
    @endforeach
</div>