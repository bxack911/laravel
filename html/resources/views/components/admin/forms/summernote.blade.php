<div id="{{ $name }}"></div>

@push('custom-scripts')
<script>
    $('#{{ $name  }}').summernote({!! $options !!});
</script>
@endpush
