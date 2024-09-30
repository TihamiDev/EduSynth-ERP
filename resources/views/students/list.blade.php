@extends('layouts.app')

@section('content')
    <div class="mx-5">
        <div class="row justify-content-start">
            @include('layouts.left-menu')
            <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
                <div class="row pt-2">
                    <div class="col ps-4">
                        <h3 class="fw-bold mb-3">Student List</h3>
                        <nav class="breadcrumb-card rounded-3" aria-label="breadcrumb">
                            <ol class="breadcrumb mt-4 mx-3">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Student List</li>
                            </ol>
                        </nav>
                        @include('session-messages')
                        <div class="text-end mb-3">
                            <a href="{{ route('student.create.show') }}" class="btn btn-primary"><i class="bi bi-plus"></i>
                                Add Student</a>
                        </div>
                        <div class="card mb-5">
                            <div class="card-header">
                                <h6 class="mt-5">Filter list by:</h6>
                                <div class="mb-4 mt-4">
                                    <form class="row" action="{{ route('student.list.show') }}" method="GET">
                                        <div class="col">
                                            <select onchange="getSections(this);" class="form-select" aria-label="Class"
                                                name="class_id" required>
                                                @isset($school_classes)
                                                    <option selected disabled>Please select a class</option>
                                                    @foreach ($school_classes as $school_class)
                                                        <option value="{{ $school_class->id }}"
                                                            {{ $school_class->id == request()->query('class_id') ? 'selected="selected"' : '' }}>
                                                            {{ $school_class->class_name }}</option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="form-select" id="section-select" aria-label="Section"
                                                name="section_id" required>
                                                <option value="{{ request()->query('section_id') }}">
                                                    {{ request()->query('section_name') }}</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <button type="submit" class="btn btn-primary"><i
                                                    class="bi bi-arrow-counterclockwise"></i> Load List</button>
                                        </div>
                                    </form>
                                    @foreach ($studentList as $student)
                                        @if ($loop->first)
                                            <p class="mt-5"><b>Section:</b> {{ $student->section->section_name }}</p>
                                        @break
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-data bg-white border shadow-sm p-1">
                                <table class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID Card Number</th>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Last Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($studentList as $student)
                                            <tr>
                                                <th scope="row">{{ $student->id_card_number }}</th>
                                                {{-- <td>
                                                    @if (isset($student->student->photo))
                                                        <img src="{{ asset('/storage' . $student->student->photo) }}"
                                                            class="rounded" alt="Profile picture" height="30"
                                                            width="30">
                                                    @else
                                                        <i class="bi bi-person-square"></i>
                                                    @endif
                                                </td> --}}
                                                <td>{{ $student->student->first_name }}</td>
                                                <td>{{ $student->student->last_name }}</td>
                                                <td>{{ $student->student->email }}</td>
                                                <td>{{ $student->student->phone }}</td>
                                                <td>
                                                    <div class="link-group" role="group">
                                                        <div class="dropdown">
                                                            <button class="btn btn-default dropdown-toggle"
                                                                type="button" data-bs-toggle="dropdown"
                                                                aria-expanded="false">
                                                                Actions
                                                            </button>
                                                            <ul class="dropdown-menu" role="menu">
                                                                <li>
                                                                    <a href="{{ route('student.attendance.show', ['id' => $student->student->id]) }}"
                                                                        role="button"
                                                                        class="btn btn-sm btn-subtle dropdown-item"><i
                                                                            class="bi bi-eye"></i> Attendance <i
                                                                            class="bi bi-arrow-right"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a href="{{ url('students/view/profile/' . $student->student->id) }}"
                                                                        role="button"
                                                                        class="btn btn-sm btn-subtle dropdown-item"><i
                                                                            class="bi bi-eye"></i> Profile <i
                                                                            class="bi bi-arrow-right"></i></a>
                                                                </li>
                                                                @can('edit users')
                                                                    <li>
                                                                        <a href="{{ route('student.edit.show', ['id' => $student->student->id]) }}"
                                                                            role="button"
                                                                            class="btn btn-sm btn-subtle dropdown-item"><i
                                                                                class="bi bi-pen"></i> Edit <i
                                                                                class="bi bi-arrow-right"></i></a>

                                                                    </li>
                                                                @endcan
                                                            </ul>
                                                        </div>



                                                        {{-- <button type="button" class="btn btn-sm btn-primary"><i class="bi bi-trash2"></i> Delete</button> --}}
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <p class="mt-3">Total Students: {{ sizeof($studentList) }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
</div>
<script>
    function getSections(obj) {
        var class_id = obj.options[obj.selectedIndex].value;

        var url = "{{ route('get.sections.courses.by.classId') }}?class_id=" + class_id

        fetch(url)
            .then((resp) => resp.json())
            .then(function(data) {
                var sectionSelect = document.getElementById('section-select');
                sectionSelect.options.length = 0;
                data.sections.unshift({
                    'id': 0,
                    'section_name': 'Please select a section'
                })
                data.sections.forEach(function(section, key) {
                    sectionSelect[key] = new Option(section.section_name, section.id);
                });
            })
            .catch(function(error) {
                console.log(error);
            });
    }
</script>
@endsection
