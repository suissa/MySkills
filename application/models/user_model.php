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

    public function updatesUser($data) {

        $fbuid = $data['fbuid'];

        $this->db->trans_start();

        $this->db->where('fbuid', $fbuid);

        $this->db->update($this->table, $data);

        $this->db->trans_complete();
    }

    public function loadUser($data) {

        $result = array();
        
        $this->db->select('user.id_user, user.created, user.email, user.video_url, user.id_profile,user.name, user.fbuid');

        if (isset($data['fbuid']) && !empty($data['fbuid'])) {

            $this->db->where('user.fbuid', $data['fbuid']);
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

    public function updateUser($data = array()) {

        $this->db->trans_start();

        $idUser = (int) $data['id_user'];
        unset($data['id_user']);

        $this->db->where('id_user', $idUser);

        $this->db->update($this->table, $data);

        $this->db->trans_complete();
    }

    public function loadUserOfFacebookId($fbuid) {

        $result = array();

        $this->db->select('id_user, created, email, id_profile');
        $this->db->where('fbuid', $fbuid);

        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            $result = $query->result_object();
        }

        return $result;
    }

    public function loadUserOfUserId($userid) {

        $result = array();

        $this->db->select('fbuid, created, email, name');
        $this->db->where('id_user', $userid);

        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            $result = $query->result_object();
        }

        return $result;
    }

    public function listUsers() {

        $result = array();
        $Profile = array('2');
        $this->db->select('id_user, fbuid, points, created, name');
        $this->db->where('published', "1");
        //$this->db->where('id_profile', "is null");
        $this->db->where_not_in('id_profile', $Profile);
        $this->db->order_by('points', 'DESC');
        $this->db->order_by('created', 'DESC');

        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            $result = $query->result_object();
        }

        return $result;
    }

    public function listProfessionals() {

        $result = array();

        $this->db->select('id_user as id_professional, fbuid, points, created, name');
        $this->db->where('id_profile', 1);
        $this->db->order_by('points', 'DESC');

        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            $result = $query->result_object();
        }

        return $result;
    }

}

?>
