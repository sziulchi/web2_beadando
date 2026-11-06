<form method="post" action="{{ route('crud.update', $driver) }}">
    @csrf
    @include('crud.form')
    @method('PUT')
    <input type="submit" value="Mentés" class="button alt">
</form>