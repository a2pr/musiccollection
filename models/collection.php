<?php 
class CollectionModel extends Model{
    public function Index(){
        $this->query('SELECT * FROM collections WHERE user_creater_id= :id ORDER BY create_date ASC');
        $this->bind(':id',$_SESSION["user_data"]['id']);
        $rows= $this->resultSet();
        $post= filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

          if($post['album']){
            $_SESSION['user_data']['choose']=$post['choose'];
            header('Location: '. ROOT_URL.'collections/showCollection');
          }
        return $rows;
    }

    
    public function add(){
        //Sanitize Post
        $post= filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if($post['submit']){
            //check fields
            if($post['name']==''){
                Messages::setMsg('Please fill all fields', 'error');
                return;
              }
             //insert into Mysql
             $this->query('INSERT INTO collections (name, user_creater_id) VALUES(:name,:user)' );
             $this->bind(':name',$post['name']);
             $this->bind(':user',$_SESSION['user_data']['id']);
             $this->execute();
             //create new table
             if($this->lastInsertId()){
                $table=$post['name'];
                $sql="CREATE TABLE $table ( id INT AUTO_INCREMENT, album_id INT, album_name VARCHAR(255), artist_name VARCHAR(255), album_year_release DATE,tracks INT, PRIMARY KEY (`id`))";
                $this->createNew($sql);
                header('Location: '. ROOT_URL.'collections');
            }
        }
        return;
    } 
    

    public function showCollection(){
        
        $name= $_SESSION['user_data']['choose'];
        $sql="SELECT * FROM $name ";
        $this->query($sql);
        $rows= $this->resultSet();
        //Deleting query
        $post= filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if($post['remove']){
            print_r($post);
            $delete_query="DELETE FROM $name WHERE album_id=:id ";
            $this->query($delete_query);
            $this->bind(':id',$post['id']);
            $this->execute();
            header('Location: '. ROOT_URL.'collections/showCollection');
        }
        else if($post['edit']){
            $_SESSION['user_data']['album_edit']=$post;
            header('Location: '. ROOT_URL.'albums/edit');
        }
        return $rows;


    }
    public function showArtist(){
        
        $name= $_SESSION['user_data']['choose'];
        
        $sql="SELECT * FROM $name ";
        $this->query($sql);
        $rows= $this->resultSet();
        //Deleting query
        $post= filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if($post['remove']){
            print_r($post);
            $id=$post['id'];
            $delete_query="DELETE FROM $name WHERE id=:id";
            $this->query($delete_query);
            $this->bind(':id',$post['id']);
            $this->execute();
            
            header('Location: '. ROOT_URL.'collections');
        }
        return $rows;


    }

}