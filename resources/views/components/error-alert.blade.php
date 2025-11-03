@if ($message)
<div class="alert alert-danger d-flex align-items-center" style="margin-bottom: 20px; border: 1px solid #f5c2c7; background-color: #f8d7da; color: #842029; padding: 12px 16px; border-radius: 6px;">
    <strong style="margin-right: 6px;">Error:</strong> {{ $message }}
</div>
@endif
