

  /**

     * Returns the complete result set.

     * @param enum $p_how

     * An enumerated value representing the form the return value should take.

     * @param boolean $p_dbflag

     * Flag to turn debugging on and off.  On=true, Off=false.

     * @return array

     * Returns an array if successful, false otherwise.

     */

    public function get_result ( $p_how=RETURN_ASSOC_ARRAY, $p_dbflag=false )

    {

        if ( $this->_num_returned_rows == -1 || $this->_num_affected_rows == -1 )

        {

            if ( $this->_debug_flag || $p_dbflag )

                echo '<p>(dbg) get_next_result: The query did not work as either _num_returned_rows or _num_affected_rows are -1. Returning false.</p>';

            return false;

        }

        else

        {

            $num_rows = $this->_num_returned_rows;

            $myRow = $this->get_first_result ( $p_how );

            for ( $i=1 ; $i<=$num_rows ; $i++ )

            {

                $resultArray[$i] = $myRow;

                $myRow = $this->get_next_result ( $p_how );

            }

        }

        return $resultArray;

    }



    /**

     * Returns the error message.

     * @return string

     * Returns the last error message.

     */

    public function get_error_message ()

    {

        return $this->_errmsg;

    }



    /**************************************************************************

     *

     * Helper functions

     *

*************************************************************************/



    private function _get_result ( $p_how=RETURN_ASSOC_ARRAY, $p_dbflag=false )

    {

        $result = false;



        switch ( $p_how )

        {

            case RETURN_NUM_ARRAY:

                $result = mysql_fetch_array ( $this->_result_set, MYSQL_NUM );

                if ( $result )

                    $this->_row = $result;

                else

                    $this->_row = null;

                break;



            case RETURN_ASSOC_ARRAY:

                $result = mysql_fetch_array ( $this->_result_set, MYSQL_ASSOC );

                if ( $result )

                    $this->_row = $result;

                else

                    $this->_row = null;

                break;



            case RETURN_OBJECT:

                $result = mysql_fetch_object ( $this->_result_set );

                if ( $result )

                    $this->_row = $result;

                else

                    $this->_row = null;

                break;



            default:

                // If we get here, something is terribly wrong!

                $this->_row = null;

                break;

        }



        return $result;

    }



    private function _set_error_message ( $s )

    {

        // This is "internal" only; user cannot set error messages

        $this->_errmsg = $s;

}



    /*************************************************************************

     *

     * Getters and setters

     *

     ************************************************************************/



    public function get_server()

    {

        return $this->_server;

    }



    public function get_username()

    {

        return $this->_username;

    }



    public function get_password()

    {

        return $this->_password;

    }



    public function get_new_link()

    {

        return $this->_new_link;

    }



    public function get_client_flags()

    {

        return $this->_client_flags;

    }



    public function get_debug_flag()

    {

        return $this->_debug_flag;

    }



    public function get_query_string()

    {

        return $this->_query_string;

    }



    public function set_server ( $s )

    {

        $this->_server = $s;

    }



    public function set_username ( $u )

    {

        $this->_username = $u;

    }



    public function set_password ( $p )

    {

        $this->_password = $p;

    }



    public function set_new_link ( $n )

    {

        $this->_new_link = $n;

    }



    public function set_client_flags ( $c )

    {

        $this->_client_flags = $c;

    }



    public function set_debug_flag ( $d )

    {

        $this->_debug_flag = $d;

    }



    public function set_query_string ( $qs )

    {

        $this->_query_string = $qs;

    }



}



?>

