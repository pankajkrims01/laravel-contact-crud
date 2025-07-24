<form action="{{ route('users.import') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="xml_file" accept=".xml" required>
    <button type="submit">Import Users</button>
</form>
