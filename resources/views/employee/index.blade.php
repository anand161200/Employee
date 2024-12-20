<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<body>


        <div class="container">
                <div class="text-center mt-5">
                    <h3>Employees Management</h3>
                </div>

                <a href="{{ route('emp_create') }}"  class="btn btn-primary">Add</a>
                <table class="table mt-5">
                    <thead>
                    <tr>
                        <th scope="col">Photo</th>
                        <th scope="col">First name:</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Address</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Hobby</th>
                        <th scope="col">Action</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($employee as $emp)
                            <tr>
                                <td> <img src="{{ env('APP_URL') }}/upload/employee/{{$emp->photo}}"  height="70px"></td>
                                <td>{{ $emp->first_name }}</td>
                                <td>{{ $emp->last_name }}</td>
                                <td>{{ $emp->email }}</td>
                                <td>{{ $emp->mobile_number }}</td>
                                <td>{{ $emp->address }}</td>
                                <td>
                                    @if ($emp->gender =='1')
                                            {{ 'Male' }}
                                    @elseif ($emp->gender =='2')
                                             {{ 'Female' }}
                                    @elseif ($emp->gender =='3')
                                         {{ 'other' }}
                                    @endif
                                </td>
                                <td>
                                    @php
                                        $hobbyIds = json_decode($emp->hobby, true) ?? [];
                                        $hobbyNames = [
                                            1 => 'Reading',
                                            2 => 'Music',
                                            3 => 'Travelling',
                                        ];
                                    @endphp
                                        {{ implode(', ', array_map(fn($id) => $hobbyNames[$id] ?? '', $hobbyIds)) }}
                                        
                                    </td>
                                </td>
                                <td>
                                    <a  href="{{ route('emp_edit', $emp->id) }}"  class="btn btn-info">Edit</a>
                                    <a href="{{ route('emp_delete', $emp->id) }}" class="btn btn-danger">delete</a>
                                </td>
                               
                            </tr>
                        @endforeach
                  
                    </tbody>
                </table>
        </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>