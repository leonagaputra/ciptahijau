<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages_model extends CI_Model{

    var $table = "hdrpages";

    public function __construct()
    {
        parent::__construct();
    }

    public function get($table = NULL, $data = NULL, $single = FALSE, $count = FALSE, $limit = NULL, $start = NULL, $order = NULL, $desc = FALSE)
    {
        $ttable = $this->table;
        if($table != NULL){
            $ttable = $table;
        }
        if($count) $this->db->select('count(VCREA) as cnt');
        $this->db->from($ttable);

        if($data != NULL)
        {
            foreach($data as $key=>$val)
            {
                $this->db->like($key, $val);
            }
        }

        if($order)
        {
            $descending = $desc ? "desc" : "asc";
            $this->db->order_by($order, $descending);
        }
        else
            $this->db->order_by('DCREA');
        if($limit)
        {
            $this->db->limit($limit, $start);
        }

        if($query = $this->db->get())
        {
            if($query->num_rows() > 0)
            {
                if($single)return $query->row();
                else return $query->result();
            }
        }
        return FALSE;
    }  

    public function update($id, $data, $table = NULL, $dtl_id = NULL, $hdrfield = NULL, $dtlfield = NULL)
    {
        if($hdrfield == NULL)
            $this->db->where('HDRPAGES_ID', $id);
        else
            $this->db->where($hdrfield, $id);
        $table2 = $table == NULL ? $this->table : $table;
        if($dtl_id != NULL) {
            if($dtlfield == NULL)
                $this->db->where('DTLPAGES_ID', $dtl_id);
            else 
                $this->db->where($dtlfield, $dtl_id);
        }
        $this->db->update($table2, $data);
        return $id;
    }
    
    function insert($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

}