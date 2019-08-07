<?php 
class ArtistModel extends Model{
    public function Index(){
        //Querying 
        unset($_SESSION['user_data']['choose']);
        $this->query('SELECT * FROM artists ORDER BY create_date DESC');
        $rows= $this->resultSet();
        $post= filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        print_r($post);
        if($post['remove']){
            
            //delete all artist from this artist
            $delete_query="DELETE FROM artists WHERE id=:id ";
            $this->query($delete_query);
            $this->bind(':id',$post['id']);
            $this->execute();
            //delete all albums from this artist
            $delete_albums="DELETE FROM albums WHERE artist=:artist ";
            $this->query($delete_albums);
            $this->bind(':artist',$post['name']);
            $this->execute();
            header('Location: '. ROOT_URL.'artists');
        }
        else if($post['edit']){
            $_SESSION['user_data']['artist_edit']=$post;
            header('Location: '. ROOT_URL.'artists/edit');
        }else if($post['show']){
            
            $_SESSION['user_data']['album']=$post;
            header('Location: '. ROOT_URL.'artists/showAlbums');
        }
        
        return $rows;
    }

    public function add(){
         //Sanitize Post
         $this->query('SELECT * FROM artists ORDER BY create_date DESC');
         $rows= $this->resultSet();
         $post= filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
         //adding artist already in database
         if($post['added']){
            $col=$post['id'];
            //confirm id from added artist and collection name
            if(isset($col) && isset($_SESSION['user_data']['choose']) ){
                $name= $_SESSION['user_data']['choose'];
                //get collection
                $sql1="SELECT * FROM $name";
                $this->query($sql1);
                $collec= $this->resultSet();
                //get albums with artist
                $sql2= "SELECT * FROM albums WHERE artist= :artist_name";
                $this->query($sql2);
                $this->bind(':artist_name',$post['name']);
                $albums=$this->resultSet();
                print_r();
                if($collec && $albums){
                    $c;
                    // comparing albums from artist with collection
                    foreach($albums as $a){
                        foreach($collec as $b){
                            if($a['title']==$b['album_name']){
                                unset($c);
                                break;
                            }else{    
                                $c=$a;
                            }
                        }
                        if($c){
                            //adding album to collection
                            $sql= "INSERT INTO $name ( album_id, album_name, artist_name, album_year_release,tracks ) VALUES(:id, :title ,:artist_name ,:album_year_release, :tracks)";
                            $this->query($sql);
                            $this->bind(':id',$c['id']);
                            $this->bind(':title',$c['title']);
                            $this->bind(':artist_name',$c['artist']);
                            $this->bind(':album_year_release',$c['year_release']);
                            $this->bind(':tracks',$c['tracks_number']);
                            $this->execute();
                            header('Location: '. ROOT_URL.'collections/showCollection');
                        }
                       
                    } 
                }elseif(!!isset($collec)){
                    foreach($albums as $a){
                        $sql= "INSERT INTO $name ( album_id, album_name, artist_name, album_year_release,tracks ) VALUES(:id, :title ,:artist_name ,:album_year_release, :tracks)";
                        $this->query($sql);
                        $this->bind(':id',$a['id']);
                        $this->bind(':title',$a['title']);
                        $this->bind(':artist_name',$a['artist']);
                        $this->bind(':album_year_release',$a['year_release']);
                        $this->bind(':tracks',$a['tracks_number']);
                        $this->execute();

                    }
                    header('Location: '. ROOT_URL.'collections/showCollection');
                }else{
                    Messages::setMsg('None albums added to this artist', 'error');
                    return $rows;
                }
                
            }else{
                // album not added to any collection
                header('Location: '. ROOT_URL.'collections');
             }
        }     
        //
         if($post['submit']){
             //check for empty fields
            if($post['artist_name']=='' || $post['twitter']==''){
                Messages::setMsg('Please fill all fields', 'error');
                return $rows;
              }
            
                //adding new artist
                $this->query('INSERT INTO artists (name, twitter_handle) VALUES(:artist_name, :twitter)' );
                $this->bind(':artist_name',$post['artist_name']);
                $this->bind(':twitter',$post['twitter']);
                $this->execute();
                // artist  added
                if($this->lastInsertId()){
                    header('Location: '. ROOT_URL.'artists');
                }else{
                    //album not added
                    echo 'Album not added';
                }

         }
        return $rows;
    }

    public function edit(){
        
        $post= filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $row=$_SESSION['user_data']['artist_edit'];
        print_r($row);
        if($post['submit']){
                //none value in inputs
                if($post['artist_name']=='' || $post['twitter']==''){
                    Messages::setMsg('Please fill all fields', 'error');
                    return;
                  } 
            //Update artist
            $this->query('UPDATE artists 
            SET name=:artist_name,  twitter_handle=:twitter
            WHERE id= :id'  );           
             $this->bind(':artist_name',$post['artist_name']);
             $this->bind(':twitter',$post['twitter']);
             $this->bind(':id',$row['id']);
             $this->execute();
            //update albums
            $this->query('UPDATE albums 
            SET artist=:artist_name
            WHERE artist= :artist'  ); 
            $this->bind(':artist_name',$post['artist_name']);
            $this->bind(':artist',$row['name']);
            $this->execute();
            header('Location: '. ROOT_URL.'artists');
        }
        return;
    }
    public function showAlbums(){
        $name=$_SESSION['user_data']['album'];
        $sql='SELECT *FROM albums WHERE artist=:artist';
        $this->query($sql);
        $this->bind(':artist',$name['name']);
        $rows=$this->resultSet();
        return $rows;
    }
}