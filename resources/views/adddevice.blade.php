@extends('layout.app')
@section('content')
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
        <h2>Add Device </h2>
        
        <div class="clearfix"></div>
        </div>
        <div class="x_content">
        <br />
        <form id="frm_add_device" data-parsley-validate class="form-horizontal form-label-left">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="code">Code <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="code" name="code" required="required" class="form-control col-md-7 col-xs-12">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="heard">Status<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="heard" class="form-control col-md-7 col-xs-12" name="status" required>
                        <option value="">Choose..</option>
                        <option value="1">Aktif</option>
                        <option value="0">Non Aktif</option>
                    </select>
                </div>
            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button class="btn btn-primary" type="button" onclick="javascript:history.back()">Cancel</button>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
            </div>

        </form>
        </div>
    </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).on("submit", "#frm_add_device", function(e) {
        var url = "/device/store";
        var form_data = new FormData($(this)[0]);

        $.ajax({
            type: 'POST',
            data: form_data,
            url: url,
            processData: false,
            contentType: false,
            success: function(data) {
                console.log(data);
                if (data.status == true) {
                    alert('Berhasil');
                    location.href = data.redirect_url;
                } else {
                    alert('Gagal!')
                }
            }
        });

        e.preventDefault();
    });
</script>
@endsection