<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of course_model
 *
 * @author Tiago Perrelli <tiago.perrelli at www.naips.com.br>
 */
class Course_model extends CI_Model {

    private $table;

    public function __construct() {
        parent::__construct();

        $this->table = 'courses';
    }

    public function listCourses() {

        $result = array();

        $this->db->select('id_course, title, created, description');
             
        $this->db->order_by('created', 'DESC');

        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            $result = $query->result_object();
        }

        return $result;
    }

    public function listCoursesApplied($idUser) {

        $result = array();
        
        $this->db->select('id_user, id_course');
        $this->db->where('id_user', $idUser);

        $query = $this->db->get('courses_user');

        if ($query->num_rows() > 0) {
            $result = $query->result_object();
        }

        return $result;
    }

    public function insertCourseProfessional($data = array()) {

        $this->db->trans_start();
        $this->db->insert('courses_user', $data);
        $this->db->trans_complete();
    }

}

?>
