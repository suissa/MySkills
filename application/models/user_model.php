<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of user_model
 *
 * @author Tiago Perrelli <tiago.perrelli at www.naips.com.br>
 */
class User_model extends CI_Model {

    private $table;

    public function __construct() {

        parent::__construct();

        $this->table = 'user';
    }

    public function insertUser($data) {

        $this->db->trans_start();

        $this->db->insert($this->table, $data);

        $this->db->trans_complete();
        
        return $this->db->insert_id();
    }

    public function loadUser($data) {

        $result = array();
        
        $this->db->select('id_user, created, email');
        
        if (isset($data['fbuid']) && !empty($data['fbuid'])) {
            $this->db->where('fbuid', $data['fbuid']);
        }
        
        if (isset($data['company']) && !empty($data['company'])) {
            
            $this->db->join('company', 'company.id_company=user.id_company', 'INNER');
            $this->db->where('lower(company.name)', $data['company']);
        }

        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            $result = $query->result_object();
        }

        return $result;
    }

}

?>