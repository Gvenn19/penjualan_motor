<?php
defined('BASEPATH') or exit ('NO Direct Script Access Allowed');

class Admin extends CI_Controller{
	function __construct(){
		parent::__construct();

		// load libary pdf
        $this->load->library('pdf');

		// cek login
		if($this->session->userdata('status') != "login"){
			$alert=$this->session->set_flashdata('alert', 'Anda belum Login');
			redirect(base_url());
		}
	}

	function index(){
		//menampilkan data dalam dashboard
		$data['motor'] = $this->db->query("select * from motor order by kode_motor desc limit 10")->result();
		$data['pembeli'] = $this->db->query("select * from pembeli order by id_ktp desc limit 10")->result();
		$data['trx_cash'] = $this->db->query("select * from trx_cash order by kode_trx desc limit 10")->result();
		$data['user'] = $this->m_penjualan->get_data('user');

		$this->load->view('admin/header');
		$this->load->view('admin/index',$data);
		$this->load->view('admin/footer');
	}

	function logout(){
		//menghapus session setelah logout
		$this->session->sess_destroy();
		//menampilkan pesan logout
		redirect(base_url().'home?pesan=logout');
	}

	function ganti_password(){
		$this->load->view('admin/header');
		$this->load->view('admin/ganti_password');
		$this->load->view('admin/footer');
	}

	function ganti_password_act(){
		//variabel untuk password baru
		$pass_baru = $this->input->post('pass_baru');
		$ulang_pass = $this->input->post('ulang_pass');

		$this->form_validation->set_rules('pass_baru','Password Baru','required|matches[ulang_pass]');
		$this->form_validation->set_rules('ulang_pass','Ulangi Password Baru','required');
		if($this->form_validation->run() != false){
			$data = array('password' => md5($pass_baru));
			$w = array('id_user' => $this->session->userdata('id'));
			$this->m_penjualan->update_data($w,$data,'user');
			redirect(base_url().'admin/ganti_password?pesan=berhasil');
		}else if($pass_baru != $ulang_pass){
			$this->session->set_flashdata('alert','Password yang anda masukan tidak sama');
			redirect(base_url().'admin/ganti_password?pesan=gagal');
		}else{
			$this->load->view('admin/header');
			$this->load->view('admin/ganti_password');
			$this->load->view('admin/footer');
		}
	}

	function motor(){
		$data['motor'] = $this->m_penjualan->get_data('motor')->result();
		$this->load->view('admin/header');
		$this->load->view('admin/data_motor',$data);
		$this->load->view('admin/footer');
	}

	function tambah_motor(){
		//membuat kode unik otomatis untuk ditampilkan di halaman tambah_motor
		$unik = "MK";
		$data['kodeunik'] = $this->m_penjualan->kode_otomatis($unik);
		//
		$data['motor'] =$this->m_penjualan->get_data('motor')->result();
		//
		$this->load->view('admin/header');
		$this->load->view('admin/tambah_motor',$data);
		$this->load->view('admin/footer');
	}

	function tambah_motor_act(){
		$kode_motor = $this->input->post('kode_motor');
		$jenis_motor = $this->input->post('jenis_motor');
		$merk_motor = $this->input->post('merk_motor');
		$nama_motor = $this->input->post('nama_motor');
		$tahun_motor = $this->input->post('tahun_motor');
		$warna_motor = $this->input->post('warna_motor');
		$kondisi_motor = $this->input->post('kondisi_motor');
		$harga_motor = $this->input->post('harga_motor');
		$this->form_validation->set_rules('kode_motor','Kode','required');
		$this->form_validation->set_rules('jenis_motor','Jenis Motor','required');
		$this->form_validation->set_rules('merk_motor','Merk Motor','required');
		$this->form_validation->set_rules('nama_motor','Nama Motor','required');
		$this->form_validation->set_rules('tahun_motor','Tahun Motor','required');
		$this->form_validation->set_rules('kondisi_motor','Kondisi Motor','required');
		$this->form_validation->set_rules('harga_motor','Harga Motor','required');

		if($this->form_validation->run() != false){
			//configurasi upload gambar
			$config['upload_path'] = './assets/upload/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = '2048';
			$config['file_name'] = 'gambar_motor'.time();

			$this->load->library('upload', $config);

			if($this->upload->do_upload('foto')){
				$image=$this->upload->data();

				$data = array(
					'kode_motor' => $kode_motor,
					'jenis_motor' => $jenis_motor,
					'merk_motor' => $merk_motor,
					'nama_motor' => $nama_motor,
					'tahun_motor' => $tahun_motor,
					'warna_motor' => $warna_motor,
					'kondisi_motor' => $kondisi_motor,
					'harga_motor' => $harga_motor,
					'gambar_motor' => $image['file_name'],
					'status_motor' => 0
				);

				$this->m_penjualan->insert_data($data,'motor');
				redirect(base_url().'admin/motor');
			}else{
				$this->session->set_flashdata('alert', 'Anda Belum Memilih Foto');
			}
		}else{
			$this->load->view('admin/header');
			$this->load->view('admin/tambah_motor');
			$this->load->view('admin/footer');
		}
	}

	function edit_motor($kode_motor){
		//mengambil kode_motor sebagai acuan pengambilan data di halaman edit_motor
		$where = array('kode_motor' => $kode_motor);
		$data['motor'] =$this->m_penjualan->edit_data($where,'motor')->result();

		$this->load->view('admin/header');
		$this->load->view('admin/edit_motor',$data);
		$this->load->view('admin/footer');
	}

	function update_motor(){
		$kode_motor = $this->input->post('kode_motor');
		$jenis_motor = $this->input->post('jenis_motor');
		$merk_motor = $this->input->post('merk_motor');
		$nama_motor = $this->input->post('nama_motor');
		$tahun_motor = $this->input->post('tahun_motor');
		$warna_motor = $this->input->post('warna_motor');
		$kondisi_motor = $this->input->post('kondisi_motor');
		$harga_motor = $this->input->post('harga_motor');
		$status_motor = $this->input->post('status_motor');
		$this->form_validation->set_rules('kode_motor','Kode','required');
		$this->form_validation->set_rules('jenis_motor','Jenis Motor','required');
		$this->form_validation->set_rules('merk_motor','Merk Motor','required');
		$this->form_validation->set_rules('nama_motor','Nama Motor','required');
		$this->form_validation->set_rules('tahun_motor','Tahun Motor','required');
		$this->form_validation->set_rules('kondisi_motor','Kondisi Motor','required');
		$this->form_validation->set_rules('harga_motor','Harga Motor','required');

		if($this->form_validation->run() != false){
			$config['upload_path'] = './assets/upload/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = '2048';
			$config['file_name'] = 'gambar_motor'.time();

			$this->load->library('upload', $config);

			$where = array('kode_motor' => $kode_motor);
			$data = array(
				'jenis_motor' => $jenis_motor,
				'merk_motor' => $merk_motor,
				'nama_motor' => $nama_motor,
				'tahun_motor' => $tahun_motor,
				'warna_motor' => $warna_motor,
				'kondisi_motor' => $kondisi_motor,
				'harga_motor' => $harga_motor,
				'gambar_motor' => $image['file_name'],
				'status_motor' => $status_motor
			);

			if($this->upload->do_upload('foto')){
			    //proses upload gambar
			  $image = $this->upload->data();
			  unlink('assets/upload/'.$this->input->post('old_pict', TRUE));
		      $data['gambar_motor'] = $image['file_name'];

			  $this->m_penjualan->update_data($where, $data,'motor');
			}else {
			  $this->m_penjualan->update_data($where, $data,'motor');
			}

			$this->m_penjualan->update_data($where,$data,'motor');
			redirect(base_url().'admin/motor');
		}else{
			$where = array('kode_motor' => $kode_motor);
			$data['motor'] =$this->m_penjualan->edit_data($where,'motor')->result();
			$this->load->view('admin/header');
			$this->load->view('admin/edit_motor',$data);
			$this->load->view('admin/footer');
		}
	}

	function hapus_motor($kode_motor){
		$where = array('kode_motor' => $kode_motor);
		$this->m_penjualan->delete_data($where,'motor');
		redirect(base_url().'admin/motor');
	}

	function pembeli(){
		//memuat data pembeli dalam halaman data_pembeli
		$data['pembeli'] = $this->m_penjualan->get_data('pembeli')->result();
		$this->load->view('admin/header');
		$this->load->view('admin/data_pembeli',$data);
		$this->load->view('admin/footer');
	}

	function tambah_pembeli(){
		//memuat data pembeli untuk ditampilkan dalam halaman tambah_pembeli
		$data['pembeli'] =$this->m_penjualan->get_data('pembeli')->result();

		$this->load->view('admin/header');
		$this->load->view('admin/tambah_pembeli',$data);
		$this->load->view('admin/footer');
	}


	function tambah_pembeli_act(){
		//aksi saat menambah data pembeli
		$id_ktp = $this->input->post('id_ktp');
		$nama_pembeli = $this->input->post('nama_pembeli');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$alamat_pembeli = $this->input->post('alamat_pembeli');
		$telp_pembeli = $this->input->post('telp_pembeli');
		$hp_pembeli = $this->input->post('hp_pembeli');
		$this->form_validation->set_rules('id_ktp', 'No. KTP', 'required');
		$this->form_validation->set_rules('nama_pembeli','Nama Pembeli','required');
		$this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required');
		$this->form_validation->set_rules('alamat_pembeli','Alamat','required');
		if($this->form_validation->run() != false){
			$data = array(
				'id_ktp' => $id_ktp,
				'nama_pembeli' => $nama_pembeli,
				'jenis_kelamin' => $jenis_kelamin,
				'alamat_pembeli' => $alamat_pembeli,
				'telp_pembeli' => $telp_pembeli,
				'hp_pembeli' => $hp_pembeli
			);
			$this->m_penjualan->insert_data($data,'pembeli');
			redirect(base_url().'admin/pembeli');
		}else{
			$this->load->view('admin/header');
			$this->load->view('admin/tambah_pembeli');
			$this->load->view('admin/footer');
		}
	}

	function edit_pembeli($id_ktp){
		$where = array('id_ktp' => $id_ktp);
		$data['pembeli'] = $this->m_penjualan->edit_data($where,'pembeli')->result();

		$this->load->view('admin/header');
		$this->load->view('admin/edit_pembeli',$data);
		$this->load->view('admin/footer');
	}

	function update_pembeli(){
		//menyimpan aksi untuk edit data pembeli
		$id_ktp = $this->input->post('id_ktp');
		$nama_pembeli = $this->input->post('nama_pembeli');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$alamat_pembeli = $this->input->post('alamat_pembeli');
		$telp_pembeli = $this->input->post('telp_pembeli');
		$hp_pembeli = $this->input->post('hp_pembeli');
		$this->form_validation->set_rules('id_ktp', 'No. KTP', 'required');
		$this->form_validation->set_rules('nama_pembeli','Nama Pembeli','required');
		$this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required');
		$this->form_validation->set_rules('alamat_pembeli','Alamat','required');
		if($this->form_validation->run() != false){
			$where = array('id_ktp' => $id_ktp);
			$data = array(
				'nama_pembeli' => $nama_pembeli,
				'jenis_kelamin' => $jenis_kelamin,
				'alamat_pembeli' => $alamat_pembeli,
				'telp_pembeli' => $telp_pembeli,
				'hp_pembeli' => $hp_pembeli
			);
			$this->m_penjualan->update_data($where,$data,'pembeli');
			redirect(base_url().'admin/pembeli');
		}else{
			$where = array('id_ktp' => $id_ktp);
			$data['pembeli'] = $this->m_penjualan->edit_data($where,'pembeli')->result();
			$this->load->view('admin/header');
			$this->load->view('admin/edit_pembeli',$data);
			$this->load->view('admin/footer');
		}
	}

	function hapus_pembeli($id_ktp){
		//menghapus data pembeli
		$where = array('id_ktp' => $id_ktp);
		$this->m_penjualan->delete_data($where,'pembeli');
		redirect(base_url().'admin/pembeli');
	}

	function transaksi(){
		//menampilkan data transaksi
		$data['motor'] = $this->m_penjualan->get_data('motor')->result();
		$data['pembeli'] = $this->m_penjualan->get_data('pembeli')->result();
		$data['trx_cash'] = $this->db->query("select * from trx_cash as t, pembeli as p, motor as m where t.id_ktp = p.id_ktp and t.kode_motor = m.kode_motor")->result();

		$this->load->view('admin/header');
		$this->load->view('admin/data_transaksi',$data);
		$this->load->view('admin/footer');
	}

	function tambah_transaksi(){

		//membuat kode unik untuk transaksi
		$unik_trx = "CC";
		$data['kode_unik_trx'] = $this->m_penjualan->kode_otomatis_trx($unik_trx);
		$data['pembeli'] = $this->m_penjualan->get_data('pembeli')->result();
		$where = array('status_motor' => 0);
		$data['motor'] = $this->m_penjualan->edit_data($where,'motor')->result();
		$data['trx_cash'] = $this->m_penjualan->get_data('trx_cash')->result();

		$this->load->view('admin/header');
		$this->load->view('admin/tambah_transaksi',$data);
		$this->load->view('admin/footer');
	}

	function tambah_transaksi_act(){
		//membuat aksi setelah menyimpan inputan transaksi
		$kode_trx = $this->input->post('kode_trx');
		$id_ktp = $this->input->post('id_ktp');
		$kode_motor = $this->input->post('kode_motor');
		$tgl_trx = $this->input->post('tgl_trx');
		$cash_harga = $this->input->post('cash_harga');
		$this->form_validation->set_rules('kode_trx', 'Kode Transaksi', 'required');
		$this->form_validation->set_rules('id_ktp', 'ID Pembeli', 'required');
		$this->form_validation->set_rules('kode_motor', 'Kode Motor', 'required');
		$this->form_validation->set_rules('tgl_trx', 'Tgl Transaksi', 'required');
		$this->form_validation->set_rules('cash_harga', 'Jumlah Bayar', 'required');

		if($this->form_validation->run() != false){
			$data = array(
			'kode_trx' => $kode_trx,
			'id_ktp' => $id_ktp,
			'kode_motor' => $kode_motor,
			'tgl_trx' => $tgl_trx,
			'cash_harga' => $cash_harga
			);

			$this->m_penjualan->insert_data($data,'trx_cash');

			// update status motor dalam tabel motor
			$status = array('status_motor' => '1');
			$w = array('kode_motor' => $kode_motor);
			$this->m_penjualan->update_data($w,$status,'motor');

			redirect(base_url().'admin/transaksi');
		}else{
			//membuat kode unik transaksi
			$unik_trx = "CC";
			$data['kode_unik_trx'] = $this->m_penjualan->kode_otomatis_trx($unik_trx);
			//memanggil tabel yang diperlukan dalam transaksi
			$data['pembeli'] = $this->m_penjualan->get_data('pembeli')->result();
			$where = array('status_motor' => 0);
			$data['motor'] = $this->m_penjualan->edit_data($where,'motor')->result();
			$data['trx_cash'] = $this->m_penjualan->get_data('trx_cash')->result();

			$this->load->view('admin/header');
			$this->load->view('admin/tambah_transaksi',$data);
			$this->load->view('admin/footer');
		}
	}

	function hapus_transaksi($kode_trx){
		//mencari data dengan kode transaksi sebagai acuannya
		$where = array('kode_trx' => $kode_trx);
		$data = $this->m_penjualan->edit_data($where,'trx_cash')->row();
		//mengubah data status kode motor menjadi tersedia, dengan kode motor sebagai acuannya
		$wmotor = array('kode_motor' => $data->kode_motor);
		$datam = array('status_motor' => '0');
		$this->m_penjualan->update_data($wmotor,$datam,'motor');
		//menghapus data transaksi yang dipilih berdasarkan kode transaksi yang dicari
		$this->m_penjualan->delete_data($where,'trx_cash');
		redirect(base_url().'admin/transaksi');
	}

	function tambah_pembeli_baru(){
		//memuat data pembeli untuk ditampilkan dalam halaman tambah_pembeli
		$data['pembeli'] =$this->m_penjualan->get_data('pembeli')->result();

		$this->load->view('admin/header');
		$this->load->view('admin/tambah_pembeli_baru',$data);
		$this->load->view('admin/footer');
	}

	function tambah_pembeli_baru_act(){
		//aksi saat menambah data pembeli baru
		$id_ktp = $this->input->post('id_ktp');
		$nama_pembeli = $this->input->post('nama_pembeli');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$alamat_pembeli = $this->input->post('alamat_pembeli');
		$telp_pembeli = $this->input->post('telp_pembeli');
		$hp_pembeli = $this->input->post('hp_pembeli');
		$this->form_validation->set_rules('id_ktp', 'No. KTP', 'required');
		$this->form_validation->set_rules('nama_pembeli','Nama Pembeli','required');
		$this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required');
		$this->form_validation->set_rules('alamat_pembeli','Alamat','required');
		if($this->form_validation->run() != false){
			$data = array(
				'id_ktp' => $id_ktp,
				'nama_pembeli' => $nama_pembeli,
				'jenis_kelamin' => $jenis_kelamin,
				'alamat_pembeli' => $alamat_pembeli,
				'telp_pembeli' => $telp_pembeli,
				'hp_pembeli' => $hp_pembeli
			);
			$this->m_penjualan->insert_data($data,'pembeli');
			redirect(base_url().'admin/tambah_transaksi');
		}else{
			$this->load->view('admin/header');
			$this->load->view('admin/tambah_transaksi');
			$this->load->view('admin/footer');
		}
	}

	function user(){
		$data['user'] = $this->m_penjualan->get_data('user')->result();

		$this->load->view('admin/header');
		$this->load->view('admin/data_user',$data);
		$this->load->view('admin/footer');
	}

	function tambah_user(){
		$data['user'] = $this->m_penjualan->get_data('user')->result();

		$this->load->view('admin/header');
		$this->load->view('admin/tambah_user',$data);
		$this->load->view('admin/footer');
	}

	function tambah_user_act(){
		$nama_user = $this->input->post('nama_user');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$konfirmasi_pass = $this->input->post('konfirmasi_pass');

		$this->form_validation->set_rules('nama_user','Nama Pengguna','required');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required|matches[konfirmasi_pass]');
		$this->form_validation->set_rules('konfirmasi_pass','Konfirmasi Password','required');
		if($this->form_validation->run() != false){
			$data = array(
				'id_user' => '',
				'nama_user' => $nama_user,
				'username' => $username,
				'password' => md5($password),
				'dekrip' => $password
			);
			$this->m_penjualan->insert_data($data,'user');
			redirect(base_url().'admin/user');
		}else{
			$this->load->view('admin/header');
			$this->load->view('admin/tambah_user');
			$this->load->view('admin/footer');
		}
	}

	function edit_user($id_user){
		$where = array('id_user' => $id_user);
		$data['user'] = $this->m_penjualan->edit_data($where,'user')->result();

		$this->load->view('admin/header');
		$this->load->view('admin/edit_user',$data);
		$this->load->view('admin/footer');
	}

	function update_user(){
		$id_user = $this->input->post('id_user');
		$nama_user = $this->input->post('nama_user');
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$this->form_validation->set_rules('nama_user','Nama Pengguna','required');
		$this->form_validation->set_rules('username','Username','required');
		if($this->form_validation->run() != false){

			if($password ==''){
				$where = array('id_user' => $id_user);
				$data = array(
					'nama_user' => $nama_user,
					'username' => $username
				);
				$this->m_penjualan->update_data($where,$data,'user');
				redirect(base_url().'admin/user');
			}else{
				$where2 = array('id_user' => $id_user);
				$data2 = array(
					'nama_user' => $nama_user,
					'username' => $username,
					'password' => md5($password)
				);
				$this->m_penjualan->update_data($where2,$data2,'user');
				redirect(base_url().'admin/user');
			}


		}else{
			$this->load->view('admin/header');
			$this->load->view('admin/tambah_user');
			$this->load->view('admin/footer');
		}

	}

	function hapus_user($id_user){
		//menghapus data pengguna
		$where = array('id_user' => $id_user);
		$this->m_penjualan->delete_data($where,'user');
		redirect(base_url().'admin/data_user');
	}
	function cetak(){

	        $pdf = new FPDF('l','mm','A4');
	        // membuat halaman baru
	        $pdf->AddPage();
	        // setting jenis font yang akan digunakan
	        $pdf->SetFont('Arial','B',16);
	        // mencetak string
	        $pdf->Cell(190,7,'Laporan Transaksi Penjualan ',0,1,'C');
	        $pdf->SetFont('Arial','B',12);
	        $pdf->Cell(10,7,'',0,1);
	        $pdf->SetFont('Arial','B',10);
	        $pdf->Cell(10,6,'',0,0, 'C');
	        $pdf->Cell(10,6,'No',1,0, 'C');
	        $pdf->Cell(33,6,'Nomor Transaksi',1,0,'C');
	        $pdf->Cell(35,6,'Tanggal',1,0,'C');
	        $pdf->Cell(35,6,'Nama Customer',1,0,'C');
	        $pdf->Cell(25,6,'Harga Jual',1,0,'C');
	       // $pdf->Cell(30,6,'Total Komisi',1,0,'C');
	        $pdf->SetFont('Arial','',10);
	  //      $laporan = $this->db->get('trx_cash')->result();
					$data['motor'] = $this->m_penjualan->get_data('motor')->result();
					$data['pembeli'] = $this->m_penjualan->get_data('pembeli')->result();
					$laporan= $this->db->query("select * from trx_cash as t, pembeli as p, motor as m where t.id_ktp = p.id_ktp and t.kode_motor = m.kode_motor")->result();

			    $pdf->ln(6);
	        $no=1;
	        foreach ($laporan as $row){
	            $pdf->Cell(10,6,'',0,0, 'C');
	            $pdf->Cell(10,6,$no,1,0);
	            $pdf->Cell(33,6,$row->kode_trx,1,0, 'C');
	            $pdf->Cell(35,6,$row->tgl_trx,1,0,'C');
	            $pdf->Cell(35,6,$row->nama_pembeli,1,0,'C');
	            $pdf->Cell(25,6,$row->cash_harga,1,0,'C');
	         //   $pdf->Cell(30,6,$row->cash_harga,1,0,'Cell');
	            $pdf->ln(6);
	        $no++;
	        }

	        $pdf->Output();
	    }
}
