@if (session('status'))
    <div class="alert alert-success rounded-3" id="success-alert" role="alert">
        <div class="d-flex gap-4">
            <span><i class="fa-solid fa-circle-check icon-success"></i></span>
            <div class="d-flex flex-column gap-2">
                <h6 class="mb-0">{{ session('status') }}</h6>
            </div>
        </div>
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger rounded-3" id="danger-alert" role="alert">
        <div class="d-flex gap-4">
            <span><i class="fa-solid fa-circle-exclamation icon-danger"></i></span>
            <div class="d-flex flex-column gap-2">
                <h6 class="mb-0">{{ session('error') }}</h6>
            </div>
        </div>
    </div>
@endif

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger rounded-3" id="danger-alert" role="alert">
            <div class="d-flex gap-4">
                <span><i class="fa-solid fa-circle-exclamation icon-danger"></i></span>
                <div class="d-flex flex-column gap-2">
                    <h6 class="mb-0">{{ $error }}</h6>
                </div>
            </div>
        </div>
    @endforeach
@endif

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $("#success-alert").fadeTo(2000, 10).slideUp(500, function() {
        $("#success-alert").slideUp(500);
    });
    $("#danger-alert").fadeTo(2000, 10).slideUp(500, function() {
        $("#danger-alert").slideUp(500);
    });
</script>

