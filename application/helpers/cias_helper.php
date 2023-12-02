<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


/**
 * This function is used to print the content of any data
 */


function pre($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

/**
 * This function used to get the CI instance
 */
if(!function_exists('get_instance'))
{
    function get_instance()
    {
        $CI = &get_instance();
    }
}


/**
 * This function used to generate the hashed password
 * @param {string} $plainPassword : This is plain text password
 */
if(!function_exists('getHashedPassword'))
{
    function getHashedPassword($plainPassword)
    {
        return password_hash($plainPassword, PASSWORD_DEFAULT);
    }
}

/**
 * This function used to generate the hashed password
 * @param {string} $plainPassword : This is plain text password
 * @param {string} $hashedPassword : This is hashed password
 */
if(!function_exists('verifyHashedPassword'))
{
    function verifyHashedPassword($plainPassword, $hashedPassword)
    {
        return password_verify($plainPassword, $hashedPassword) ? true : false;
    }
}

/**
 * This method used to get current browser agent
 */
if(!function_exists('getBrowserAgent'))
{
    function getBrowserAgent()
    {
        $CI = get_instance();
        $CI->load->library('user_agent');

        $agent = '';

        if ($CI->agent->is_browser())
        {
            $agent = $CI->agent->browser().' '.$CI->agent->version();
        }
        else if ($CI->agent->is_robot())
        {
            $agent = $CI->agent->robot();
        }
        else if ($CI->agent->is_mobile())
        {
            $agent = $CI->agent->mobile();
        }
        else
        {
            $agent = 'Unidentified User Agent';
        }

        return $agent;
    }
}

if(!function_exists('setProtocol'))
{
    function setProtocol()
    {
        $CI = &get_instance();
                    
        $CI->load->library('email');
        
        $config['protocol'] = PROTOCOL;
        $config['mailpath'] = MAIL_PATH;
        $config['smtp_host'] = SMTP_HOST;
        $config['smtp_port'] = SMTP_PORT;
        $config['smtp_user'] = SMTP_USER;
        $config['smtp_pass'] = SMTP_PASS;
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        
        $CI->email->initialize($config);
        
        return $CI;
    }
}

if(!function_exists('emailConfig'))
{
    function emailConfig()
    {
        $CI = &get_instance();
        $CI->load->library('email');
        $config['protocol'] = PROTOCOL;
        $config['smtp_host'] = SMTP_HOST;
        $config['smtp_port'] = SMTP_PORT;
        $config['mailpath'] = MAIL_PATH;
        $config['charset'] = 'UTF-8';
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        $config['wordwrap'] = TRUE;
    }
}

if(!function_exists('resetPasswordEmail'))
{
    function resetPasswordEmail($detail)
    {
        $data["data"] = $detail;
        // pre($detail);
        // die;
        
        $CI = setProtocol();        
        
        $CI->email->from(EMAIL_FROM, FROM_NAME);
        $CI->email->subject("Reset Password");
        $CI->email->message($CI->load->view('email/resetPassword', $data, TRUE));
        $CI->email->to($detail["email"]);
        $status = $CI->email->send();
        
        return $status;
    }
}

if(!function_exists('setFlashData'))
{
    function setFlashData($status, $flashMsg)
    {
        $CI = get_instance();
        $CI->session->set_flashdata($status, $flashMsg);
    }
}


if(!function_exists('text2url'))
{
    function text2url($text)
    {
        $url = str_replace('[', '-', $text);
        $url = str_replace(']', '-', $url);
        $url = str_replace('{', '-', $url);
        $url = str_replace('}', '-', $url);
        $url = str_replace('(', '-', $url);
        $url = str_replace(')', '-', $url);
        $url = str_replace('||', '-', $url);
        $url = str_replace('|', '-', $url);
        $url = str_replace('&', '-', $url);
        $url = str_replace('+', '-', $url);
        $url = str_replace(' ', '-', strtolower($url));
        $url = str_replace('–', '-', strtolower($url));
        $url = str_replace('--', '-', strtolower($url));
        $url = str_replace('--', '-', strtolower($url));
        $url = str_replace('--', '-', strtolower($url));
        $url = str_replace('--', '-', strtolower($url));
        $url = substr_replace($url ,"",-1);
        return $url;
    }
}


// CUrl

function callcurl($data) {
    $ch = curl_init();
    if(isset($data['apikey'])){
      $key = $data['apikey'];
      unset($data['apikey']);
    }  
    $url = $data['url'];
    unset($data['url']);

    //$headers = array('Authorization: Bearer '.$stripeData['secret_key']);
    
    curl_setopt($ch, CURLOPT_URL,$url);
    //curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch);
    return $result;

   }

// curlUrl
    function curl_url($path = NULL){
       return 'https://movie.24chat.org/getapidata/'.$path;
    }   
// check is encoded
function is_base64_encoded($data)
{
    if (preg_match('%^[a-zA-Z0-9/+]*={0,2}$%', $data)) {
       return TRUE;
    } else {
       return FALSE;
    }
};

// check is encoded
function trimm($data)
{
    $data = str_replace('href="', "", $data);
    $data = str_replace('"', "", $data);
    $data = str_replace('https://veryfastdownload.pw/watch.php?link=', "", $data);
    $data = str_replace('https://veryfasturl.club/watch.php?link=', "", $data);
    
    $data = str_replace('https://gpshares.com/r/download.php?id=', "", $data);
    $data = str_replace('https://gpshare.xyz/download.php?id=', "", $data);
    $data = str_replace('href="https://gpshares.com/r/download.php?id=', "", $data);
    
    

    return trim($data);
};



// get user location 
     function getLocation($IP) {
         
        $CI = get_instance();

        if(empty($IP)){
            exit();
        }
         
         // Create the API URL with your API key
        $apiKey = $CI->config->item('LOCATION_TOKEN');
        $apiUrl = "https://ipinfo.io/{$IP}?token={$apiKey}";

        // Make an HTTP request to the ipinfo.io API
        $response = file_get_contents($apiUrl);

        // Decode the JSON response
        $locationData = json_decode($response);

        // Extract location information
        $city = $locationData->city;
        $region = $locationData->region;
        $country = $locationData->country;

        // Use the location information as needed
        return $city;//"City: $city, Region: $region, Country: $country";
    }


    //    Lawyer profile status function
    function update_employee_session($id){
                
        $CI = get_instance();
        $query = $CI->db->select('*')->from('employee')->where('id', $id)->get();
 
         if ($query->num_rows() > 0) {
         $result = $query->result();
          $employeeData=$result[0];
         if($employeeData !=''){
                if(!empty($employeeData->police_code)){
                    $CI->session->set_userdata('police_code', $employeeData->police_code);
                }
          }
        }
    }


      
//code for geting device type
if(!function_exists('getDevice'))
{
    // function to check device
    function getDevice()
    {
            // check which devise is using
            $isMob = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile")); 
            $isTab = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "tablet")); 
            $isWin = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "windows")); 
            $isAndroid = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "android")); 
            $isIPhone = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "iphone")); 
            $isIPad = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "ipad")); 
            
            $result = "";
            if($isMob){ 
                    $result = "mobile";
            }elseif($isTab){ 
                    $result = "tablet";
            }elseif($isWin){ 
                    $result = "windows";
            }elseif($isAndroid){ 
                    $result = "android";
            }elseif($isIPhone){ 
                    $result = "iphone";
            }elseif($isIPad){ 
                    $result = "ipad";
            }else{ 
                    $result = "N/A";
            }
            return $result;
    } 
}


// function to add notification start
function notification($data){
    
    $CI = get_instance();
    $table='notification';
    $CI->db->insert($table, $data);
    return $CI->db->insert_id();
}


// function to get like or not start
function getLikeOrNot($id){
    $empId = $_SESSION['employeeId'];
    $CI = get_instance();
    $query = $CI->db->select('id,like_emp_id,like_count')->from('event')->where('id', $id)->get();

    if ($query->num_rows() > 0) {
        $result = $query->result();
        $likeData=$result[0];
        if(isset($likeData->like_emp_id) && !empty($likeData->like_emp_id)){
            $oldLikeEmpId = json_decode($likeData->like_emp_id,true);
            if(in_array($empId, $oldLikeEmpId)){;
                return 1;
            }
         }
    }
}

?>