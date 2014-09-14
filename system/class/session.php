<?php

class Session
{
        
    var $userid;
    var $user_email;
    var $user_lastlogin;
    var $randomid;
    var $lastlogin;
    var $userlevel;
    var $referrer;
    var $url;
    var $time;
    var $loginType;
    var $logged_in;


    function Session()
    {

        session_start();
        if ( isset($_SESSION['timeout']) )
            {
                $this->time = $_SESSION['timeout'];
            }

        if(isset($_SESSION['url']))
            {
                $this->referrer = $_SESSION['url'];
            }
        else
            {
                $this->referrer = "/";
            }

          /* Set current url */
        $this->url = $_SESSION['url'] = $_SERVER['REQUEST_URI'];

        $_SESSION['timeout'] = time();


    }


    function login( $email, $password, $remember_me = false )
    {

        $email = cleanData($email);

        if ( $userData = $this->checkUser( $email, $password ) )
        {
            $this->loginUser($userData, $remember_me);
            return true;
        }

        return false;

    }





    function checkUser ($email, $password)
    {

        $query = mysql_query('SELECT * FROM '.TBL_USER.' WHERE email = "'.$email.'"');

        if( mysql_num_rows($query) < 1 )
        {
            return false;
        }

        $data = mysql_fetch_assoc($query);

        //$password = hash('sha256',$password);

        if( $data['password'] == $password )
        {
            return $data;
        }

        return false;

    }





    /**
     * Login user by setting session and cookie (if $remember_me = true)
     *
     * @param $user
     * @param bool $remember_me
     */
    private function loginUser ($user, $remember_me = false)
    {

        if( $remember_me ) {

            $cookie_rand = $this->updateUserCookie($user['id']);

            setcookie ("cookid", $user['id'], time()+COOKIE_EXPIRE);
            setcookie ("cookrand", $cookie_rand, time()+COOKIE_EXPIRE);

        }

        $_SESSION['user_id']    = $user['id'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['loginType']  = $user['type'];

    }


            

    /**
     * Check is admin/user logged in/
     * @param $level
     * @return bool
     */
    function checklogin($level=false)
    {

        if ( $this->checkSession($level) )
        {
            return true;
        }
        elseif ( isset($_COOKIE["cookrand"]) && isset($_COOKIE["cookid"]) )
        {

            $userData = $this->getUserWithCookie($_COOKIE["cookid"], $_COOKIE["cookrand"]);

            if( $userData ) {
                $this->loginUser($userData, true);

                return $this->checkSession($level);

            }

        }

        return false;

    }



    private function checkSession($level=false) {

        if ( isset($_SESSION['user_id']) && isset($_SESSION['user_email']) && isset($_SESSION['loginType']) )
        {

            switch( $level )
            {
                case 'admin':

                    if (  ($_SESSION['loginType'] == 'admin') && $this->isTimeOut() )
                    {
                        return true;
                    }
                    else
                    {
                        return false;
                    }

                    break;

                case 'user':

                    if( ($_SESSION['loginType'] == 'user') && $this->isTimeOut() )
                    {
                        return true;
                    }
                    else
                    {
                        return false;
                    }

                    break;

                default:
                    return true;
                    break;
            }

        }

        return false;

    }


    /**
     * check is login timeout. If timeout, User will logged out.
     *
     * @param int $timeout
     * @return bool
     */
    function isTimeOut( $timeout = 2000 )
    {

        if(isset($this->time) )
        {

            if( ( time() - $this->time ) > $timeout )
            {

                $this->logoutAll();
                return false;

            }
            else
            {
                return true;
            }
        }
        else
        {
            return true;
        }

    }





    /**
     * Make login required. If not logged in redirect to login page.
     *
     * @param $type
     * @param bool $redirect
     * @param bool $ajax
     */
    function loginRequired( $type, $redirect = true, $ajax = false )
    {

        if ( !$this->checklogin($type) )
            {

                if ( $redirect )
                    {
                        $_SESSION['login_referrer'] = $ajax ? $ajax : $this->url;
                    }

                if ( $ajax )
                    {
                        echo 'Your session has ended. Please <a href="'.WEBSITE_URL.'login/">Login</a> again.
                            <script>
                            document.location="'.WEBSITE_URL.'login/"
                            </script>';
                        exit();
                    }
                else
                    {
                        redirect( WEBSITE_URL . 'login.php' );
                    }

            }

    }


        









    private function getUserWithCookie($cookie_id, $cookie_rand) {

        $query = mysql_query('SELECT * FROM '.TBL_USER.' WHERE id = "'.$cookie_id.'" AND cookie_rand="'.$cookie_rand.'"');

        if( mysql_num_rows($query) < 1 )
        {
            return false;
        }

        $data = mysql_fetch_assoc($query);
        return $data;

    }

    /**
     * Update user cookie in database
     *
     * @param $user_id
     * @return string random cookie
     */
    private function updateUserCookie($user_id) {

        $rand = $this->generateRandID();
        mysql_query('UPDATE '.TBL_USER.' SET cookie_rand = "'.$rand.'" WHERE id="'.$user_id.'"');
        return $rand;

    }







        
    function logoutAll()
    {

        unset( $_SESSION['user_id'] );
        unset( $_SESSION['user_email'] );
        unset( $_SESSION['loginType'] );

        setcookie ("cookid", "", time()-COOKIE_EXPIRE);
        setcookie ("cookrand", "", time()-COOKIE_EXPIRE);

    }
                     
        
    function logout()
    {
        
        unset( $_SESSION['user_id'] );
        unset( $_SESSION['user_email'] );
        unset( $_SESSION['first_name'] );
        unset( $_SESSION['last_name'] );
        unset( $_SESSION['loginType'] );
        setcookie ("cookid", "", time()-COOKIE_EXPIRE);
        setcookie ("cookrand", "", time()-COOKIE_EXPIRE);
              

    }
            

    /**
    * generateRandID - Generates a string made up of randomized
    * letters (lower and upper case) and digits and returns
    * the md5 hash of it to be used as a randomid.
    */
   function generateRandID(){
      return md5($this->generateRandStr(16));
   }

   /**
    * generateRandStr - Generates a string made up of randomized
    * letters (lower and upper case) and digits, the length
    * is a specified parameter.
    */
   function generateRandStr($length){
      $randstr = "";
      for($i=0; $i<$length; $i++){
         $randnum = mt_rand(0,61);
         if($randnum < 10){
            $randstr .= chr($randnum+48);
         }else if($randnum < 36){
            $randstr .= chr($randnum+55);
         }else{
            $randstr .= chr($randnum+61);
         }
      }
      return $randstr;
   }


        
   };
    
    $session = new Session();
