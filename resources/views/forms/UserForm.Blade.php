// Registration Form

<form action="/insert-data" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="fname">FirstName:</label><br>
    <input type="text" id="fname" name="fname"><br>
    <label for="lname">LastName :</label><br> 
    <input type="text" id="Lname" name="lname"><br>
    <label for="country">Country </label><br>
    <input type="text"  id="country" name="country"><br>
    <label for="address">Address:</label><br>
    <input type="text" id="address" name="address"><br>
    <label for="occupation">Occupation:</label><br>
    <input type="text" id="Occupation" name="occupation"><br>
    <label for="school">School Name:</label><br>
    <input type="text" id="School" name="school"><br>
    <label for="employer">Employer:</label><br>
    <input type="text" id="employer"  name="employer"><br>
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email"><br>
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password"><br>
    <label for=fileupload >Upload your valid id</label><br>
    <input type="file" name="valid_id" accept="image/*"><br>
    <button type="submit">Register</button>  
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

</form>
