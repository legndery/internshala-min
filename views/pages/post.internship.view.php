<div class="container">
    <form action='./?controller=post&action=internship' method='post' class="form-horizontal">
    <div class="form-group" style="display:block;">
        <label>Title</label>
        <input type="text" class="form-control" placeholder="Title" name="title">
    </div>

    <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" rows="3" placeholder="Description" name="description"></textarea>
    </div>
    
    <div class="form-group">
        <label>Stipend</label>
        <input type="text" class="form-control" placeholder="Stipend" name="stipend">
        <select class="form-control" name="stipend_unit">
            <option>PM</option>
            <option>Lump Sum</option>
        </select>
    </div>

    <div class="form-group">
        <label>Start Date</label>
        <input type="date" class="form-control" name="start_date">
    </div>

    <div class="form-group">
        <label>Duration</label>
        <input type="text" class="form-control" placeholder="Duration" name="duration" >
        <select class="form-control" name="duration_unit">
            <option>Month(s)</option>
            <option>Year(s)</option>
            <option>Day(s)</option>
        </select>
    </div>

    <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>