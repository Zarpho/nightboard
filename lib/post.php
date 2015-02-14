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
	private $edittotal; // Total times post has been edited
	
	function __construct($postid)
	{
		$this->id = $postid;
		$this->update();
	}
	
	function update()
	{
		// Connect to MySQL
		// Set all other variables based on $id
	}
}

?>