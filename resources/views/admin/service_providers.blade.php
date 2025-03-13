<!DOCTYPE html>
<html>
<head><title>Manage Service Providers</title></head>
<body>
    <h2>Service Provider Approvals</h2>
    @foreach ($providers as $provider)
        <p>{{ $provider->name }} - {{ $provider->email }} ({{ $provider->category }})
        @if(!$provider->is_approved)
            <form action="{{ route('admin.approve', $provider->id) }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit">Approve</button>
            </form>
            <form action="{{ route('admin.reject', $provider->id) }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit">Reject</button>
            </form>
        @else
            <span>Approved</span>
        @endif
        </p>
    @endforeach
</body>
</html>
