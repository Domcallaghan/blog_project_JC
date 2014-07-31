<?php

    /**
     *
     * @class Post
     * Class Post
     */
    class Post {
        /**
         *
         * @member Post#_message
         * @var string
         */
        private $_message;
        /**
         *
         * @member Post#_user
         * @var string
         */
        private $_user;
        /**
         *
         * @member Post#_date
         * @var date
         */
        private $_date;
        /**
         *
         * @member Post#_title
         * @var string
         */
        private $_title;
        /**
         *
         * @member Post#_id
         * @var int
         */
        private $_id;
        /**
         *
         * @member Post#_status
         * @var int
         */
        private $_status;
        /**
         *
         * @member Post#_mail
         * @var string
         */
        private $_mail;
        /**
         *
         * @member Post#_comment
         * @var int
         */
        private $_comment;
        private $_pros;
        private $_cons;

        /**
         *
         * @construct
         * @param $post_message
         * @param $post_user
         * @param $post_title
         * @param $post_date
         * @param $post_mail
         * @param $post_id
         * @param $post_comment
         * @param $post_pros
         * @param $post_cons
         */
        public function __construct($post_message, $post_user, $post_title, $post_date, $post_mail, $post_id, $post_comment, $post_pros, $post_cons)
		{
			// Secure the post with the htmlspecialchars.
			$this->_message = htmlspecialchars($post_message);
			$this->_user = htmlspecialchars($post_user);
			$this->_title = htmlspecialchars($post_title);
			$this->_id = $post_id;
			$this->_date = $post_date;
            $this->_comment = $post_comment;
            $this->_pros = $post_pros;
            $this->_cons = $post_cons;
			if(empty($post_mail))
			{
				$this->_mail = "";
			}
			else
			{
				$this->_mail = htmlspecialchars($post_mail);
			}

		}

		// GETTERS
        /**
         *
         * @method Post#getTitle
         * @return string
         */
        public function getTitle()
		{
			return $this->_title;
		}

        /**
         *
         * @method Post#getMessage
         * @return string
         */
        public function getMessage()
		{
			return $this->_message;
		}

        /**
         *
         * @method Post#getAuthor
         * @return string
         */
        public function getAuthor()
		{
			return $this->_user;
		}

        /**
         *
         * @method Post#getMail
         * @return string
         */
        public function getMail()
		{
			return $this->_mail;
		}

        /**
         *
         * @method Post#getCount
         * @return int
         */
        public function getCount()
		{
			return $this->_comment;
		}

        /**
         *
         * @method Post#checkMessage
         * @return bool
         */
        public function checkMessage()
		{
			if (strlen($this->_message) <= 300) 
			{
				return true;
			}
			else 
			{
				return false;
			}
		}

        /**
         *
         * @method Post#showMessage
         * @return string
         */
        public function showMessage()
		{
			// TODO |-> Rajouter les pages dynamiques de traitement des likes 

				return "<div class=\"post\"><span id='title_post'>".$this->_title."</span></br><span id='message_post'>".$this->_message."</span></br><span id='user_post'>".$this->_user."
				</span></br><span id='date_post'>".$this->_date."</span>
				</br> Comments :".$this->_comment."
			</br><a href=comment_index.php?id_post=".$this->_id.">You want to comment ?</a>
			&nbsp; <a href='Process/Process_addVote.php?id_post=".$this->_id."&value=".true."'>
			You like (".$this->_pros.")</a>&nbsp;&nbsp;&nbsp;<a href='Process/Process_addVote.php?id_post=".$this->_id."&value=".false."'>You don't like (".$this->_cons.")</a></div>";
			

		}

        /**
         *
         * @method Post#changeStatus
         * @param $newStatus
         */
        public function changeStatus($newStatus)
		{	
			$this->_status = $newStatus;
		}

        /**
         *
         * @method Post#showAdminMessage
         * @return string
         */
        public function showAdminMessage()
		{
			// TODO |-> Rajouter une mise en forme correcte pour les pages

			return "<div class=\"post\"><form method='POST' action='Process/Process_admin_confirmation.php' 
			>".$this->_title."<br /> Message : ".$this->_message."<br /> Login : ".$this->_user."<br /> id - ".$this->_id. " 
			<input hidden name='id_post' value=".$this->_id." /><input type='checkbox' name='valid' value='1'>  <input type='submit' name='Valider' value='Ok' /></form></div>";
		}

        /**
         *
         * @method Post#showOnlyMessageComment
         * @return string
         */
        public function showOnlyMessageComment()
		{
			return "<div class=\"post\">".$this->_title."</br>".$this->_message."</br>".$this->_user."</br>".$this->_date."</br>
			</br></div>";
		}
		
	}
?>