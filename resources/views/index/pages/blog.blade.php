@extends('index')
@section('title', ':: Blog')
@section('content')
    <section id="home" class="home-2">
        <div class="container">
            @include('index.section.home')
        </div>
    </section>
    <section class="blogs_lists">
        <div class="container">
            @include('index.partials.blog_list')
            <div class="row">
                <div class="col-md-12">
                    {{ $blogs->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection