<!DOCTYPE html>
<html>
<head>
    <title>Import Users</title>
</head>
<body>
    <h2>Import Users from XML</h2>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    @if(session('error'))
        <p style="color:red">{{ session('error') }}</p>
    @endif

    <form action="{{ route('import.users') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="xml_file" accept=".xml" required>
        <button type="submit">Import</button>
    </form>
</body>
</html>
