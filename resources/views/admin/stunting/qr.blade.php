<!DOCTYPE html>
<html>
<head>
	<title>QR Code Stunting | {{ $nik }}</title>
</head>

<style>
    @page {
        margin: 0px 0px;
    }

    body {
        font-family: Helvetica;
    }

    .page-break {
        page-break-after: always;
    }

    .frame {
        background-color: #ba964a;
        border-radius: 2px;
        width: 37.9px;
        height: 48.1px;
        border: 0.1px solid #f8f8f4;
        margin-left: 2px;
        margin-top: -13px;
    }

    table.logo {
        vertical-align:middle;
        color: #000000;
        text-align: left;
    }

    table.logo td.kta{	
        text-transform:capitalize;
        font-size:5px;
        border-collapse: collapse;
        text-align: center;
    }

    table.logo tr.kta2{
        font-size:5px;   	
        border-collapse: collapse;
        line-height: 1.2;
    }

    table.logo tr.kta3{
        font-size:6px;   	
        border-collapse: collapse;
        line-height: 1.2;
    }

    .table {
        border-left: 0.01em solid rgb(122, 120, 120);
        border-right: 0;
        border-top: 0.01em solid rgb(122, 120, 120);
        border-bottom: 0;
        border-collapse: collapse;
        margin-top:5px;
    }

    .table td,
    .table th {
        border-left: 0;
        border-right: 0.01em solid rgb(122, 120, 120);
        border-top: 0;
        border-bottom: 0.01em solid rgb(122, 120, 120);
        
    }

    #background { 
        position: fixed; 
        width: 53.98; 
        height: 85.60; 
        opacity: 1;
        z-index: -1000;
    }

</style>

<body>

    <table class="logo" border="0" style="border-collapse: collapse; padding: 1px 2px" width="100%">
        <tr>
            <td style="font-size:4px; color:white">
            <strong><br></strong>
            </td>
        </tr>
    </table>

    <table class="logo" border="0" style="border-collapse: collapse; padding: 1px 2px; margin-top: 2px" width="100%">
        <tr>
            <td width="10px">
            </td>
            <td width="20px">
                <center>
                <img style="width: 25px; height: 25px; margin-top: 5px" src="data:image/png;base64, {!! $qrcode !!}">
                </center>
            </td>
            <td width="10px">
            </td>
        </tr>
    </table>
</body>
</html>
