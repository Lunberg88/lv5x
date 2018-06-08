@extends('frontend.auth')
@section('title', ':: Sign Up')
@section('og-description', 'Sign Up')
@section('content')
<header>
    <section class="view intro-2 hm-stylish-strong">
        <div class="full-bg-img flex-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-12 mx-auto">
                        <div class="card wow fadeIn login-form" data-wow-delay="0.3s">
                            <div class="card-body">
                                <div class="form-header btn-header-info form--register__user">
                                    <h3 class="form--register__title"><i class="fa fa-user-plus mt-2 mb-2"></i> sign up:</h3>
                                </div>
                                <form class="form-horizontal form--register__body" role="form" method="POST" action="{{ url('/register') }}">
                                {{ csrf_field() }}
                                    <div class="md-form row">
                                        <div class="col-md-6">
                                            <i class="fa fa-user prefix white-text"></i>
                                            <input type="text" id="name" name="name" class="form-control{{ $errors->has('name') ? ' validation invalid' : '' }}" value="{{ old('name') }}" required>
                                            <label for="name">First Name/Last Name</label>
                                            @if ($errors->has('name'))
                                                <small class="pull-right">{{ $errors->first('name') }}</small>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <i class="fa fa-envelope prefix white-text"></i>
                                            <input type="email" id="email" name="email" class="form-control{{ $errors->has('email') ? ' validation invalid' : '' }}" value="{{ old('email') }}" required>
                                            <label for="email">Your email</label>
                                            @if ($errors->has('email'))
                                                <small class="pull-right">{{ $errors->first('email') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="md-form row">
                                        <div class="col-md-6">
                                            <select id="stack" class="mdb-select" name="stack" required>
                                                <option disabled="disabled" selected style="color: white !important;">Select your stack</option>
                                                @php
                                                    use App\Traits\CandidatesHelper;
                                                        foreach(CandidatesHelper::showRegisterStack() as $key => $value) {
                                                            echo "<option value=".($key+1).">".$value."</option>";
                                                        }
                                                @endphp
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <i class="fa fa-dollar prefix white-text"></i>
                                            <input type="text" id="salary" name="salary" class="form-control"  required>
                                            <label for="salary">Expected Salary</label>
                                        </div>
                                    </div>
                                    <div class="md-form row">
                                        <div class="col-md-6">
                                            <i class="fa fa-tags prefix white-text"></i>
                                            <input type="text" id="tags" name="tags" class="form-control"  required>
                                            <label for="tags">Skills</label>
                                        </div>
                                        <div class="col-md-6">
                                            <label>(Separate your skills by comma.)</label>
                                        </div>
                                    </div>
                                    <div class="md-form">
                                        <i class="fa fa-link prefix white-text"></i>
                                        <input type="text" id="cv" name="cv" class="form-control"  required>
                                        <label for="cv">Shared CV(Insert link)</label>
                                    </div>
                                    <div class="md-form row">
                                        <div class="col-md-6">
                                            <i class="fa fa-lock prefix white-text"></i>
                                            <input type="password" id="password" name="password" class="form-control{{ $errors->has('password') ? ' validation invalid' : '' }}"  required>
                                            <label for="password">Your password</label>
                                            @if ($errors->has('password'))
                                                <small class="pull-right">{{ $errors->first('password') }}</small>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <i class="fa fa-lock prefix white-text"></i>
                                            <input type="password" id="password_confirm" name="password_confirmation" class="form-control"  required>
                                            <label for="password_confirm">Confirm password</label>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button class="btn btn-info btn-lg">Sign up</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row div col-md-8 col-sm-12 mx-auto">
                    <span class="d-block float-left">
                        <a href="{{url()->previous()}}" class="btn btn-outline-default waves-effect btn-sm">
                            <i class="fa fa-arrow-left"></i>
                            back
                        </a>
                    </span>
                    <span class="d-block float-right">
                        <a href="{{route('login')}}" class="btn btn-outline-info waves-effect btn-sm">
                            <i class="fa fa-lock"></i>
                            login
                        </a>
                    </span>
                </div>
            </div>
        </div>
    </section>
</header>
@endsection

