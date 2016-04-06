@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ $post->created_at->format('m/d/Y') }}
                        <a href="{{ route('posts.edit', $post->id) }}">
                            <span class="glyphicon glyphicon-edit pull-right"></span>
                        </a>
                    </div>
                    <div class="panel-body">

                        {!!  nl2br(\Illuminate\Support\Facades\Crypt::decrypt($post->entry)) !!} </a>

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection