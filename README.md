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

when you are using this function your page is going to be inside app.php inside app folder in views. to stop this function just send false last variable like this:

       $this->Helper->View('home.php', [false]);

remember to use this option, your class need to extend Controller class.

you can also access 3 path like below:

      $this->Helper->view //view folder
      $this->Helper->path //controller folder
      $this->Helper->uri //REQUEST_URI
      $this->Helper->method //REQUEST_METHOD

-----------------------------------------------------
version 0.3

added validation system, and RequestHelper

usage example:

        $validator = new Validation([
            $email => ['email', 'string'],
            $password => ['confirmPassword|'.$confirmPassword],
            $number => ['max|1024', 'min|10', 'int'],
            $phone => ['phone']
        ]);

right now validation methods contains: email, string, int, confirmPassword, max, min and phone.

RequestHelper is a trait which you can use to access post and get in a secure way, to use it first you need to add

       use RequestHelper;
            
to your class and to use it:

      $email = $this->post('loginName');
      $email = $this->get('loginName');





also some methods about auth system added but it's not complete yet.

