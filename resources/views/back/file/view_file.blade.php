@extends('layouts.back.master')
@section('content')

<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>File and Group List
                        <small>Task Name: Create Read Update Delete Operation</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item active">File and Group List</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>View File and Group List</h5>
        </div>
        <div class="card-body vendor-table">
            <table class="display" id="basic-1">
                <thead>
                <tr>
                    <th>SL.</th>
                    <th>File Name</th>
                    <th>Total Uploaded Contact</th>
                    <th>Total Processed Contact</th>
                    <th>Created At</th>
                    <th>Group</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($files as $key=> $value)

                        <tr class="{{ $value->id }}">
                            <td>{{ $key+1 }}</td>
                            <td>{{ $value->file_name }}</td>
                            <td>{{ $value->total_upload }}</td>
                            <td>{{ $value->total_processed }}</td>
                            <td>{{ date('h:i:s A d-m-Y', strtotime($value->created_at)) }}</td>
                            <td>
                                {{-- <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Group</a> --}}
                                <a href="#" class="btn btn-primary" onclick="loadGroupModal('{{ $value->id }}')">Group</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Group Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id=modal-body>

            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')
    <script type="text/javascript">
        function loadGroupModal(id) {
            let getUrl = "{{ url('/user/file/group/') }}/" + id;
            $.ajax({
                method: "GET",
                url: getUrl,
                success: (data) => {
                    let groupModal = $('#modal-body');
                    groupModal.html(data);
                    $('#exampleModal').modal('show');

                }
            })
        }
    </script>
@endsection
