<form method="post" action="{{ route('crud.update', $driver) }}">
    @csrf
    @include('crud.form')
    @method('PUT')
</form>