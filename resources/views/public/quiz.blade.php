<form action="{{ route('result', $exam->id) }}" method="POST">
    @csrf
    @foreach ($questions as $question)
        @if ($question->exam_id == $exam->id)
            <h1>{{ $question->question_number }}</h1>
            <h1>{{ $question->question_text }}</h1>
            <h1>{{ $question->question_points }}</h1>
            <div>
                <input type="radio" name="{{ $question->id }}" value="{{ $question->option_one }}"><span>{{$question->option_one}}</span>
                <input type="radio" name="{{ $question->id }}" value="{{ $question->option_two }}"><span>{{$question->option_two}}</span>
                <input type="radio" name="{{ $question->id }}" value="{{ $question->option_three }}"><span>{{$question->option_three}}</span>
                <input type="radio" name="{{ $question->id }}" value="{{ $question->option_four }}"><span>{{$question->option_four}}</span>
            </div>
        @endif
    @endforeach
    <input type="hidden" name="user_id" value="2">
    <input type="submit" value="Finish">
</form>
