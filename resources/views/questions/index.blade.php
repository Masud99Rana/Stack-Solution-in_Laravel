@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>All Questions</h2>
                        <div class="ml-auto">
                            <a href="{{ route('questions.create') }}" class="btn btn-outline-secondary">Ask Question</a>
                        </div>
                    </div>
                    
                </div>

                <div class="card-body">
                    {{-- @include ('layouts._messages') --}}

                    @forelse ($questions as $question)
                        <div class="media">
                            <div class="d-flex flex-column counters">
                                <div class="vote">
                                    <strong>{{ $question->votes_count }} {{ str_plural('vote', $question->votes_count) }}</strong>
                                </div>
                                <div class="status {{ $question->status }}">
                                    <strong>{{ $question->answers_count }} {{ str_plural('answer', $question->answers_count) }}</strong>
                                </div>
                                <div class="view">
                                    {{ $question->views ." ". str_plural('view', $question->views) }}
                                </div>
                            </div>
                            <div class="media-body">
                                <h3 class="mt-0"><a href="{{ $question->url }}">{{$question->title }}</a></h3>
                                <p class="lead">
                                    Asked by
                                    <a href="{{ $question->user->url }}">{{ $question->user->name }}</a>
                                    <small class="text-muted">{{ $question->created_date }}</small>
                                </p>
                                {{ str_limit($question->body, $limit = 250, $end = '...') }}
                            </div>
                        </div>
                        <hr>
                    @empty
                        <div class="alert alert-warning">
                            <strong>Sorry</strong> There are no questions available.
                        </div>
                    @endforelse

                        {{ $questions->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection