<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class News_model extends CI_Model
{
    public $id;
    public $headline;
	public $headline_cz;
	public $text;
	public $text_cz;
	public $images;
	public $date;
	public $size;
	public $order;
					
    public function __construct()
    { 
        parent::__construct();      
        $this->load->database();    
    }
    
	public function check()
    {
        $query = "SELECT * FROM news WHERE id = '" . $this->id . "'";
        $result = $this->db->query($query);
        if($result->num_rows() == 0)
            return true;
        else
            return false;
    }
	
    
    public function _create_array()
    {
        $array = array(
            'id' => $this->id,
            'headline' => $this->headline,
            'text' => $this->text,
            'images' => $this->images
        );  
        return $array;   
    }

	
	public function get_all_objects_by_id($id)
    {                                 
        $query = "SELECT * FROM news_images WHERE id_news = ".$id;
        $q = $this->db->query($query);

        if($q->num_rows()>0)
        {
            foreach($q->result() as $row)
            {
                $data[] = $row;
            }
            return $data;
        }    
        else
        {
            return null;
        }
    }
		
		
	
	public function get_all()
    {                                 
        $query = "SELECT *, date(date) as date FROM news n ORDER BY n.date DESC";
        $q = $this->db->query($query);

        if($q->num_rows()>0) {
            foreach($q->result() as $row)
            {
            	$row->images = $this->get_all_objects_by_id($row->id);
                $data[] = $row;
            }
			return $data;
		} else {
            return null;
        }
    }
	
	public function get_all_cz()
    {                                 
        $query = "SELECT id,headline_cz AS `headline`,text_cz AS `text`,date(date) as date,size FROM news ORDER BY date DESC";
        $q = $this->db->query($query);

        if($q->num_rows()>0) {
            foreach($q->result() as $row)
            {
            	$row->images = $this->get_all_objects_by_id($row->id);
                $data[] = $row;
            }
			return $data;
		} else {
            return null;
        }
    }
    
	
	public function get_by_id($id)
    {                                 
        $query = "SELECT * FROM news WHERE id=".$id;
        $q = $this->db->query($query);

        if($q->num_rows()>0)
        {
            foreach($q->result() as $row)
            {
            	$row->images = $this->get_all_objects_by_id($row->id);
                $data[] = $row;
            }
			
            return $data;
        }    
        else
        {
            return null;
        }
    }
	
}
?>