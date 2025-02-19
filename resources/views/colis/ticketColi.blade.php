@extends('layouts.master')

@section('title', 'Client | Livraison')
@section('content')

<style>
    body {
        font-family: Arial, sans-serif;
        color: #000;
    }

    .ticket {
        cursor: pointer;
        width: fit-content;
        padding: 15px;
        border: 2px solid #000;
        border-radius: 5px;
        font-size: 14px;
        background: #fff;
        margin: 20px auto;
    }

    .ticket h2 {
        text-align: center;
        font-size: 16px;
        margin-bottom: 10px;
    }

    .ticket .codeNumber {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 30px;
    }

    .barcode {
        text-align: center;
        margin: 10px 0;
    }

    .barcode h4 {
        margin: 0;
        font-size: 18px;
        text-transform: uppercase;
    }

    .barcode #barcodeImage {
        width: 350px;
        height: 100px;
    }

    .section {
        margin-bottom: 10px;
        padding-bottom: 5px;
        border-bottom: 1px dashed #000;
    }

    .bold {
        font-weight: bold;
    }

    .qr-code {
        text-align: center;
        margin-top: 10px;
    }

    span {
        text-transform: capitalize;
    }

    .footer {
        text-align: center;
        font-size: 12px;
        margin-top: 10px;
    }

    .footer .nom-societe {
        margin-bottom: 5px;
        font-size: 15px;
        font-weight: 800;
    }

    /* Print Styles */
    @media print {
        body {
            background: none;
        }

        .ticket {
            width: 100%;
            max-width: fit-content;
            border: none;
            box-shadow: none;
        }

        .barcode #barcode {
            width: 300px;
            height: 80px !important;
        }

        .qr-code #qrImage {
            width: 100px;
            height: 100px;
        }

        .no-print {
            display: none;
        }
    }
</style>
<div id="ticket" class="ticket">
    <div class="codeNumber">
        <div class="qr-code">
            <span id="qrImage"></span>
        </div>
        <div class="barcode">
            <h4>#{{$coli->track_number}}</h4>
            <svg id="barcodeImage"></svg>
        </div>
    </div>
    <div class="section">
        <p>
            <span class="bold">Destination:</span>
            <span id="destinationText">{{$coli->destinataire}}</span>
        </p>
        <p id="addressText">{{$coli->adresse}}</p>
        <p>
            <span id="zoneText"> {{ $coli->ville->zone->nom_zone ?? 'No zone' }} - </span>
            <span class="bold" id="phoneText">{{$coli->telephone}}</span>
        </p>
    </div>
    <div class="section">
        <p>
            <span class="bold">Prix:</span> <span id="priceText">{{$coli->prix}} Dhs</span>
        </p>
        <p>
            <span class="bold">Date:</span> <span id="dateText">{{$coli->date_creation}}</span>
        </p>
    </div>
    <div class="section">
        <p>
            <span class="bold">Expéditeur:</span>
            <!-- <span id="senderText">Akchar Beauty Cosmetics</span> -->
        </p>
        <p>
            <span id="senderAddressText"> {{$coli->ville->nom_ville}} - {{$coli->Bon_ramassage->adresse_ramassage ?? 'No adresse'}} -
            </span>
            <span class="bold" id="senderPhoneText"> {{$coli->business->telephone ?? 'No telephone'}}</span>
        </p>
    </div>
    <div class="section">
        <p>
            <span class="bold">Produit:</span>
            <span id="productText">{{$coli->marchandise}}</span>
        </p>
    </div>
    <div class="footer">
        <p class="nom-societe">{{$general->nom}}</p>
        <p>{{ substr($general->telephone_a, 0, 4) . '.' . substr($general->telephone_a, 4, 3) . '.' . substr($general->telephone_a, 7, 3) . '.' . substr($general->telephone_a, 10) }}
        </p>

    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.6/dist/JsBarcode.all.min.js"></script>
<script>
    document.getElementById('ticket').addEventListener('click', ()=>{
        window.print()
    })
    function barCode(numberTarking) {
        const value = numberTarking.toUpperCase();
        JsBarcode("#barcodeImage", value, {
            format: "CODE128",
            lineColor: "#000",
            width: 2,
            height: 100,
            displayValue: true,
        });
        const qrcode = new QRCode(document.getElementById("qrImage"), {
            text: value,
            width: 100,
            height: 100,
        });
    }
    barCode('{{$coli->track_number}}');
</script>

@endsection