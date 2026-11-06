<form method="post" action="{{ route('crud.store') }}">
    @csrf
    @include('crud.form')
</form>