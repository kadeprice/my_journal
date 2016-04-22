@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <table class="table table-condensed table-hover">
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->created_at->format('m/d/Y') }}</td>
                            <td><a href="{{ route('posts.show', $post->id) }}">{!!  \Illuminate\Support\Str::limit(\Illuminate\Support\Facades\Crypt::decrypt($post->entry),200) !!} </a></td>

                        </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </div>

@endsection