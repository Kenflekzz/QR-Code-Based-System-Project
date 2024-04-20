//log in form
<form method="POST" action="/login">
    @csrf
    <label for="email" id="Email" name="email">Email:</label><br>
    <input type="text"  name="Email">
    <label for="password" id="password" name="password">Password: </label><br>
    <input type="password" name="password">
    <button type="submit">Login</button>
</form>
