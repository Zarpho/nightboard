<?php

/* :: Nightboard ::
 * 
 * FILENAME:    lib/post.php
 * AUTHOR(S):   Joey Miller ("Zarpho")
 * DESCRIPTION: Contains data for the Post class.
 */

class Post
{
	private $id;        // Post ID number
	private $authorid;  // Post author ID number
	private $topicid;   // Parent topic ID number
	private $message;   // Message content
	private $time;      // Time of posting
	private $edittime;  // Most recent time of editing (unset unless post has been edited)
	private $edittotal; // Total times post has been edited (unset unless post has been edited)
	
	/* Constructor method, takes result of mysql_fetch_assoc */
	function __construct($post)
	{
		$this->id       = $post["id"];
		$this->username = $post["authorid"];
		$this->password = $post["topicid"];
		$this->realname = $post["message"];
		$this->website  = $post["time"];
		$this->realname = $post["edittime"];
		$this->website  = $post["edittotal"];
	}
	
	function update()
	{
		// Connect to MySQL
		// Set all other variables based on $id
	}
}

?>