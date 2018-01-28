<div class="row">
    <div class="col-sm-12">
        <div class="title-box text-center">
            <h2>LEAVE A MESSAGE</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elitsed ation Lorem ipsum
                <br>dolor sit amet.Veniam quis notru exercit.
            </p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-offset-2 col-md-8 col-md-offset-2">
        <div class="contact-form-box">
            <form name="send_message" action="{{route('index.send.msg')}}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-xs-12">
                        <div id="form-message" class="text-danger text-center"><b></b>
                        </div>
                    </div>
                </div>
                @if(!Auth::check())
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="name" class="form-control" placeholder="Name" required="required">
                    </div>
                    <div class="col-md-6">
                        <input type="email" name="email" class="form-control" placeholder="Email" required="required">
                    </div>
                </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <textarea name="message" class="form-control" placeholder="Your message" required="required">

                        </textarea>
                        <button type="submit" class="button costum-bg contact-submit">Send Message</button>
                        <div class="result"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>