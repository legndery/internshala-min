<div class="container">
    <form action='./?controller=user&action=register' method='post'>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" placeholder="Username" name="uname">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" placeholder="Password" name="pword">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" placeholder="Email" name="email">
    </div>
    <div class="radio">
    <label>
        <input type="radio" name="isEmp" id="optionsRadios1" value="0" checked>
        Student
    </label>
    </div>
    <div class="radio">
    <label>
        <input type="radio" name="isEmp" id="optionsRadios2" value="1">
        Employee
    </label>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>