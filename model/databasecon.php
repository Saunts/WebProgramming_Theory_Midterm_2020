<?php
                class database{

                    var $host = "localhost";
					var $username = "kuromyid_pemwebuts";
					var $password = "123456";
					var $dbname = "kuromyid_pemwebuts";
                    var $db;

                    function __construct()
                    {   
                        $this->db = mysqli_connect($this->host, $this->username, $this->password, $this->dbname);
						
					}

                    function showstatus()
                    {
						$hasil = [];
                        $data = mysqli_query($this->db, "SELECT * FROM status LEFT JOIN userprofile ON (status.userid = userprofile.userid);");
                        while($d = mysqli_fetch_array($data)){
                            $hasil[] = $d;
                        }
						return $hasil;
                    }
					
					function getfriend($id)
                    {
                        $data = mysqli_query($this->db, "SELECT * FROM userprofile where userid = $id;");
                        $d = mysqli_fetch_array($data);
                        return $d;
                    }

                    function newstatus($userid, $status)
                    {
						mysqli_query($this->db, "INSERT INTO status(userid, status) VALUES($userid, '$status');");
                    }

					public function query($thequery)
					{
						$data = mysqli_query($this->db, $thequery);
                        $d = mysqli_fetch_array($data);
						return $d;
					}
		
                    function deletestatus($id)
                    {
                        mysqli_query($this->db, "DELETE FROM status WHERE statusid= '$id'");
                    }
					
					function unfriend($userid, $friendid)
                    {
                        mysqli_query($this->db, "DELETE FROM friendlist WHERE friendid=$friendid && userid=$userid");
                    }
					
					function showfriend($id)
					{
						$data = mysqli_query($this->db, "select * from friendlist as f left outer join userprofile as up on f.friendid = up.userid where f.userid = 2");
                        if(mysqli_num_rows($data) == 0) {
							return null;
						}
						while($d = mysqli_fetch_array($data)){
                            $hasil[] = $d;
                        }
						return $hasil;
					}
					
					function friend($userid, $friendid)
					{
						
						mysqli_query($this->db, "INSERT INTO friendlist VALUES($userid,$friendid);");
					}
					
					function getuserdata($id)
					{
						$res = mysqli_query($this->db,"SELECT * FROM userprofile where userid='$id';");
						$res = mysqli_fetch_array($res);
						return $res;
					}
					
					function getindivstatus($id){
						$data = mysqli_query($this->db, "SELECT * FROM status LEFT OUTER JOIN userprofile on status.userid = userprofile.userid where status.statusid = $id;");
                        $data = mysqli_fetch_array($data);
						return $data;
					}	
					
					function showreplies()
                    {
                        $data = mysqli_query($this->db, "SELECT * FROM replies LEFT JOIN userprofile ON (replies.userid = userprofile.userid);");
						if($data == null) return 0;
						$hasil = [];
                        while($d = mysqli_fetch_array($data)){
                            $hasil[] = $d;
                        }
						return $hasil;
                    }
					
					function newreply($parentid, $userid, $reply)
                    {
						mysqli_query($this->db, "INSERT INTO replies(parentid, userid, replies) VALUES($parentid, $userid, '$reply');");
                    }
					
					function deletereply($id)
                    {
                        mysqli_query($this->db, "DELETE FROM replies WHERE replyid= '$id'");
                    }
					
            }
?>