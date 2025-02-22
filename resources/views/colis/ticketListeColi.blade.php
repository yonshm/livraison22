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
    p{
        margin: 5px 0 0;
    }
    .headerTicket{
        display: flex;
        justify-content: space-between;
        gap: 25px;
        align-items: center;
    }
    .headerTicket>img{
        width: 120px;
    }
    .headerTicket .barcode img{
        max-width: 210px; 
    }
    table{
        width: 100%;
        margin-top: 15px;
        text-align: center;
        border-collapse: collapse
    }
    table tr td, tr th{
        border: 1px solid #000;
    }
    /* Print Styles */
     @media print {
            body * { visibility: hidden; }
            .ticket, .ticket * { visibility: visible; }
            .ticket { position: relative; left: 0; top: 0; }
        }
</style>
<div id="tickets-container" class="row mx-5 mt-7 gap-3">
    @if (isset($listColis[0]) && $listColis[0]->coli->isNotEmpty())
        @foreach ($listColis[0]->coli as $coli)
            <div class="ticket" onclick="window.print()">
                <div class="headerTicket">
                    <img src="https:/fakeimg.pl/250x250/" alt="logo">
                    <div class="codeNumber">
                        <div class="barcode">
                            <img src="https://barcode.tec-it.com/barcode.ashx?data={{ $coli->track_number }}&amp;code=Code128&amp;dpi=96" alt="Barcode">
                        </div>
                    </div>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Expéditeur</th>
                            <th>Destinataire</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <p>
                                    <span id="senderAddressText"> {{$coli->ville->nom_ville}} - {{$coli->Bon_ramassage->adresse_ramassage ?? 'No adresse'}} -
                                    </span>
                                </p>
                                <p>
                                    <span class="bold" id="senderPhoneText"> {{$coli->business->telephone ?? 'No telephone'}}</span>
                                </p>
                                <p>
                                    <span id="dateText">{{$coli->created_at}}</span>
                                </p>
                            </td>
                            <td>
                                    <p>
                                        <span id="destinationText">{{$coli->destinataire}}</span>
                                    </p>
                                    <p id="addressText">{{$coli->adresse}}</p>
                                    <p>
                                        <span id="zoneText"> {{ $coli->ville->zone->nom_zone ?? 'No zone' }} - </span>
                                        <span class="bold" id="phoneText">{{$coli->telephone}}</span>
                                    </p>
                                    <p>
                                        <span class="bold">Prix:</span> <span id="priceText">{{$coli->prix}} Dhs</span>
                                    </p>

                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2">
                                <p>
                                    <span class="bold">Produit:</span>
                                    <span id="productText">{{$coli->marchandise}}</span>
                                </p>
                            </td>
                        </tr>
                    </tfoot>
                </table>
                <div class="footer">
                    <p class="nom-societe">{{$general->nom}}</p>
                    <p>
                        {{ substr($general->telephone_a, 0, 4) . '.' . substr($general->telephone_a, 4, 3) . '.' . substr($general->telephone_a, 7, 3) . '.' . substr($general->telephone_a, 10) }}
                    </p>
                </div>
            </div>
        @endforeach
    @else
        <p>No colis found.</p>
    @endif
</div>



@endsection