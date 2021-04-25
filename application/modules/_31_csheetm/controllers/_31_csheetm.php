<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class _31_csheetm extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('_31_csheetm_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '_31_csheetm/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . '_31_csheetm/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . '_31_csheetm/index.html';
            $config['first_url'] = base_url() . '_31_csheetm/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->_31_csheetm_model->total_rows($q);
        $_31_csheetm = $this->_31_csheetm_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            '_31_csheetm_data' => $_31_csheetm,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('_31_csheetm/t31_csheetm_list', $data);
    }

    public function read($id) 
    {
        $row = $this->_31_csheetm_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idcsheetm' => $row->idcsheetm,
		'NoCSheet' => $row->NoCSheet,
		'TglCSheet' => $row->TglCSheet,
		'idjo' => $row->idjo,
	    );
            $this->load->view('_31_csheetm/t31_csheetm_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_31_csheetm'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('_31_csheetm/create_action'),
	    'idcsheetm' => set_value('idcsheetm'),
	    'NoCSheet' => set_value('NoCSheet'),
	    'TglCSheet' => set_value('TglCSheet'),
	    'idjo' => set_value('idjo'),
	);
        $this->load->view('_31_csheetm/t31_csheetm_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'NoCSheet' => $this->input->post('NoCSheet',TRUE),
		'TglCSheet' => $this->input->post('TglCSheet',TRUE),
		'idjo' => $this->input->post('idjo',TRUE),
	    );

            $this->_31_csheetm_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('_31_csheetm'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->_31_csheetm_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('_31_csheetm/update_action'),
		'idcsheetm' => set_value('idcsheetm', $row->idcsheetm),
		'NoCSheet' => set_value('NoCSheet', $row->NoCSheet),
		'TglCSheet' => set_value('TglCSheet', $row->TglCSheet),
		'idjo' => set_value('idjo', $row->idjo),
	    );
            $this->load->view('_31_csheetm/t31_csheetm_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_31_csheetm'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idcsheetm', TRUE));
        } else {
            $data = array(
		'NoCSheet' => $this->input->post('NoCSheet',TRUE),
		'TglCSheet' => $this->input->post('TglCSheet',TRUE),
		'idjo' => $this->input->post('idjo',TRUE),
	    );

            $this->_31_csheetm_model->update($this->input->post('idcsheetm', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('_31_csheetm'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->_31_csheetm_model->get_by_id($id);

        if ($row) {
            $this->_31_csheetm_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('_31_csheetm'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_31_csheetm'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('NoCSheet', 'nocsheet', 'trim|required');
	$this->form_validation->set_rules('TglCSheet', 'tglcsheet', 'trim|required');
	$this->form_validation->set_rules('idjo', 'idjo', 'trim|required');

	$this->form_validation->set_rules('idcsheetm', 'idcsheetm', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t31_csheetm.xls";
        $judul = "t31_csheetm";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "NoCSheet");
	xlsWriteLabel($tablehead, $kolomhead++, "TglCSheet");
	xlsWriteLabel($tablehead, $kolomhead++, "Idjo");

	foreach ($this->_31_csheetm_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->NoCSheet);
	    xlsWriteLabel($tablebody, $kolombody++, $data->TglCSheet);
	    xlsWriteNumber($tablebody, $kolombody++, $data->idjo);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t31_csheetm.doc");

        $data = array(
            't31_csheetm_data' => $this->_31_csheetm_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('_31_csheetm/t31_csheetm_doc',$data);
    }

}

/* End of file _31_csheetm.php */
/* Location: ./application/controllers/_31_csheetm.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-02-23 23:30:57 */
/* http://harviacode.com */