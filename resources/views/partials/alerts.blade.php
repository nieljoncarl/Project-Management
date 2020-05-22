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
        swal({ 
            html:true, 
            title:'Errors', 
            text:errorlog,
            type:'error'
        });
        
    @elseif (session('success'))
            Swal.fire(
            'Success',
            '{{session('success')}}',
            'success'
            )
    @elseif (session('error'))
            Swal.fire(
            'Error',
            '{{session('error')}}',
            'error'
            )
    @elseif (session('warning'))
            Swal.fire(
            'Warning',
            '{{session('warning')}}',
            'warning'
            )
    @endif
</script>