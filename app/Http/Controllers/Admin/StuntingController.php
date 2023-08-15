<?php

namespace App\Http\Controllers\Admin;

use App\Models\Stunting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use PDF;

class StuntingController extends Controller
{
    public function index()
    {
        $title      = "Stunting";

        $curl       = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://smartposyandu.kotabogor.go.id/RestApi/bayiStunting',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Smart2023;#',
            'Cookie: ci_session=22o0rdh1bqdqhbdtq33brnb3sfluot27'
        ),
        ));

        $response = curl_exec($curl);

        $stunting = json_decode($response, true);

        $data = $stunting['data'];

        curl_close($curl);

        $nik = Stunting::all();

        $verify = array();

        foreach($nik as $n) {

            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://smartposyandu.kotabogor.go.id/RestApi/bayiStunting',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('key' => $n->nik),
            CURLOPT_HTTPHEADER => array(
                'Authorization: AndroPos2023;#',
                'Cookie: ci_session=i83vud3nuov2mbeh4sj74apfo1he392q'
            ),
            ));

            $response   = curl_exec($curl);

            $get        = json_decode($response, true);

            curl_close($curl);

            // dd($get['data']['bayi']['nik']);

            $verify[]   = array(
                'nik'           => $get['data']['bayi']['nik'],
                'nama'          => $get['data']['bayi']['nama'],
                'jk'            => $get['data']['bayi']['jk'],
                'tempat_lahir'  => $get['data']['bayi']['tempat_lahir'],
                'tanggal_lahir' => $get['data']['bayi']['tanggal_lahir'],
            );
        }

        // dd($verify);

        return view('admin.stunting.index', compact('title', 'data', 'verify'));
    }

    public function verifikasi(Request $request)
    {
        if($request->input('check'))
        {
            foreach($request->input('check') as $data) {
                
                $stunting = Stunting::create([
                    'nik'       => $data,
                    'status'    => '1'
                ]);
            }
        }
        
        $stunting->save();

        if ($stunting) {
            return redirect()->route('admin.stunting.index')->with(['success' => 'Data Stunting Berhasil Diverifikasi']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.stunting.index')->with(['error' => 'Data Stunting Gagal Diverifikasi']);
        }
    }

    public function cetak($nik)
    {
        $qrcode     = base64_encode(QrCode::size(10000)->generate($nik));
        
        // $curl       = curl_init();

        // curl_setopt_array($curl, array(
        // CURLOPT_URL => 'https://smartposyandu.kotabogor.go.id/RestApi/bayiStunting',
        // CURLOPT_RETURNTRANSFER => true,
        // CURLOPT_SSL_VERIFYPEER => false,
        // CURLOPT_ENCODING => '',
        // CURLOPT_MAXREDIRS => 10,
        // CURLOPT_TIMEOUT => 0,
        // CURLOPT_FOLLOWLOCATION => true,
        // CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        // CURLOPT_CUSTOMREQUEST => 'GET',
        // CURLOPT_HTTPHEADER => array(
        //     'Authorization: Smart2023;#',
        //     'Cookie: ci_session=22o0rdh1bqdqhbdtq33brnb3sfluot27'
        // ),
        // ));

        // $response = curl_exec($curl);

        // $stunting = json_decode($response, true);

        // $data = $stunting['data'];

        // curl_close($curl);

        $nama_file  = "stunting_".$nik.".pdf";

        $pdf = PDF::loadView('admin.stunting.qr', compact(['qrcode', 'nik']));
        $customPaper = array(0,0,50,50);
        
        return  $pdf->setPaper($customPaper, 'potrait')
                ->setOptions([  'enable_remote' => true,
                                'chroot'        => public_path('storage/'),])
                ->stream($nama_file, array("Attachment" => false));
    }
}
