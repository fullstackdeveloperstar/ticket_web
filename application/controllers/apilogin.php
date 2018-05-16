<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Apilogin extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('user_model');
        $this->load->model('email_model');
    }

    public function index()
    {    
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[128]|xss_clean|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|max_length[32]|');

        if($this->form_validation->run() == FALSE)
        {
        	$data['success'] = false;
        	$data['msg'] = "Cridential is required!";
            echo json_encode($data);
            exit();
        }

        else
        {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            
            $result = $this->login_model->loginMe($email, $password);
            
            if(count($result) > 0)
            {
                foreach ($result as $res)
                {
                    $key = $res->user_token;
                    if($res->user_token == ""){
                        $key = uniqid();
                    }

                    $this->user_model->editUser(array('user_token' => $key), $res->userId);
                    $res->user_token = $key;
                    $sessionArray = array('userId'=>$res->userId,                    
                                          'role'=>$res->roleId,
                                          'roleText'=>$res->role,
                                          'name'=>$res->name,
                                          'isLoggedIn' => TRUE,
                                          'user_token' =>$res->user_token
                                    );

                                    
                    $this->session->set_userdata($sessionArray);
                    
                    $data['success'] = true;
		        	$data['user'] = $res;
		            echo json_encode($data);
		            exit();
                }
            }
            else
            {
                $data['success'] = false;
	        	$data['msg'] = "Email or password mismatch";
	            echo json_encode($data);
	            exit();
            }
        }

    }

    public function signup()
    {
        $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]|xss_clean');
        $this->form_validation->set_rules('lname','Full Name','trim|required|max_length[128]|xss_clean');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean|max_length[128]');
        $this->form_validation->set_rules('password','Password','required|max_length[20]');
        $this->form_validation->set_rules('cpassword','Confirm Password','trim|required|matches[password]|max_length[20]');
        
        if($this->form_validation->run() == FALSE)
        {
            $data['success'] = false;
            $data['msg'] = "Cridential is required!";
            echo json_encode($data);
            exit();
        }
        else
        {
            $fname = ucwords(strtolower($this->input->post('fname')));
            $lname = ucwords(strtolower($this->input->post('lname')));
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            
            $checkUserExist = $this->user_model->checkEmailExists($email);
            if(count($checkUserExist) > 0){
                $data['success'] = false;
                $data['msg'] = "User already exists! Please try with other information!";
                echo json_encode($data);
                exit();
            }

            $userInfo = array('email'=>$email, 'password'=>getHashedPassword($password), 'roleId'=>3, 'fname'=>$fname, 'lname' => $lname, 'createdBy'=> -1, 'createdDtm'=>date('Y-m-d H:i:s'), 'user_token' => uniqid());
            

            $result = $this->user_model->addNewUser($userInfo);
            
            if($result > 0)
            {
                $data['success'] = true;
                $data['msg'] = "Signup is successed";
                echo json_encode($data);
                exit();
            }
            else
            {
                $data['success'] = false;
                $data['msg'] = "User creation failed";
                echo json_encode($data);
                exit();
            }
            
           
        }
        
    }

  //   public function isLoggedIn(){
  //   	$isLoggedIn = $this->session->userdata ( 'isLoggedIn' );
		
		// if (! isset ( $isLoggedIn ) || $isLoggedIn != TRUE) {
		// 	$data['success'] = false;
		// 	echo json_encode($data);
		// } else {
		// 	$data['success'] = true;
		// 	echo json_encode($data);
		// }
  //   }

    public function sendEmail()
    {
       $this->email_model->sendEmail();

    }

}