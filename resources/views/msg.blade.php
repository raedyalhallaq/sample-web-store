@if ($errors->any())
    <div class="alert alert-danger alert-dismissible mb-0">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="m-menu__link-icon flaticon-remove"></i></span>
        </button>
    </div>
@endif