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

                                        <div class="card-header">Manage Exam</div>
                                        <div class="card-body card-block">
                                            <form action="{{route('exam.store')}}" method="post" enctype="multipart/form-data">
                                                @csrf

                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-plus"></i>
                                                        </div>
                                                        <input type="text" id="exam_title" name="exam_name"
                                                            class="form-control" placeholder="exam title"
                                                            value="">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-plus"></i>
                                                        </div>
                                                        <input type="file" id="exam_image" name="exam_image"
                                                            class="form-control" placeholder="exam_image" value="">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-plus"></i>
                                                        </div>
                                                        <input type="number" id="exam_questions" name="exam_number_of_questions"
                                                            class="form-control" placeholder="number of questions"
                                                            value="">
                                                    </div>
                                                </div>
                                                <div class="form-actions form-group d-flex justify-content-end">
                                                        <button type="submit" name="add_exam" class="btn btn-primary btn-md"
                                                            style="background: #4272d7;">Add Exam </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>


                                    <!-- DATA TABLE-->
                                    <div class="table-responsive m-b-40">
                                        <table class="table table-borderless table-data3">
                                            <thead>
                                                <tr>
                                                    <th>Exam ID</th>
                                                    <th>Exam Image</th>
                                                    <th>Exam Title</th>
                                                    <th>Number of Qustions</th>
                                                    <th></th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($exams as $exam)
                                                <tr>
                                                    <td>{{ $exam->id }}</td>
                                                    <td>
                                                        <img src="{{ asset($exam->exam_image) }}" alt="Exam Image">
                                                    </td>
                                                    <td>{{ $exam->exam_name }}</td>
                                                    <td>{{ $exam->exam_number_of_questions }}</td>

                                                    <td>
                                                        <div class="table-data-feature d-flex justify-content-end">
                                                            <a href=""> <button
                                                                    class="item btn btn-success" data-toggle="tooltip"
                                                                    data-placement="top" title="Edit">
                                                                    <i class="zmdi zmdi-edit"></i></a>
                                                            </button>
                                                            <a href="{{ route('question_delete', $exam->id) }}"> <button
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
