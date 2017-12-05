<div id="success_msg" class="alert alert-success alert-dismissible fade in box-alert"  role="alert">
    <p>
        <a href=" {{ route('cartIndex') }} "><strong>{{ session('success_msg') }}</strong></a>
    </p>
</div>
<script>
    $(document).ready(function() {
        $('#success_msg').delay(2000).slideUp('slow');
    });
</script>
