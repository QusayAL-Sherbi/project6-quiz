@if ($is_pass == 1)
    <h1>Passed</h1>
    @else
    <h1>Faild</h1>
@endif

<h1>user score : {{ $user_result }} / {{ $total_score }}</h1>

{{-- <table class="table table-borderless  mt-4">
    <thead class="text-white" style="background-color: #404d68">

        <tr>
            <th>Question Number</th>
            <th>Question Text</th>
            <th>Your Answer</th>
            <th>Correct Answer</th>
        </tr>
    </thead>
    <tbody class="mb-3 mt-2" style="color: #404d68; border-bottom:solid 3px #404d68; margin-bottom:5%">

        @foreach ($questions as $question )
        @foreach ($user_answers as $answer )
        @if ($question->id === $answer->question_id)
            <tr>
                <td>{{  $question->question_number  }}</td>
                <td class="text-break">{{  $question->question_text  }}</td>
                @if ( $answer->user_answer === $question->correct_answer )
                    <td style="color: rgb(19, 218, 19); font-weight:600" >{{ $answer->user_answer }}</td>
                    @else
                    <td style="color: rgb(207, 5, 5); font-weight:600" >{{ $answer->user_answer }}</td>
                @endif

                <td >{{  $question->correct_answer }}</td>
            </tr>
        @endif
        @endforeach
        @endforeach

    </tbody>
</table> --}}
