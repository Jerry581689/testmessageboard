<?php


namespace App;


class Message
{
	private  $id;

	private  $author;

	private  $liuyan;

	private  $time;

	/**
	 * @return mixed
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param mixed $id
	 */
	public function setId($id)
	{
		$this->id = $id;
	}

	/**
	 * @return mixed
	 */
	public function getAuthor()
	{
		return $this->author;
	}

	/**
	 * @param mixed $author
	 */
	public function setAuthor($author)
	{
		$this->author = $author;
	}

	/**
	 * @return mixed
	 */
	public function getLiuyan()
	{
		return $this->liuyan;
	}

	/**
	 * @param mixed $liuyan
	 */
	public function setLiuyan($liuyan)
	{
		$this->liuyan = $liuyan;
	}

	/**
	 * @return mixed
	 */
	public function getTime()
	{
		return $this->time;
	}

	/**
	 * @param mixed $time
	 */
	public function setTime($time)
	{
		$this->time = $time;
	}

}
