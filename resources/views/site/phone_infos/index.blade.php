@extends('site.layouts.app')
@section('content')
    @push('css')
        <link href="{{ asset('admin-panel/css/sweet-alert.css') }}" rel="stylesheet">
    @endpush
    <!-- Content Wrapper START -->
    <div class="page-container">
        <div class="main-content">
            <div class="container-fluid">
                <div class="page-header">
                    <h2 class="header-title">Phone Infos</h2>
                    <div class="app header-success-gradient">
                        <div class="layout">
                            <div class="header navbar no-fixed">
                                <div class="header-container">
                                    <ul class="nav-left">
                                        <li class="search-box">
                                            <a class="search-toggle" href="javascript:void(0);">
                                                <i class="search-icon mdi mdi-magnify"></i>
                                                <i class="search-icon-close mdi mdi-close-circle-outline"></i>
                                            </a>
                                        </li>
                                        <li class="search-input">
                                            <form method="get" action="{{ route('phone-infos.index') }}">
                                                <label for="name">
                                                    <input class="form-control" type="text" name="name"
                                                           placeholder="Name, Surname"
                                                           value="{{ request('name') ?? old('name')  }}">
                                                </label>
                                                <label for="phone">
                                                    <input class="form-control" type="text" name="phone"
                                                           placeholder="Phone"
                                                           value="{{ request('phone') ?? old('phone')  }}">
                                                </label>
                                                <label for="address">
                                                    <input class="form-control" type="text" name="address"
                                                           placeholder="Address"
                                                           value="{{ request('address') ?? old('address')  }}">
                                                </label>
                                                <label for="email">
                                                    <input class="form-control" type="text" name="email"
                                                           placeholder="Email"
                                                           value="{{ request('email') ?? old('email')  }}">
                                                </label>
                                                <button class="btn btn-default d-none" type="submit"></button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <a href="{{ route('phone-infos.create') }}" class="btn btn-success"><i
                                class="fa fa-plus"></i><b>
                                Əlavə et</b></a>
                    </div>
                    <div class="col-md-2">
                        <button type="button" onclick="deletePhoneInfos();" class="btn btn-danger text-white"><i
                                class="fa fa-trash"></i> Seçilmişləri Sil
                        </button>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>
                                    <div class="col-md-9 checkbox">
                                        <input type="checkbox" id="options" name="checkbox" class="form-control">
                                        <label for="options"></label>
                                    </div>
                                </th>
                                <th scope="col">#</th>
                                <th scope="col">
                                    Name
                                    <a href="{{ request()->fullUrlWithQuery(['cache' => 'forget', 'sortBy' => 'name', 'sort' => request()->get('sort') =='asc' ? 'desc' : 'asc']) }}">
                                        <i class="fa fa-sort-alpha-asc"></i>
                                    </a>
                                </th>
                                <th scope="col">
                                    Surname
                                    <a href="{{ request()->fullUrlWithQuery(['cache' => 'forget', 'sortBy' => 'surname', 'sort' => request()->get('sort') =='asc' ? 'desc' : 'asc']) }}">
                                        <i class="fa fa-sort-alpha-asc"></i>
                                    </a>
                                </th>
                                <th scope="col">
                                    Əlaqə nömrəsi
                                    <a href="{{ request()->fullUrlWithQuery(['cache' => 'forget', 'sortBy' => 'phone', 'sort' => request()->get('sort') =='asc' ? 'desc' : 'asc']) }}">
                                        <i class="fa fa-sort-alpha-asc"></i>
                                    </a>
                                </th>
                                <th scope="col">
                                    Ünvan
                                    <a href="{{ request()->fullUrlWithQuery(['cache' => 'forget', 'sortBy' => 'address', 'sort' => request()->get('sort') =='asc' ? 'desc' : 'asc']) }}">
                                        <i class="fa fa-sort-alpha-asc"></i>
                                    </a>
                                </th>
                                <th scope="col">
                                    Email
                                    <a href="{{ request()->fullUrlWithQuery(['cache' => 'forget', 'sortBy' => 'email', 'sort' => request()->get('sort') =='asc' ? 'desc' : 'asc']) }}">
                                        <i class="fa fa-sort-alpha-asc"></i>
                                    </a>
                                </th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($phoneInfoData)
                                @foreach($phoneInfoData as $key => $data)
                                    <tr id="tr_{{$data->id}}">
                                        <td>
                                            <div class="col-md-9 checkbox">
                                                <input type="checkbox" id="c_{{$data->id}}"
                                                       class="form-control checkBoxes" value="{{$data->id}}">
                                                <label for="c_{{$data->id}}"></label>
                                            </div>
                                        </td>
                                        <th scope="row">{{ (($phoneInfoData->perPage() * $phoneInfoData->currentPage()) - $phoneInfoData->perPage()) + ($loop->index + 1) }}</th>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->surname }}</td>
                                        <td>{{ $data->phone }}</td>
                                        <td>{{ $data->address }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td><a href="{{ route('phone-infos.edit', $data->id) }}"><i
                                                    class="fa fa-eye"></i></a>
                                            <form method="post" id="data-item-form{{ $data->id }}"
                                                  action="{{ route('phone-infos.destroy', ['phone_info' => $data->id]) }}">
                                                @method('DELETE')
                                                @csrf
                                                <div class="form-group">
                                                    <a href="javascript:void(0)"
                                                       onclick="removeItem({{ $data->id }})"><i
                                                            class="fa fa-trash"></i></a>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            @endif

                            </tbody>
                        </table>

                        <div class="row">
                            <div>
                                {{ $phoneInfoData->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Wrapper END -->

@endsection


@push('js')
    <script src="{{ asset('admin-panel/js/sweet-alert.js') }}"></script>
    <script>
        $(document).ready(function () {
            $("#options").click(function () {
                if (this.checked) {
                    $(".checkBoxes").each(function () {
                        this.checked = true;
                    });
                } else {
                    $(".checkBoxes").each(function () {
                        this.checked = false;
                    });
                }
            })
        })

        function deletePhoneInfos() {
            let phone_infos = [];
            $(".checkBoxes").each(function () {
                if (this.checked) {
                    let phone_info_id = $(this).val();
                    phone_infos.push(phone_info_id);
                }
            });

            if (phone_infos.length === 0) {
                alert("Zəhmət olmasa seçin");
            } else {
                if (confirm('Silinsin?')) {
                    $.ajax({
                        url: '{{ url('bulk-delete')}}',
                        method: 'POST',
                        data: {
                            s_id: phone_infos,
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function () {
                            location.reload();
                        }
                    });
                }
            }
        }
    </script>
    <script>
        function removeItem($id) {
            swal({
                    title: "Silinsin",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Bəli",
                    cancelButtonText: "Xeyr",
                    allowOutsideClick: true
                },
                function (isConfirm) {
                    if (isConfirm) {
                        $('#data-item-form' + $id).submit();
                    }
                });
        }
    </script>
@endpush
