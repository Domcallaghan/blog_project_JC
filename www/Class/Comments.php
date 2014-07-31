<?php

    /**
     *
     * @class Comment
     * Class Comment
     */
    class Comment {
        /**
         *
         * @member Comment#_id
         * @var string
         */
        private $_id;
        /**
         *
         * @member Comment#_text
         * @var string
         */
        private $_text;
        /**
         *
         * @member Comment#_author
         * @var string
         */
        private $_author;

        /**
         *
         * @construct
         * @param $com_text
         * @param $com_author
         * @param $com_id
         */
        public function __construct($com_text, $com_author, $com_id)
        {
                // Secure with the htmlspecialchars.
                $this->_text = htmlspecialchars($com_text);
                $this->_author = htmlspecialchars($com_author);
                $this->_id = htmlspecialchars($com_id);
        }
         // GETTERS
        /**
         *
         * @method Comment#getAuthor
         * @return string
         */
        public function getAuthor ()
        {
            return $this->_author;
        }

        /**
         *
         * @method Comment#getText
         * @return string
         */
        public function getText()
        {
            return $this->_text;
        }

        /**
         *
         * @method Comment#getId
         * @return string
         */
        public function getId()
        {
            return $this->_id;
        }
            // END GETTERS

        /**
         *
         * @method Comment#showMessage
         * @return string
         */
        public function showMessage()
        {
            return "<div class=\"post_comment\">".$this->_text."</br>".$this->_author."</br></br></div>";
        }

        /**
         *
         * @method Comment#checkMessage
         * @return bool
         */
        public function checkMessage()
        {
            if (strlen($this->_text) <= 500)
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
         * @method Comment#showAdminMessage
         * @return string
         */
        public function showAdminMessage()
        {
            return "<div class=\"post_comment\">".$this->_text."</br>".$this->_author." <br /> -- ID -- :".$this->_id."
            <form method='POST' action='Process/Process_admin_confirm_comment.php'><input type='hidden' name='id_to_delete' value=".$this->_id.">
            <input type='submit' name='Supprimer' value='Supprimer' /></form></br></br></div>";
        }
    }

?>