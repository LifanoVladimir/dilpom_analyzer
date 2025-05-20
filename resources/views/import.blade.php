<form action="{{ route('import.upload') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="files[]" multiple accept=".xml">
    <button type="submit">Загрузить</button>
</form>
