@php
 $rnd  = [
    'http://blog.debugme.eu/wp-content/uploads/2016/03/35c738d7-bdf0-4f29-8408-84fbf86a7ae2-1024x576.png',
    'http://www.differencebetween.info/sites/default/files/images/6/project-manager.jpg',
    'https://22xmcq37bnw82iclyj35wony-wpengine.netdna-ssl.com/wp-content/uploads/2014/09/great-sales-manager-688x368.jpg',
    ];
@endphp
@foreach($openings as $open)
<div class="col-xs-12 col-sm-4">
    <div class="blog-box effect">
        <img src="@php echo $rnd[rand(0,2)]; @endphp" alt="blog-1">
        <div class="blog-box-content">
            <p class="blog-date">
                <i class="fa fa-calendar costum-color"></i> 25 April 2017
            </p>
            <h4 class="effect">
                <a href="#">{{$open->title}}</a>
            </h4>
            <p>{{$open->description}}</p>
            <a href="#" class="button costum-bg" data-toggle="modal" data-target="#myModal-{{$open->id}}">Read more</a>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal-{{$open->id}}" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><a href="#">{{$open->title}}</a></h4>
            </div>
            <div class="modal-body">
                <div class="blog-box">
                    <div class="blog-box-content">
                        <h4 class="effect">
                            {{$open->title}}
                        </h4>
                        <p>{{$open->description}}</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
@endforeach
