@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <table class="table table-condensed table-hover">
                    @foreach($posts as $post)
                        <tr>
{{--                            <td>{{ $post->entry }}</td>--}}
                            <td><a href="{{ route('posts.show', $post->id) }}">{!!  nl2br(\Illuminate\Support\Str::limit(\Illuminate\Support\Facades\Crypt::decrypt($post->entry),200)) !!} </a></td>
                            <td>{{ $post->created_at->format('m/d/Y') }}</td>

                        </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </div>

@endsection