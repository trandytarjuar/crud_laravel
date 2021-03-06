@extends('layout.app')
@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
        <h2>Device </h2>
        <ul class="nav navbar-right panel_toolbox">
            
        </ul>
        <div class="clearfix"></div>
        </div>
        <div class="x_content">
        <button class="btn btn-primary" type="reset" href="{{ route('device.create') }}">Add Device</button>
        <table id="table_device" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>No</th>
                <th>Code</th>
                <th>Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>


            <tbody>
            
            </tbody>
        </table>
        </div>
    </div>
  </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function() {
    
        $('#table_device').dataTable({
            processing: true,
            serverSide: true,
            ajax: '/device/get_data',
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'code', name: 'code' },
                { data: 'name', name: 'name' },
                { 
                    data: 'status',
                    render: function(data, row) { 
                        if(data == "0") {
                            return 'Non Aktif' 
                        }
                        else {
                            return 'Aktif'
                        }

                    }
                },
                { data: 'action', name: 'action' }
            ],
            language: {
                searchPlaceholder: "Search records"
            },
            dom: 'lBfrtip',
            buttons: []
        });

        $(document).on('click', '.delete-data-device', function(e) {
            var data_id = $(this).attr("data-id");
            var url = "/device/delete/" + data_id;
                    
            $.ajax({
                type: 'GET',
                url: url,
                dataType: 'json',
                success: function(data) {
                    if (data.status) {
                        alert('Berhasil terhapus!')
                        window.location.reload();
                    } else {
                        alert('Gagal!')
                    }
                }
            })
        })
    });
</script>
@endsection