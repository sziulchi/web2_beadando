<form method="post" action="{{ route('crud.store') }}">
    @csrf
    @include('crud.form')
    <input type="submit" value="Mentés" class="button alt">
</form>