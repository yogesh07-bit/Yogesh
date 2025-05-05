<div>
    <h3>Another Subview</h3>
    <p>Data from field2: @foreach ($data as $user)
    @if ($user->info_type == "company_phone")
        <p>{{ $user->data }}</p>
    @endif
@endforeach
</p>
</div>
<div>
    <h2>Subview Content</h2>
    <p>Data from field1: @foreach ($data as $user)
    @if ($user->info_type == "company_email")
        <p>{{ $user->data }}</p>
    @endif
@endforeach
</p>
</div>
