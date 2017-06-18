@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-block alert-danger fade in">
            <button data-dismiss="alert" class="close close-sm" type="button">
                <i class="ti-close"></i>
            </button>
            <strong>Oh 出错了!</strong>   {{ $error }}.
        </div>
    @endforeach
@endif