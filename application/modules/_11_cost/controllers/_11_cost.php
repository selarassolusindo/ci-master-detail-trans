<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class _11_cost extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('_11_cost_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . '_11_cost/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . '_11_cost/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . '_11_cost/index.html';
            $config['first_url'] = base_url() . '_11_cost/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->_11_cost_model->total_rows($q);
        $_11_cost = $this->_11_cost_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            '_11_cost_data' => $_11_cost,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('_11_cost/t11_cost_list', $data);
    }

    public function read($id)
    {
        $row = $this->_11_cost_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idcost' => $row->idcost,
		'Kode' => $row->Kode,
		'Nama' => $row->Nama,
		'idakun' => $row->idakun,
		'created_at' => $row->created_at,
		'updated_at' => $row->updated_at,
	    );
            $this->load->view('_11_cost/t11_cost_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_11_cost'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('_11_cost/create_action'),
	    'idcost' => set_value('idcost'),
	    'Kode' => set_value('Kode'),
	    'Nama' => set_value('Nama'),
	    'idakun' => set_value('idakun'),
	    'created_at' => set_value('created_at'),
	    'updated_at' => set_value('updated_at'),
	);
        $this->load->view('_11_cost/t11_cost_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'Kode' => $this->input->post('Kode',TRUE),
		'Nama' => $this->input->post('Nama',TRUE),
		'idakun' => $this->input->post('idakun',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
		'updated_at' => $this->input->post('updated_at',TRUE),
	    );

            $this->_11_cost_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('_11_cost'));
        }
    }

    public function update($id)
    {
        $row = $this->_11_cost_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('_11_cost/update_action'),
		'idcost' => set_value('idcost', $row->idcost),
		'Kode' => set_value('Kode', $row->Kode),
		'Nama' => set_value('Nama', $row->Nama),
		'idakun' => set_value('idakun', $row->idakun),
		'created_at' => set_value('created_at', $row->created_at),
		'updated_at' => set_value('updated_at', $row->updated_at),
	    );
            $this->load->view('_11_cost/t11_cost_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_11_cost'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idcost', TRUE));
        } else {
            $data = array(
		'Kode' => $this->input->post('Kode',TRUE),
		'Nama' => $this->input->post('Nama',TRUE),
		'idakun' => $this->input->post('idakun',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
		'updated_at' => $this->input->post('updated_at',TRUE),
	    );

            $this->_11_cost_model->update($this->input->post('idcost', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('_11_cost'));
        }
    }

    public function delete($id)
    {
        $row = $this->_11_cost_model->get_by_id($id);

        if ($row) {
            $this->_11_cost_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('_11_cost'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_11_cost'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('Kode', 'kode', 'trim|required');
	$this->form_validation->set_rules('Nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('idakun', 'idakun', 'trim|required');
	$this->form_validation->set_rules('created_at', 'created at', 'trim|required');
	$this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');

	$this->form_validation->set_rules('idcost', 'idcost', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t11_cost.xls";
        $judul = "t11_cost";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kode");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Idakun");
	xlsWriteLabel($tablehead, $kolomhead++, "Created At");
	xlsWriteLabel($tablehead, $kolomhead++, "Updated At");

	foreach ($this->_11_cost_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Kode);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Nama);
	    xlsWriteNumber($tablebody, $kolombody++, $data->idakun);
	    xlsWriteLabel($tablebody, $kolombody++, $data->created_at);
	    xlsWriteLabel($tablebody, $kolombody++, $data->updated_at);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t11_cost.doc");

        $data = array(
            't11_cost_data' => $this->_11_cost_model->get_all(),
            'start' => 0
        );

        $this->load->view('_11_cost/t11_cost_doc',$data);
    }

    public function getCost()
	{
		$datacost = $this->_11_cost_model->getCost(); // $this->model->get_title($this->input->get('q', TRUE));

		echo json_encode((object)[
			'items' => $datacost
		]);
	}

}

/* End of file _11_cost.php */
/* Location: ./application/controllers/_11_cost.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-02-23 23:30:44 */
/* http://harviacode.com */
