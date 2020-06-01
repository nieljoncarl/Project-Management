{{-- @if (session('success'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>{{session('success')}}</strong>
    </div>
@endif

@if (session('warning'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>{{session('warning')}}</strong>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>{{session('error')}}</strong>
    </div>
@endif
 --}}

<script>
    var errorlog = '';
    @if (count($errors)>0)
        @foreach ($errors->all() as $error)
            errorlog += '{{$error}}<br>';
        @endforeach
            Swal.fire({
                icon: 'error',
                title: errorlog,
                showConfirmButton: true
            });
        
    @elseif (session('success'))
            Swal.fire({
                icon: 'success',
                title: '{{session('success')}}',
                showConfirmButton: false,
                timer: 2000
            });
    @elseif (session('error'))
            Swal.fire({
                icon: 'error',
                title: '{{session('error')}}',
                showConfirmButton: false,
                timer: 2000
            });
    @elseif (session('warning'))
            Swal.fire({
                icon: 'warning',
                title: '{{session('warning')}}',
            });
    @endif
</script>