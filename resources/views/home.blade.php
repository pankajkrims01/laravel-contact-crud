<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <container>
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Home</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('addstudent') }}" class="btn btn-primary">Create</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @if (session('info'))
                    <div class="alert alert-success">
                        {{ session('info') }}
                    </div>
                    
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Marks</th>           
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                         @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->id }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->marks }}</td>
                                
                                <td>
                                    <a href="{{-- route('edit', $user->id) --}}" class="btn btn-warning">Edit</a>
                                    <a href="{{-- route('delete', $user->id) --}}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                       @endforeach 
                    </tbody>
                </table>
            </div>
        </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>   
</body>
</html>