@extends('site.layouts.app')
@section('customcss')

@endsection
@section('content')

    <div class="page-container">
        <div class="main-content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header border bottom mb-4">
                        <h4 class="card-title">Edit Phone Info</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('phone-infos.update', ['phone_info' => $phoneInfoData->id]) }}"
                              class="form-horizontal form-label-left" method="post">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-sm-9 offset-sm-1">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="title" class="control-label">Name:</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="name" class="form-control"
                                                   value="{{ $phoneInfoData->name }}">
                                            @if(!empty($errors->get('name')))
                                                <ul class="alert-danger">
                                                    @foreach ($errors->get('name') as $error)
                                                        <li><b>{{ $error }}</b></li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="surname" class="control-label">Surname:</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="surname" class="form-control"
                                                   value="{{ $phoneInfoData->surname }}">
                                            @if(!empty($errors->get('surname')))
                                                <ul class="alert-danger">
                                                    @foreach ($errors->get('surname') as $error)
                                                        <li><b>{{ $error }}</b></li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="phone" class="control-label">Phone:</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="phone" class="form-control"
                                                   value="{{ $phoneInfoData->phone }}">
                                            @if(!empty($errors->get('phone')))
                                                <ul class="alert-danger">
                                                    @foreach ($errors->get('phone') as $error)
                                                        <li><b>{{ $error }}</b></li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="email" class="control-label">Email:</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="email" class="form-control"
                                                   value="{{ $phoneInfoData->email }}">
                                            @if(!empty($errors->get('email')))
                                                <ul class="alert-danger">
                                                    @foreach ($errors->get('email') as $error)
                                                        <li><b>{{ $error }}</b></li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="address" class="control-label">Address:</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="address" class="form-control"
                                                   value="{{ $phoneInfoData->address }}">
                                            @if(!empty($errors->get('address')))
                                                <ul class="alert-danger">
                                                    @foreach ($errors->get('address') as $error)
                                                        <li><b>{{ $error }}</b></li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label for="notes" class="control-label">Notes: </label>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea name="notes" class="form-control"
                                                      id="editor1">{{ $phoneInfoData->notes }}</textarea>
                                            @if(!empty($errors->get('notes')))
                                                <ul class="alert-danger">
                                                    @foreach ($errors->get('notes') as $error)
                                                        <li><b>{{ $error }}</b></li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="text-sm-center">
                                            <button class="btn btn-gradient-success" id="send">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection

@section('customjs')
    <script src="{{ asset('admin-panel/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'advlist autolink link lists charmap print preview',
            toolbar: 'fontselect | undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | table | fontsizeselect',
            font_formats: 'Andale Mono=andale mono,times; Arial=arial,helvetica,sans-serif; Arial Black=arial black,avant garde; Book Antiqua=book antiqua,palatino; Comic Sans MS=comic sans ms,sans-serif; Courier New=courier new,courier; Georgia=georgia,palatino; Helvetica=helvetica; Impact=impact,chicago; Symbol=symbol; Tahoma=tahoma,arial,helvetica,sans-serif; Terminal=terminal,monaco; Times New Roman=times new roman,times; Trebuchet MS=trebuchet ms,geneva; Verdana=verdana,geneva; Webdings=webdings; Wingdings=wingdings,zapf dingbats',
            height: 200
        });
    </script>
@endsection
