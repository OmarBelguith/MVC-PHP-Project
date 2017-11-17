<?php
class ShareModel extends Model{
	public function Index(){
		$this->query('SELECT * FROM Share ORDER BY create_date DESC');
		$rows = $this->resultSet();
		return $rows;
	}

	public function add(){
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		if($post['submit']){
		    //Verify Fields
            if($post['title']=='' || $post['body'] == '' || $post['link'] == ''){
                Messages::setMsg('Empty Fields', 'error');
                return;
            }
			// Insert into MySQL
			$this->query('INSERT INTO Share (title, body, link, user_id) VALUES(:title, :body, :link, :user_id)');
			$this->bind(':title', $post['title']);
			$this->bind(':body', $post['body']);
			$this->bind(':link', $post['link']);
			$this->bind(':user_id', 1);
			$this->execute();
			// Verify
			if($this->lastInsertId()){
				// Redirect
				header('Location: '.ROOT_URL.'shares');
			}
		}
		return;
	}
}