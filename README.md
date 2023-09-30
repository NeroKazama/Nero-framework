# Nero-framework

Just Started to created my own mini framework to better understand php in deep level.

Autoload is working and created a routing system for MVC pattern.

also u can use a helper function to call view in better way and send the only variables to view whitch you want.

example:

      class BaseController extends Controller {
      
          public function show() {
              $this->Helper->View('home.php');
          }
      }

remember to use this option, your class need to extend Controller class.
