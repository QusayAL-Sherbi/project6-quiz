@extends('admin.layout.master')
@section('content')

    <body class="animsition">
        <div class="page-wrapper">
            <!-- PAGE CONTAINER-->
            <div class="page-container">
                <!-- MAIN CONTENT-->
                <div class="main-content">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12">

                                    <div class="card">

                                        <!-- add new exam form -->

                                        <div class="card-header">Manage Question</div>
                                        <div class="card-body card-block">
                                            <form action="@if ($is_update == false) {{route('question.store')}} @else {{route('question.update', $question->id)}} @endif" method="post" enctype="multipart/form-data">
                                                @csrf

                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-plus"></i>
                                                        </div>
                                                        <select name="exam_id" class="form-control" >
                                                            @if ($is_update == true)
                                                                 <option value="{{ $question->exam->id }}"  selected>
                                                                   {{ $question->exam->exam_name }} </option>
                                                                   @else
                                                                   <option value="">Select Exam</option>
                                                              @endif
                                                                 @foreach ($exams as $exam  )
                                                                 <option value="{{ $exam->id }}" >
                                                                   {{ $exam->exam_name }} </option>
                                                             @endforeach
                                                         </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-plus"></i>
                                                        </div>
                                                        <input type="number" id="q_number" name="question_number"
                                                            class="form-control" placeholder="Question Number"
                                                            value="@if ($is_update == true) {{ $question->question_number }} @endif">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-plus"></i>
                                                        </div>
                                                        <input type="text" id="question_text" name="question_text"
                                                            class="form-control" placeholder="Question Text"
                                                            value="@if ($is_update == true) {{ $question->question_text }} @endif">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-plus"></i>
                                                        </div>
                                                        <input type="number" id="q_points" name="question_points"
                                                            class="form-control" placeholder="Question POINTs" value="@if ($is_update == true) {{ $question->question_points }} @endif">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-plus"></i>
                                                        </div>
                                                        <input type="text" id="question_option_one" name="option_one"
                                                            class="form-control" placeholder="option one"
                                                            value="@if ($is_update == true) {{ $question->option_one }} @endif">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-plus"></i>
                                                        </div>
                                                        <input type="text" id="question_option_two" name="option_two"
                                                            class="form-control" placeholder="option two"
                                                            value="@if ($is_update == true) {{ $question->option_two }} @endif">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-plus"></i>
                                                        </div>
                                                        <input type="text" id="question_option_three" name="option_three"
                                                            class="form-control" placeholder="option three"
                                                            value="@if ($is_update == true) {{ $question->option_three }} @endif">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-plus"></i>
                                                        </div>
                                                        <input type="text" id="question_option_four" name="option_four"
                                                            class="form-control" placeholder="option four"
                                                            value="@if ($is_update == true) {{ $question->option_four }} @endif">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-plus"></i>
                                                        </div>
                                                        <input type="text" id="correct_answer" name="correct_answer"
                                                            class="form-control" placeholder="Correct Answer"
                                                            value="@if ($is_update == true) {{ $question->correct_answer }} @endif">
                                                    </div>
                                                </div>
                                                <div class="form-actions form-group d-flex justify-content-end">
                                                    @if ($is_update == false)
                                                        <button type="submit" name="add_question" class="btn btn-primary btn-md"
                                                            style="background: #4272d7;">Add Question </button>
                                                    @else
                                                    <button type="submit" name="add_question" class="btn btn-primary btn-md"
                                                    style="background: #4272d7;">Update </button>
                                                    @endif
                                                </div>
                                            </form>
                                        </div>
                                    </div>


                                    <!-- DATA TABLE-->
                                    <div class="table-responsive m-b-40">
                                        <table class="table table-borderless table-data3">
                                            <thead>
                                                <tr>
                                                    <th>Question ID</th>
                                                    <th>Question Number</th>
                                                    <th>Question Text</th>
                                                    <th>Question Points</th>
                                                    <th>Option One</th>
                                                    <th>Option Two</th>
                                                    <th>Option Three</th>
                                                    <th>Option Four</th>
                                                    <th>Correct Answer</th>
                                                    <th>Exam Title</th>
                                                    <th></th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($questions as $question)
                                                <tr>
                                                    <td>{{ $question->id }}</td>
                                                    <td>{{ $question->question_number }}</td>
                                                    <td>{{ $question->question_text }}</td>
                                                    <td>{{ $question->question_ponits }}</td>
                                                    <td>
                                                        <ul>
                                                            <li>{{ $question->option_one }}</li>
                                                            <li>{{ $question->option_two }}</li>
                                                            <li>{{ $question->option_three }}</li>
                                                            <li>{{ $question->option_four }}</li>
                                                        </ul>
                                                    </td>
                                                    <td>{{ $question->correct_answer }}</td>
                                                    <td>{{ $question->exam->exam_name }}</td>

                                                    <td>
                                                        <div class="table-data-feature d-flex justify-content-end">
                                                            <a href="{{ route('question.edit', $question->id) }}"> <button
                                                                    class="item btn btn-success" data-toggle="tooltip"
                                                                    data-placement="top" title="Edit">
                                                                    <i class="zmdi zmdi-edit"></i></a>
                                                            </button>
                                                            <a href="{{ route('question.delete', $question->id) }}"> <button
                                                                    class="item btn btn-danger" data-toggle="tooltip"
                                                                    data-placement="top" title="Delete">
                                                                    <i class="zmdi zmdi-delete"></i></a>
                                                            </button>

                                                        </div>
                                                    </td>

                                                </tr>
                                                @endforeach
                                            </tbody>

                                        </table>
                                    </div>
                                    <!-- END DATA TABLE-->
                                </div>
                            </div>
                        </div>
                    </div>
                @endsection
