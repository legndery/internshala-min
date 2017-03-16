<?php
/**
 * 
 */
class PagesController
{
    public function home()
    {
        $internshipTrimmed = InternshipModel::allTrimmed();
        require_once('./views/pages/home.view.php');
    }
}

?>