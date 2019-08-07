<?php 
class AlbumModel extends Model{
    public function Index(){
        $this->query('SELECT * FROM albums ORDER BY create_date ASC');
        $rows= $this->resultSet();
        unset($_SESSION['user_data']['choose']);
        unset($_SESSION['user_data']['album_edit']);
        
        $post= filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if($post['remove']){
            print_r($post);
            $delete_query="DELETE FROM albums WHERE id=:id ";
            $this->query($delete_query);
            $this->bind(':id',$post['id']);
            $this->execute();
            header('Location: '. ROOT_URL.'albums');
        }
        else if($post['edit']){
            print_r($post);
            $_SESSION['user_data']['album_edit']=$post;
            header('Location: '. ROOT_URL.'albums/edit');
        } 
        
        return $rows;
    }

    public function add(){
        $this->query('SELECT * FROM albums ORDER BY create_date DESC');
        $rows= $this->resultSet();
    
        //Sanitize Post
        $post= filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        //adding from available albums in database
        if($post['added']){
            $col=$post['id'];
            //confirm id from added album and collection name
            if(isset($col) && isset($_SESSION['user_data']['choose']) ){
                $name= $_SESSION['user_data']['choose'];
                $sql1="SELECT * FROM $name";
                $this->query($sql1);
                $collec= $this->resultSet();
                //check if collection is not empty
                if($collec){
                    //check if album is already in collection
                    foreach($collec as $a){
                        if($a['album_name']==$post['title']){
                            Messages::setMsg('Album already in collection', 'error');
                            break;
                        }else{
                             //adding to current collection
                            $sql= "INSERT INTO $name ( album_id, album_name, artist_name, album_year_release,tracks ) VALUES(:id, :title ,:artist_name ,:album_year_release, :tracks)";
                            $this->query($sql);
                            $this->bind(':id',$col);
                            $this->bind(':title',$post['title']);
                            $this->bind(':artist_name',$post['artist_name']);
                            $this->bind(':album_year_release',$post['year_release']);
                            $this->bind(':tracks',$post['tracks_number']);
                            $this->execute();
                            break;
                            header('Location: '. ROOT_URL.'collections/showCollection');
                        }
                    } 

                }else{
                    
                     //adding to current collection
                     $sql= "INSERT INTO $name ( album_id, album_name, artist_name, album_year_release,tracks ) VALUES(:id, :title ,:artist_name ,:album_year_release, :tracks)";
                            $this->query($sql);
                            $this->bind(':id',$col);
                            $this->bind(':title',$post['title']);
                            $this->bind(':artist_name',$post['artist_name']);
                            $this->bind(':album_year_release',$post['year_release']);
                            $this->bind(':tracks',$post['tracks_number']);
                            $this->execute();
                     header('Location: '. ROOT_URL.'collections/showCollection');
                }
                
            }else{
                //album not added to any collection
                header('Location: '. ROOT_URL.'collections');
            }
            header('Location: '. ROOT_URL.'collections/showCollection');
        }
        
        if($post['submit']){
            //check for empty fields
            if($post['title']=='' || $post['artist_name']==''||$post['year_release']==''||$post['tracks']==''){
                Messages::setMsg('Please fill all fields', 'error');
                return $rows ;
              }
              //check if album is in database
              foreach ($rows as $item) {
                    if ($item['title']==$post['title']) {
                        Messages::setMsg('Album already in database', 'error');   
                        return $rows;
                    }  else{
                        //adding new album to database
                        $this->query('INSERT INTO albums ( title, artist, year_release, tracks_number) VALUES(:title, :artist, :year_release, :tracks)' );
                        $this->bind(':title',$post['title']);
                        $this->bind(':artist',$post['artist_name']);
                        $this->bind(':year_release',$post['year_release']);
                        $this->bind(':tracks',$post['tracks']);
                        $this->execute();
                        //album id added to collection
                        $col=$this->lastInsertId();
                        if($col && $_SESSION['user_data']['choose'] ){
                            $name= $_SESSION['user_data']['choose'];
                            $sql1="SELECT * FROM $name";
                            $this->query($sql1);
                            $collec= $this->resultSet();
                            print_r($collec);
                            foreach($collec as $a){
                                if($a['album_name']==$post['title']){
                                    Messages::setMsg('Album already in collection', 'error');
                                    return $rows;
                                }else{
                                     //adding to current collection
                                    $sql= "INSERT INTO $name ( album_id, album_name, artist_name, album_year_release,tracks ) VALUES(:id, :title ,:artist_name ,:album_year_release, :tracks)";
                                    $this->query($sql);
                                    $this->bind(':id',$col);
                                    $this->bind(':title',$post['title']);
                                    $this->bind(':artist_name',$post['artist_name']);
                                    $this->bind(':album_year_release',$post['year_release']);
                                    $this->bind(':tracks',$post['tracks']);
        
                                    $this->execute(); 
                                    break;
                                    header('Location: '. ROOT_URL.'collections/showCollection');
                                }
                            }
                           
                        }else{
                            //album not added to any collection
                            header('Location: '. ROOT_URL.'albums');
                        }
                        break;
                    }
              }
              header('Location: '. ROOT_URL.'albums');
        }

        return $rows;
    }
    public function edit(){
        $post= filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $row=$_SESSION['user_data']['album_edit'];
        
            if($post['submit']){
                //none value in inputs
                if($post['title']=='' || $post['artist_name']==''||$post['year_release']==''||$post['tracks']==''){
                    Messages::setMsg('Please fill all fields', 'error');
                    return;
                  }
                  // Update album
                  $this->query('UPDATE albums 
                  SET title=:title, artist= :artist, year_release= :year_release,tracks_number= :tracks 
                  WHERE id= :id'  );
                  $this->bind(':title',$post['title']);
                  $this->bind(':artist',$post['artist_name']);
                  $this->bind(':year_release',$post['year_release']);
                  $this->bind(':tracks',$post['tracks']);
                  $this->bind(':id',$row['id']);
                  $this->execute();
                  //Update value in collections
                  if($_SESSION['user_data']['choose']){
                    $name=$_SESSION['user_data']['choose'];
                    $sql="UPDATE $name 
                    SET album_name=:title, artist_name= :artist, album_year_release= :year_release,tracks= :tracks 
                    WHERE album_id= :id";
                    $this->query($sql);
                    $this->bind(':title',$post['title']);
                    $this->bind(':artist',$post['artist_name']);
                    $this->bind(':year_release',$post['year_release']);
                    $this->bind(':tracks',$post['tracks']);
                    $this->bind(':id',$row['id']);
                    $this->execute();
                    unset($_SESSION['user_data']['album_edit']);
                    header('Location: '. ROOT_URL.'collections/showCollection');    

                  }else{
                    header('Location: '. ROOT_URL.'albums'); 
                  }
            }
        return $row;
    }

   
}