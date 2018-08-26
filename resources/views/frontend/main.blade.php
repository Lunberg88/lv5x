@extends('frontend.index')
@section('title', ' :: Homepage')
@section('og-description', 'Recruiteriia homepage')
@section('body')
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 my-3"></div>
        <section class="section-about">
            <div class="row">
                <div class="col-md-6">
                    <div class="about-xs text-justify text-black pt-2">
                        {!! $frontendService->getSettingsValueByKey('homepage_company_description') !!}
                    </div>
                </div>
                <div class="col-md-6">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <p><b><small>{{ $error }}</small></b></p>
                            @endforeach
                        </div>
                    @endif
                    <div class="card card-cascade narrower mb-r hp-card-form">
                        <form class="hp-form" name="send_message" action="{{route('index.send.msg')}}" method="post">
                            {{ csrf_field() }}
                            <div class="row">
                                @if(!Auth::check())
                                <div class="col-md-6">
                                    <div class="md-form">
                                        <div class="md-form">
                                            <input type="text" name="name" id="contact-name" class="form-control">
                                            <label for="contact-name" class="">Your name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="md-form">
                                        <div class="md-form">
                                            <input type="text" name="email" id="contact-email" class="form-control">
                                            <label for="contact-email" class="">Your email</label>
                                        </div>
                                    </div>
                                </div>
                                @else
                                    <input type="hidden" name="name" value="{{Auth::user()->name}}">
                                    <input type="hidden" name="email" value="{{Auth::user()->email}}">
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="md-form">
                                        <textarea type="text" name="message" id="contact-message" rows="15" class="md-textarea"></textarea>
                                        <label for="contact-message">Your message</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="center-on-small-only">
                                        <button class="btn btn-primary waves-effect waves-light">Send
                                            <i class="fa fa-send ml-2"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-about-graph">
            <h2 id="about" class="text-center h1 my-5 section-title">
                <span class="font-ms">how it works for candidates</span>
            </h2>
            <div class="row">
                <div class="col-md-3">
                    <div class="info info-seo font-ms">
                        <div class="icon icon-circle ">
                            <i class="fa fa-volume-control-phone hp-rec-process ico ico-seo"></i>
                        </div>
                        <h4 class="info-title">first interview</h4>
                        <p class="description">You will have first skype or phone interview with IT Talent Manager. This interview for 10-15 minutes. Basically, this live interview will be focused on getting to know each other better.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="info info-file font-ms">
                        <div class="icon icon-circle">
                            <i class="fa fa-file-code-o hp-rec-process ico ico-file"></i>
                        </div>
                        <h4 class="info-title">technical test</h4>
                        <p class="description">Before or after First interview with IT Talent Manager you will receive Technical Test task from potential Client. Please be ready to have one more Skype interview with a Client before Technical Test.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="info info-skype font-ms">
                        <div class="icon icon-circle">
                            <i class="fa fa-skype hp-rec-process ico ico-skype"></i>
                        </div>
                        <h4 class="info-title">second interview</h4>
                        <p class="description">Second Interview with potential client where you can ask all important information that can help you to you make the right decision to take a job offer or not.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="info info-client font-ms">
                        <div class="icon icon-circle">
                            <i class="fa fa-user-circle hp-rec-process ico ico-client"></i>
                        </div>
                        <h4 class="info-title">job offer</h4>
                        <p class="description">Potential client considered your candidacy and sent you a Job Offer. Onboarding process - (Creating workflows including a series of standard emails and procedural content.)</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-about-graph hiw--client">
            <h2 id="about" class="text-center h1 my-5 section-title">
                <span class="font-ms">how it works for clients</span>
            </h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="icon-box">
                        <div class="info info-seo font-ms">
                            <div class="icon icon-circle ">
                                <i class="fa fa-commenting hp-rec-process ico ico-seo"></i>
                            </div>
                            <h4 class="info-title">talk to recruiteriia</h4>
                            <p class="description">Tell us about the project you would like to complete or the type of developer you are looking to hire. The more you share, the better we can help you find suitable candidates for your inquiry.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="icon-box">
                        <div class="info info-file font-ms">
                            <div class="icon icon-circle">
                                <i class="fa fa-code hp-rec-process ico ico-file"></i>
                            </div>
                            <h4 class="info-title">interview with developers</h4>
                            <p class="description">We will arrange interviews between you and our shortlisted developers. You will get to learn more about their qualifications before making a hiring decision.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="icon-box">
                        <div class="info info-skype font-ms">
                            <div class="icon icon-circle">
                                <i class="fa fa-file-text hp-rec-process ico ico-skype"></i>
                            </div>
                            <h4 class="info-title">job description</h4>
                            <p class="description">If you have JD we just check it. If you haven't JD we will create it. Simple :)</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="icon-box">
                        <div class="info info-client font-ms">
                            <div class="icon icon-circle">
                                <i class="fa fa-search-plus hp-rec-process ico ico-client"></i>
                            </div>
                            <h4 class="info-title">recruitment process</h4>
                            <p class="description">Finding, identifying and selecting suitable candidates for You: screening CVs, mailing, cold calls, warm calls, phone&skype interviews; reporting</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="icon-box">
                        <div class="info info-attach-client font-ms">
                            <div class="icon icon-circle">
                                <i class="fa fa-paperclip hp-rec-process ico ico-attach-client"></i>
                            </div>
                            <h4 class="info-title">cv for review</h4>
                            <p class="description">You will receive several CVs of good potential Candidates for review. If you liked them we schedule skype interview between you and potential candidate.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="icon-box">
                        <div class="info info-tech-test font-ms">
                            <div class="icon icon-circle">
                                <i class="fa fa-file-code-o hp-rec-process ico ico-tech-test"></i>
                            </div>
                            <h4 class="info-title">technical test</h4>
                            <p class="description">Do you have technical test task for candidates?</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="icon-box">
                        <div class="info info-call font-ms">
                            <div class="icon icon-circle">
                                <i class="fa fa-skype hp-rec-process ico ico-call-client"></i>
                            </div>
                            <h4 class="info-title">interview</h4>
                            <p class="description">Skype call with potential candidate before making a final hiring decision</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="icon-box">
                        <div class="info info-offer font-ms">
                            <div class="icon icon-circle">
                                <i class="fa fa-handshake-o hp-rec-process ico ico-offer-client"></i>
                            </div>
                            <h4 class="info-title">job offer</h4>
                            <p class="description">You formally offer a position to a candidate</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="icon-box">
                        <div class="info info-client font-ms">
                            <div class="icon icon-circle">
                                <i class="fa fa-globe hp-rec-process ico ico-client"></i>
                            </div>
                            <h4 class="info-title">onboarding process</h4>
                            <p class="description">Your company's onboarding process is your chance to make a good first impression with new employees!</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12">
            <h2 class="text-center h1 py-5 section-title"><span class="font-ms">new openings</span></h2>
        </div>
        @foreach($openings as $opening)
            <div class="col-12 col-sm-12 col-md-4">
                <div class="card card-cascade narrower mb-r hp-card">
                    <div class="view overlay hm-white-slight">
                        <img src="{{asset('images/openings/'.$opening->img)}}" class="img-fluid hp-img" alt="placeholder image with fruits" width="325" height="180">
                        <a href="{{route('index.show.opening', $opening->slug)}}">
                            <div class="mask waves-effect waves-light"></div>
                        </a>
                    </div>
                    <div class="card-body hp-opening-card">
                        <h7 class="blue-text opening-tags">{{$opening->title}}</h7>
                        <div>
                            <span class="d-block">
                                <small class="float-left">
                                    <i class="fa fa-map-marker"></i> {{str_limit($opening->location, 10)}} <i class="home--opening--seperator"></i><i class="fa fa-dollar"></i>{{$opening->salary ? $opening->salary : ''}} {{$opening->rate ? $opening->rate : ''}}
                                </small>
                                <a uid="opening--link" href="{{route('index.show.opening', $opening->slug)}}" class="btn btn-success waves-effect waves-light btn-sm float-right">View</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection