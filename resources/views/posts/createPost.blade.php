@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create Entry</div>
                    <div class="panel-body">
                        @if(isset($post))
                            {!!  Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT'])  !!}
                        @else
                            {!! Form::open(['route' => 'posts.store']) !!}
                        @endif
                        <div class="form-group">
                            <div class="form-group">
                                {!! Form::label('created_at', 'Date') !!}
                                {!! Form::date('created_at', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
                            </div>

                        </div>

                        <div class="form-group">
                            {!! Form::textarea('entry', null, ['cols' => '100', 'rows' => '30', 'class' => 'entry']) !!}

                            <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
                            <script>
                                CKEDITOR.replace('entry');
                            </script>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>
                                    @if(isset($post))
                                        Edit Entry
                                    @else
                                        Save Entry
                                    @endif
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