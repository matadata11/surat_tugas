<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class St extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_st','surat_tugas');
        $this->load->library('pdf');
    }

    public function index()
    {
        $pdf = new FPDF('P','mm','a4');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',12);

        // Make Header
        // $pdf->Image('./public/img/pancacita.png',85,10,20);
        $pdf->Cell(330,6,'PEMERINTAH ACEH',0,1,'C');
        $pdf->SetFont('Arial','B',13);
        $pdf->Cell(330,6,'DINAS PENDIDIKAN',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(330,6,strtoupper('CABANG DINAS PENDIDIKAN WILAYAH KAB. BENER MERIAH'),0,1,'C');
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(330,6,'Jl. Hakim Tunggul Naru, Kec. Bukit, Kabupaten Bener Meriah, Aceh 24582',0,1,'C');
        // $pdf->Image('./public/img/logo.png',245,10,20);

        $pdf->Line(15,36.1,342.5,36.1);             
        $pdf->SetLineWidth(0.1);                                                 
        $pdf->Ln();

        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(330,6,'LAPORAN PRESENSI PENDIDIK DAN TENAGA KEPENDIDIKAN',0,1, 'C');

        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(-5.5,6,'',0,0);
        $pdf->Cell(10,6,'NO.',1,0, 'C');
        $pdf->Cell(55,6,'NAMA LENGKAP',1,0, 'C');
        $pdf->Cell(25,6,'KETERANGAN',1,1, 'C');
        $pdf->SetFont('Arial','',10);

        $st = $this->surat_tugas->get_surat();
        $no=1;
        foreach ($st as $row){
            
            $pdf->Cell(-5.5,6,'',0,0);
            $pdf->Cell(10,15,$no++,1,0,'C');
            $pdf->Cell(55,15,$row['nm_pegawai'],'C');
            $pdf->Cell(55,15,$row['nip'], 'C');
            $pdf->Cell(55,15,($row['pg'].''.$row['nm_pegawai']),1,1);
           

            $pdf->SetTextColor(0, 0, 0);

            // $pdf->Cell(25,15, $pdf->Image('./public/img/presensi/'.$row['image'],$pdf->GetX(), $pdf->GetY(),25,15),1,1,'C');
        }

        // TTD Kepsek
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(203.5,6,'',0,0);
        $pdf->Cell(10,6,'Bener Meriah, '.indo_date(date('Y-m-d')),0,1, 'L');
        $pdf->Cell(203.5,6,'',0,0);
        $pdf->Cell(10,6,'Kepala Cabang Dinas',0,1, 'L');
        $pdf->Cell(203.5,6,'',0,0);
        $pdf->Cell(10,6,'Wilayah Kabupaten Bener Meriah',0,1, 'L');
        $pdf->Cell(203.5,22,'',0,1);
        $pdf->Cell(203.5,6,'',0,0);
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(10,6,'Sukardi, S.Pd., M.Si',0,1, 'L');
        $pdf->Cell(203.5,6,'',0,0);
        $pdf->Cell(10,6,'NIP. 19680406 199203 100 4',0,1, 'L');

        $pdf->SetTitle('Laporan Presensi');
        $pdf->Output('Laporan_Presensi'.date('Y-m-d').strtolower('.pdf'),'I');
    }

    public function in()
    {
        $pdf = new FPDF('L','mm','legal');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',12);

        // Make Header
        $pdf->Image('./public/img/pancacita.png',85,10,20);
        $pdf->Cell(330,6,'PEMERINTAH ACEH',0,1,'C');
        $pdf->SetFont('Arial','B',13);
        $pdf->Cell(330,6,'DINAS PENDIDIKAN',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(330,6,strtoupper('CABANG DINAS PENDIDIKAN WILAYAH KAB. BENER MERIAH'),0,1,'C');
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(330,6,'Jl. Hakim Tunggul Naru, Kec. Bukit, Kabupaten Bener Meriah, Aceh 24582',0,1,'C');
        $pdf->Image('./public/img/logo.png',245,10,20);

        $pdf->Line(15,36.1,342.5,36.1);             
        $pdf->SetLineWidth(0.1);                                                 
        $pdf->Ln();

        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(330,6,'LAPORAN PRESENSI PENDIDIK DAN TENAGA KEPENDIDIKAN',0,1, 'C');

        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(3.5,6,'',0,0);
        $pdf->Cell(10,6,'NO.',1,0, 'C');
        $pdf->Cell(55,6,'NAMA LENGKAP',1,0, 'C');
        $pdf->Cell(15,6,'HARI',1,0, 'C');
        $pdf->Cell(23,6,'TANGGAL',1,0, 'C');
        $pdf->Cell(18,6,'PUKUL',1,0, 'C');
        $pdf->Cell(16,6,'STATUS',1,0, 'C');
        $pdf->Cell(36,6,'LAT ABSEN',1,0, 'C');
        $pdf->Cell(36,6,'LONG ABSEN',1,0, 'C');
        $pdf->Cell(36,6,'JARAK',1,0, 'C');
        $pdf->Cell(60,6,'KANTOR',1,0, 'C');
        $pdf->Cell(25,6,'KETERANGAN',1,1, 'C');
        $pdf->SetFont('Arial','',10);

        $presensi = $this->presensi->makeReportPdfin();
        $no=1;
        foreach ($presensi as $row){
            
            $pdf->Cell(3.5,6,'',0,0);
            $pdf->Cell(10,15,$no++,1,0,'C');
            $pdf->Cell(55,15,$row['nama'],1,0);
            $pdf->Cell(15,15,$row['hari_presensi'],1,0,'C');
            $pdf->Cell(23,15,$row['tgl_presensi'],1,0,'C');
            $pdf->Cell(18,15,$row['waktu_presensi'].strtolower(' Wib'),1,0,'C');
            $pdf->Cell(16,15,$row['status'],1,0,'C');
            $pdf->Cell(36,15,$row['lat'],1,0,'C');
            $pdf->Cell(36,15,$row['long'],1,0,'C');
            $pdf->Cell(36,15,$row['jarak'],1,0,'C');

            if($row['jarak'] > '1'){
                $pdf->Cell(60,15,$row['home_base'],1,0,'C');
            }elseif($row['jarak'] <= '1'){
                $pdf->Cell(60,15,$row['home_base'],1,0,'C');
            }

            $pdf->SetTextColor(255, 0, 0);
            if($row['jarak'] > '1'){
                $pdf->Cell(25,15,'Diluar Kantor' ,1,1,'C');
            }elseif($row['jarak'] > '0' && $row['jarak'] <= '1'){
                $pdf->SetTextColor(0, 0, 0);
                $pdf->Cell(25,15,'Di Kantor',1,1,'C');
            }elseif($row['jarak'] == null ){
                $pdf->SetTextColor(0, 0, 0);
                $pdf->Cell(25,15,'GPS MATI',1,1,'C');
            }

            $pdf->SetTextColor(0, 0, 0);

            // $pdf->Cell(25,15, $pdf->Image('./public/img/presensi/'.$row['image'],$pdf->GetX(), $pdf->GetY(),25,15),1,1,'C');
        }

        // TTD Kepsek
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(203.5,6,'',0,0);
        $pdf->Cell(10,6,'Bener Meriah, '.indo_date(date('Y-m-d')),0,1, 'L');
        $pdf->Cell(203.5,6,'',0,0);
        $pdf->Cell(10,6,'Kepala Cabang Dinas',0,1, 'L');
        $pdf->Cell(203.5,6,'',0,0);
        $pdf->Cell(10,6,'Wilayah Kabupaten Bener Meriah',0,1, 'L');
        $pdf->Cell(203.5,22,'',0,1);
        $pdf->Cell(203.5,6,'',0,0);
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(10,6,'Sukardi, S.Pd., M.Si',0,1, 'L');
        $pdf->Cell(203.5,6,'',0,0);
        $pdf->Cell(10,6,'NIP. 19680406 199203 100 4',0,1, 'L');

        $pdf->SetTitle('Laporan Presensi');
        $pdf->Output('Laporan_Presensi'.date('Y-m-d').strtolower('.pdf'),'I');
    }

    public function ins()
    {
        $pdf = new FPDF('L','mm','legal');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',12);

        // Make Header
        $pdf->Image('./public/img/pancacita.png',85,10,20);
        $pdf->Cell(330,6,'PEMERINTAH ACEH',0,1,'C');
        $pdf->SetFont('Arial','B',13);
        $pdf->Cell(330,6,'DINAS PENDIDIKAN',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(330,6,strtoupper('CABANG DINAS PENDIDIKAN WILAYAH KAB. BENER MERIAH'),0,1,'C');
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(330,6,'Jl. Hakim Tunggul Naru, Kec. Bukit, Kabupaten Bener Meriah, Aceh 24582',0,1,'C');
        $pdf->Image('./public/img/logo.png',245,10,20);

        $pdf->Line(15,36.1,342.5,36.1);             
        $pdf->SetLineWidth(0.1);                                                 
        $pdf->Ln();

        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(330,6,'LAPORAN PRESENSI PENDIDIK DAN TENAGA KEPENDIDIKAN',0,1, 'C');

        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(3.5,6,'',0,0);
        $pdf->Cell(10,6,'NO.',1,0, 'C');
        $pdf->Cell(55,6,'NAMA LENGKAP',1,0, 'C');
        $pdf->Cell(15,6,'HARI',1,0, 'C');
        $pdf->Cell(23,6,'TANGGAL',1,0, 'C');
        $pdf->Cell(18,6,'PUKUL',1,0, 'C');
        $pdf->Cell(16,6,'STATUS',1,0, 'C');
        $pdf->Cell(36,6,'LAT ABSEN',1,0, 'C');
        $pdf->Cell(36,6,'LONG ABSEN',1,0, 'C');
        $pdf->Cell(36,6,'JARAK',1,0, 'C');
        $pdf->Cell(60,6,'KANTOR',1,0, 'C');
        $pdf->Cell(25,6,'KETERANGAN',1,1, 'C');
        $pdf->SetFont('Arial','',10);

        $presensi = $this->presensi->makeReportPdfins();
        $no=1;
        foreach ($presensi as $row){
            
            $pdf->Cell(3.5,6,'',0,0);
            $pdf->Cell(10,15,$no++,1,0,'C');
            $pdf->Cell(55,15,$row['nama'],1,0);
            $pdf->Cell(15,15,$row['hari_presensi'],1,0,'C');
            $pdf->Cell(23,15,$row['tgl_presensi'],1,0,'C');
            $pdf->Cell(18,15,$row['waktu_presensi'].strtolower(' Wib'),1,0,'C');
            $pdf->Cell(16,15,$row['status'],1,0,'C');
            $pdf->Cell(36,15,$row['lat'],1,0,'C');
            $pdf->Cell(36,15,$row['long'],1,0,'C');
            $pdf->Cell(36,15,$row['jarak'],1,0,'C');

            if($row['jarak'] > '1'){
                $pdf->Cell(60,15,$row['home_base'],1,0,'C');
            }elseif($row['jarak'] <= '1'){
                $pdf->Cell(60,15,$row['home_base'],1,0,'C');
            }

            $pdf->SetTextColor(255, 0, 0);
            if($row['jarak'] > '1'){
                $pdf->Cell(25,15,'Diluar Kantor' ,1,1,'C');
            }elseif($row['jarak'] > '0' && $row['jarak'] <= '1'){
                $pdf->SetTextColor(0, 0, 0);
                $pdf->Cell(25,15,'Di Kantor',1,1,'C');
            }elseif($row['jarak'] == null ){
                $pdf->SetTextColor(0, 0, 0);
                $pdf->Cell(25,15,'GPS MATI',1,1,'C');
            }

            $pdf->SetTextColor(0, 0, 0);

            // $pdf->Cell(25,15, $pdf->Image('./public/img/presensi/'.$row['image'],$pdf->GetX(), $pdf->GetY(),25,15),1,1,'C');
        }

        // TTD Kepsek
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(203.5,6,'',0,0);
        $pdf->Cell(10,6,'Bener Meriah, '.indo_date(date('Y-m-d')),0,1, 'L');
        $pdf->Cell(203.5,6,'',0,0);
        $pdf->Cell(10,6,'Kepala Cabang Dinas',0,1, 'L');
        $pdf->Cell(203.5,6,'',0,0);
        $pdf->Cell(10,6,'Wilayah Kabupaten Bener Meriah',0,1, 'L');
        $pdf->Cell(203.5,22,'',0,1);
        $pdf->Cell(203.5,6,'',0,0);
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(10,6,'Sukardi, S.Pd., M.Si',0,1, 'L');
        $pdf->Cell(203.5,6,'',0,0);
        $pdf->Cell(10,6,'NIP. 19680406 199203 100 4',0,1, 'L');

        $pdf->SetTitle('Laporan Presensi');
        $pdf->Output('Laporan_Presensi'.date('Y-m-d').strtolower('.pdf'),'I');
    }

}

/* End of file Presensi.php */
