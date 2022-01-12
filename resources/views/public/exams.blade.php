@extends('public.layout.master')

@section('content')
    <h1>Exams Page</h1>
    {{-- Fetch All Exams --}}
    @foreach ($exams as $exam)
        <div class="card" style="width: 18rem;">
            <img src="{{ asset($exam->exam_image) }}" class="card-img-top" alt="Exam Image">
            <div class="card-body">
            <h5 class="card-title">{{ $exam->exam_name }}</h5>
            <p class="card-text">{{ $exam->exam_number_of_question }}</p>
            <a href="{{ route('single_exam', $exam->id) }}" class="btn btn-primary">Start Exam</a>
            </div>
        </div>
    @endforeach
@endsection
