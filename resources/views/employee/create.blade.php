<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<body>

    <div class="container">

        <div class="text-center mt-5">
            <h3>Cerate Employees </h3>
        </div>

        <div style="border: 1px solid ; padding:20px">
            <form action="{{ route('emp_store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label  class="form-label">First Name</label>
                  <input type="text" class="form-control" name="first_name">
                    @error('first_name')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label  class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="last_name">
                    @error('last_name')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label  class="form-label">Email</label>
                    <input type="text" class="form-control" name="email">
                    @error('email')
                        <span style="color: red">{{ $message }}</span>
                     @enderror
                </div>
                <div class="input-group mb-3">
                    <select class="btn btn-outline-secondary dropdown-toggle" name="country_code">
                        <option value="">Select</option>
                        <option value="+91">+91</option>
                        <option value="+27">+27</option>
                        <option value="+12">+12</option>
                    </select>
                    <input type="text" class="form-control" name="mobile_number">
                    @error('mobile_number')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label  class="form-label">Address</label>
                    <textarea class="form-control" name="address" ></textarea>
                    @error('address')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label  class="form-label">Gender</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" value="1">
                        <label class="form-check-label">Male</label>
                        
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" value="2" >
                        <label class="form-check-label" > Female</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" value="3" >
                        <label class="form-check-label" > Other</label>
                    </div>
                        
                </div>
                <div class="mb-3">
                    <label  class="form-label">Hobby</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="hobby[]" value="1" >
                        <label class="form-check-label" for="flexCheckDefault">Reading</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="hobby[]" value="2" >
                        <label class="form-check-label" >Music</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="hobby[]" value="3">
                        <label class="form-check-label" >Travelling</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label  class="form-label">Address</label>
                    <input type="file" class="form-control" name="photo">
                    @error('photo')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
               
            </form>
        </div>

    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>