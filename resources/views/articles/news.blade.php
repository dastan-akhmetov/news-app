@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">News</div>
                <style>

                .news {
                    list-style: none;
                }

                .image {
                    float: left;
                    margin-right: 10px;
                    margin-bottom: 10px;
                    width: 400px;
                    height: auto;
                }

                .image img {
                    width: 100%;
                    height: 100%;
                }

                .author-date {
                    clear: both;
                    margin-top: 20px;
                    font-weight: bold;
                    font-size: 11px;
                }



                </style>
                <div class="panel-body">
                    <div>
                        <ul class="news">
                        @foreach($news as $article)
                            <li>
                                <div class="title">
                                    <h4>{{ $article->title }}</h4>
                                </div>

                                <div class="image">
                                    <img src="{{ $article->photo_url }}" alt="">
                                </div>
                                {{ $article->body }}

                                <div class="author-date">
                                    <p>Author: {{ $article->name }}</p>
                                    <p>Date: {{ $article->created_at }}</p>
                                </div>

                            </li>
                        @endforeach
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection