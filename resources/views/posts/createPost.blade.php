@extends('layouts.app')

@section('content')


    <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Entry</div>
                <div class="panel-body">
                    @if(isset($post))
                        {!!  Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT'])  !!}
                    @else
                        {!! Form::open(['route' => 'posts.store']) !!}
                    @endif

                        <div class="form-group">
                            {!! Form::textarea('entry', null, ['cols' => '100', 'rows' => '30']) !!}
                            {{--<textarea name="entry" id="" cols="100" rows="30"></textarea>--}}
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>New Entry
                                </button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection