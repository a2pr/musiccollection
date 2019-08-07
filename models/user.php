<?php 
class UserModel extends Model{
    public function register(){
        $post= filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $password=md5($post['password']); //not good enough
          if($post['submit']){
              //insert into Mysql
              if($post['username']==''  || $post['password']=='' ){
                Messages::setMsg('Please fill all fields', 'error');
                return;
              }
              $this->query('INSERT INTO users(username, password) VALUES(:username,:password)' );
              $this->bind(':username',$post['username']);
              $this->bind(':password',$password);
              $this->execute();
              //verify
              if($this->lastInsertId()){
                  header('Location: '. ROOT_URL.'users/login');
              }
          }
          return;
    }
    public function login(){
        $post= filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

         
            $password=md5($post['password']); //not good enough

          if($post['submit']){
              //compare login
           //COMPARE LOGIN
           $this->query('SELECT * FROM users WHERE username= :username AND password= :password' );
           $this->bind(':username',$post['username']);
           $this->bind(':password',$password);
           $this->execute();
          
           $row=$this->single();

           if($row){
               $_SESSION['is_logged_in']=true;
               $_SESSION['user_data']=array(
                   'id'=> $row['id'],
                   'username'=>$row['username']
                );
               header('Location: '.ROOT_URL.'collections');
            echo 'logged in';
           }else{
               Messages::setMsg('•	Sorry, we couldnt find an account with this username. Please check youre using the right username and try again', 'error');
            echo 'incorrect';
           }
          }
          return;
    }

}