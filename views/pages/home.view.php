    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
      
        <h1>Internshala-Min</h1>
        <ul>
        <li>The application will have 2 kinds of users, student and employer.</li>
        <li>After registering, the employer should be able to post internships, with bare minimum details. Internship posting should be restricted only to an employer and a student as well as a non registered user, should not be allowed.</li>
        <li>There should be a page which should display all the internships being posted on the application. This page should be accessible to everyone irrespective of whether the user is even logged in.</li>
        <li>A student should be able to apply to any internship he may want. If the student has already applied for an internship, he should be restricted from applying again. If the user is not logged in, it should redirect to the login page. And if the user is logged in as an employer, he should not be allowed to apply.</li>
        <li>The employer should be able to see all the application he has received for his internships.</li>
        </ul>
      </div>
    </div>
    <div class="container">

      <?php foreach($internshipTrimmed as $internship) : ?>
        <div class="row" style="border:1px solid black;">
          <div class="col-xs-12">
            <p><?php echo $internship->getTitle(); ?></p>
            <p><?php echo $internship->getPostedBy()->getName(); ?></p>
          </div>
        </div>
      <?php endforeach; ?>
      
    </div>
     