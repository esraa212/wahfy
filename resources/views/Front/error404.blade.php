@extends('Front.layout.master')
@section('content')
<div class="ps-page--404 mt-5 mb-5">
        <div class="container">
            <div class="ps-section__content"><img src="{{url('front/img/404.jpg')}}" alt="">
                <h3>ohh! page not found</h3>
                <p>It seems we can't find what you're looking for. Perhaps searching can help or go back to<a href="{{route('front.home')}}"> Homepage</a></p>
                <form class="ps-form--widget-search" action="http://nouthemes.net/html/martfury/do_action" method="get">
                    <input class="form-control" type="text" placeholder="Search...">
                    <button><i class="icon-magnifier"></i></button>
                </form>
            </div>
        </div>
    </div>
    @endsection