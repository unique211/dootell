<div id="divToPrint">
    <?php
    $today=date("d/m/Y");
?>
    <table width="100%">

        <tr>

            <td style="text-align: right">Date - <?php echo $today;?></td>
        </tr>

    </table>
    @foreach($letter_data as $value)
    <div style="text-align: justify; margin-top: 200px;">


        <h1 style="text-align: center">TO WHOM-SO-EVER IT MAY CONCERN</h1>

        <p>This is to certify that Mr./Ms. {{ $value->full_name}}. worked as
            {{ $value->designation }}. in our
            company from {{ $value->new_doj }} to {{ $value->new_leave_date }} with our entire satisfaction. During his
            working period we found him a
            sincere,
            honest, hardworking, dedicated employee with a professional attitude and very good job knowledge. He is
            amiable in
            nature and character is well. We have no objection to allow him in any better position and have no
            liabilities in our
            company. <br><br> We wish him every success in life.</p>
    </div>
    <table width="100%" style="margin-top: 80px;">
        <tr>
            <td style="text-align: right">Sincerely,</td>
            <td></td>
        </tr>

        <tr>
            <td style="text-align: right"><b>{{ $value->company_name }}</b></td>

        </tr>
    </table>
    @endforeach
</div>




<!-- <button onclick="myFunction()">Print this page</button> -->
<a class="printPage btn btn-primary" href="#">Print</a>
@include('layouts.footer_scripts')
<script>
    $('a.printPage').click(function() {
        var divToPrint = document.getElementById("divToPrint");
        newWin = window.open("");
        newWin.document.write(divToPrint.outerHTML);
        newWin.print();
        newWin.close();
    });


</script>
