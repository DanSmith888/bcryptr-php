<?
//Dan Smith daniel@appica.com.au | 6/03/2019 16:54:58
//returns a PBKDF2 hash for use with authentication

//Check HTTPS is being used, if not abort and tell the user nothing.
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
    header("Content-Type: text/plain");
    if ( isset($_POST['password']) && $_POST['password'] != ''){

        /**
         * Note that the salt here is randomly generated.
         * Never use a static salt or one that is not randomly generated.
         *
         * For the VAST majority of use-cases, let password_hash generate the salt randomly for you
         */

        if ( isset($_POST['cost']) && $_POST['cost'] != '') {
            $options = [
            'cost' => $_POST['cost'],
            ];
            header('HTTP/1.0 202 ACCEPTED');
            print password_hash( $_POST['password'], PASSWORD_DEFAULT, $options );
        }else{

            header('HTTP/1.0 202 ACCEPTED');
            print password_hash( $_POST['password'], PASSWORD_DEFAULT);
        }
        
    }else{
        header('HTTP/1.0 500 SERVER ERROR');
    }
}
?>
